<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library( [ "ion_auth", "form_validation" ] );
		$this->load->helper( [ "url" ] );
		$this->load->model( "product_model" );
		$this->load->model( "project_model" );
		
		if ( ! $this->ion_auth->logged_in() ) {
			redirect( "/login", "refresh" );
		}
	}
	
	public $breadcrumbs = [
		[
			"label" => "Projects",
			"url" => "/projects",
		],
	];
	
	public function index( $project_id, $section_id )
	{
		$section = $this->product_model->getSection( $section_id );
		$project = $this->project_model->getProject( $project_id );
		$product = $this->product_model->getProduct( $project["product_id"] );
		
		if( ! $project OR ! $section ) {
			show_404();
		}
		
		$data = [
			"content" => $this->product_model->getSectionContent( $project_id, $section_id ),
			"project" => $project,
			"product" => $product,
			"section" => $section,
			"is_reviewer" => $this->project_model->isReviewer( $this->ion_auth->user()->row()->id, $project_id ),
		];
		$this->template->set( "title", "Dashboard" );
		$this->breadcrumbs[] = [ "label" => $product["name"] . " (" . $project["language_name"] . ")", "url" => "/projects/" . $project["id"]  ];
		$this->breadcrumbs[] = [ "label" => $section["name"] ];
		$this->template->set( "breadcrumbs", $this->breadcrumbs );
		$this->template->load( "template", "editor", $data );
	}
	
	public function commit() {
		$this->output->set_content_type("application/json");
		
		$this->form_validation->set_rules( "project_id", "Project ID", "required|numeric" );
		$this->form_validation->set_rules( "content_id", "Content ID", "required|numeric" );
		
		if( $this->form_validation->run() === false ) {
			$this->output->set_output( json_encode( [ "error" => validation_errors() ] ) );
			return false;
		}
		
		$data = $this->input->post();
		$data["user_id"] = $this->ion_auth->user()->row()->id;
		
		$exists = $this->db->select( "*" )
			->where( "product_content.id", $data["content_id"] )
			->join( "projects", "product_content.product_id = projects.product_id")
			->where( "projects.id", $data["project_id"] )
			->from( "product_content" )
			->count_all_results();
		
		if( ! $exists ) {
			show_404();
		}
		
		$this->db->insert( "product_content_revisions", $data );
		$id = $this->db->insert_id();
		
		$this->project_model->updateContentStatus( $data["content_id"], $data["project_id"], false );
		
		$this->output->set_output( json_encode( [ "success" => "Paragraph committed" ] ) );
	}
	
	public function approve() {
		
		$this->output->set_content_type("application/json");
		
		$this->form_validation->set_rules( "project_id", "Project ID", "required|numeric" );
		$this->form_validation->set_rules( "content_id", "Content ID", "required|numeric" );
		
		if( $this->form_validation->run() === false ) {
			$this->output->set_output( json_encode( [ "error" => validation_errors() ] ) );
			return false;
		}
		
		$data = $this->input->post();
		
		if( ! $this->project_model->isReviewer( $this->ion_auth->user()->row()->id, $data["project_id"] ) ) {
			show_404();
		}
		
		$data["user_id"] = $this->ion_auth->user()->row()->id;
		$data["type"] = "approved";
		
		$this->db->insert( "product_content_log", $data );
		$id = $this->db->insert_id();
		
		$resolve_error_data = [
			"resolved_by" => $this->ion_auth->user()->row()->id,
			"resolved_on" => date( "Y-m-d H:i:s" ),
			"is_resolved" => true,
		];
		
		$this->db->where( "type", "error" );
		$this->db->where( "project_id", $data["project_id"] );
		$this->db->where( "content_id", $data["content_id"] );
		$this->db->update( "product_content_log", $resolve_error_data );
		
		$this->project_model->updateContentStatus( $data["content_id"], $data["project_id"], true, $data["user_id"] );
		
		$this->output->set_output( json_encode( [ "reviewer_name" => $this->ion_auth->row()->first_name . " " . $this->ion_auth->row()->last_name ] ) );
	}
	
	public function suggest_revision() {
		
		$this->output->set_content_type("application/json");
		
		$this->form_validation->set_rules( "project_id", "Project ID", "required|numeric" );
		$this->form_validation->set_rules( "content_id", "Content ID", "required|numeric" );
		$this->form_validation->set_rules( "comment", "comment", "required" );
		
		if( $this->form_validation->run() === false ) {
			$this->output->set_output( json_encode( [ "error" => validation_errors() ] ) );
			return false;
		}
		
		$data = $this->input->post();
		
		if( ! $this->project_model->isReviewer( $this->ion_auth->user()->row()->id, $data["project_id"] ) ) {
			show_404();
		}
		
		$data["user_id"] = $this->ion_auth->user()->row()->id;
		$data["type"] = "error";
		
		$this->db->insert( "product_content_log", $data );
		$id = $this->db->insert_id();
		
		$this->project_model->updateContentStatus( $data["content_id"], $data["project_id"], false );
		
		$this->output->set_output( json_encode( [ "redirect" => "/editor/" . $data["project_id"] . "/" . $this->product_model->getSectionId( $data["content_id"] ) . "#p" . $data["content_id"] ] ) );
	}
	
	public function resolve() {
		
		$this->output->set_content_type("application/json");
		
		$this->form_validation->set_rules( "log_id", "Log ID", "required|numeric" );
		
		if( $this->form_validation->run() === false ) {
			$this->output->set_output( json_encode( [ "error" => validation_errors() ] ) );
			return false;
		}
		
		$data = $this->input->post();
		$error = $this->product_model->getContentLog( $data["log_id"] );
		
		if( ! $this->project_model->isReviewer( $this->ion_auth->user()->row()->id, $error["project_id"] ) ) {
			show_404();
		}
		
		$update_data = [
			"resolved_by" => $this->ion_auth->user()->row()->id,
			"resolved_on" => date( "Y-m-d H:i:s" ),
			"is_resolved" => true,
		];
		
		$this->db->where( "id", $data["log_id"] );
		$this->db->update( "product_content_log", $update_data );
		$this->output->set_output( json_encode( [ "success" => "Issue resolved" ] ) );
	}
}
