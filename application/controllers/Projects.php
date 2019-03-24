<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projects extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(['ion_auth']);
		$this->load->helper(['url']);
		$this->load->model( "project_model" );
		
		if ( ! $this->ion_auth->logged_in() ) {
			redirect( "/login", "refresh" );
		}
	}
	
	public $breadcrumbs = [
		[
			"label" => "Dashboard",
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
		$this->load->model( "publication_model" );
		$project = $this->project_model->getProject( $project_id );
		$publication = $this->publication_model->getPublication( $project["publication_id"] );
		$title = "{$publication['name']} ({$project['language_name']})";
		$data = [
			"project" => $project,
			"publication" => $publication,
			"members" => $this->project_model->getMembers( $project["id"] ),
			"sections" => $this->project_model->getSections( $project["id"] ),
		];
		$this->template->set( "title", $title );
		$this->breadcrumbs[] = [ "label" => $title  ];
		$this->template->set( "breadcrumbs", $this->breadcrumbs );
		$this->template->load( "template", "project", $data );
	}
}
