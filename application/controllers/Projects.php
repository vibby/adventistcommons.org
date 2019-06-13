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
		$language_id = $_GET["language"] ?? null;
		$language = $this->project_model->getLanguageName( $language_id );
		$data = [
			"projects" => $this->project_model->getProjects( $language_id ),
			"languages" => $this->project_model->getProjectLanguages(),
			"selected_language" => $language,
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
		$id = $this->project_model->addMember( $data["user_id"], $data["project_id"], $data["type"] );
		
		$user = $this->ion_auth->user()->row( $data["user_id"] );
		
		$project = $this->db->select( "projects.*, languages.name as language_name, products.name as product_name" )
			->from( "projects" )
			->join( "languages", "projects.language_id = languages.id" )
			->join( "products", "projects.product_id = products.id" )
			->where( "projects.id", $data["project_id"] )
			->get()
			->row_array();
		
		$template_data = [
			"user" => $user->first_name,
			"project_name" => $project["product_name"] . " (" . $project["language_name"]. ")",
			"link" => base_url() . "projects/" . $project["id"],
			"type" => $data["type"],
		];
		
		$this->template->set( "heading", "You've been added to a new project!" );
		$content = $this->template->load( "email/template", "email/added_contributor", $template_data, true );
		$this->email->from( "info@adventistcommons.org", "Adventist Commons" );
		$this->email->to( $user->email );
		$this->email->message( $content );
		$this->email->subject( "You've been added as a " . $template_data["type"] . " to " . $template_data["project_name"] );
		$this->email->send();
		
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
