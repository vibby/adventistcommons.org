<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projects extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library( [ "ion_auth", "form_validation" ] );
		$this->load->helper( [ "url" ] );
		$this->load->model( "project_model" );
	}
	
	public $breadcrumbs = [
		[
			"label" => "Translations In Progress",
			"url" => "/projects",
		],
	];
	
	public function index( $project_id = null )
	{
		$data = [
			"projects" => $this->project_model->getProjects(),
		];
		$this->template->set( "title", "Dashboard" );
		$this->breadcrumbs[] = [ "label" => "All"  ];
		$this->template->set( "breadcrumbs", $this->breadcrumbs );
		$this->template->load( "template", "projects", $data );
	}
	
	public function detail( $project_id ) {
		$this->load->model( "product_model" );
		$project = $this->project_model->getProject( $project_id );
		$product = $this->product_model->getProduct( $project["product_id"] );
		$title = "{$product['name']} ({$project['language_name']})";
		$data = [
			"project" => $project,
			"product" => $product,
			"members" => $this->project_model->getMembers( $project["id"] ),
			"sections" => $this->project_model->getSections( $project["id"] ),
		];
		$this->template->set( "title", $title );
		$this->breadcrumbs[] = [ "label" => $title  ];
		$this->template->set( "breadcrumbs", $this->breadcrumbs );
		$this->template->load( "template", "project", $data );
	}
	
	public function get_languages() {
		$languages = $this->project_model->getLanguages();
		$this->output->set_content_type( "application/json" );
		$this->output->set_output( json_encode( $languages ) );
	}
	
	public function add( $product_id = null ) {
		if( ! $this->ion_auth->logged_in() ) {
			show_404();
		}
		$this->load->model( "product_model" );
		$this->output->set_content_type("application/json");
		$this->form_validation->set_rules( "language_id", "Language", "required" );
		$this->form_validation->set_rules( "product_id", "Product ID", "required" );
		
		if( $this->form_validation->run() === false ) {
			$this->output->set_output( json_encode( [ "error" => validation_errors() ] ) );
			return false;
		}
		
		$data = $this->input->post();
		if( ! $this->product_model->getProduct( $data["product_id"] ) ) {
			show_404();
		}
		
		$count_existing = $this->db->select( "id" )
			->where( "product_id", $data["product_id"] )
			->where( "language_id", $data["language_id"] )
			->from( "projects" )
			->count_all_results();
		
		if( $count_existing > 0 ) {
			$this->output->set_output( json_encode( [ "error" => "This product is already being translated into the chosen language" ] ) );
			return false;
		}
		
		$this->db->insert( "projects", $data );
		$id = $this->db->insert_id();
		$this->output->set_output( json_encode( [ "redirect" => "/projects/$id" ] ) );
	}
	
	public function add_member() {
		if( ! $this->ion_auth->is_admin() ) {
			show_404();
		}
		$this->output->set_content_type( "application/json" );
		$this->form_validation->set_rules( "type", "Member type", "required" );
		$this->form_validation->set_rules( "user_id", "User ID", "required" );
		$this->form_validation->set_rules( "project_id", "Project ID", "required" );
		
		if( $this->form_validation->run() === false ) {
			$this->output->set_output( json_encode( [ "error" => validation_errors() ] ) );
			return false;
		}
		
		$data = $this->input->post();
		
		$this->db->where( "user_id", $data["user_id"] )
			->where( "project_id", $data["project_id"] )
			->delete( "project_members" );
		
		$this->db->insert( "project_members", $data );
		$id = $this->db->insert_id();
		$this->output->set_output( json_encode( [ "member_id" => $id ] ) );
	}
	
	public function delete( $project_id ) {
		if( ! $this->ion_auth->is_admin() ) {
			show_404();
		}
		
		$this->db->where( "id", $project_id )
			->delete( "projects" );
		
		redirect( "/projects", "refresh" );
	}
}
