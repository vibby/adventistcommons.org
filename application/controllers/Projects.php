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
	}
	
	public $breadcrumbs = [
		[
			"label" => "Projects",
			"url" => "/projects",
		],
	];
	
	public function index()
	{
		$data = [
			"projects" => $this->project_model->getProjects(),
		];
		$this->template->set( "title", "Projects" );
		$this->breadcrumbs[] = [ "label" => "All"  ];
		$this->template->set( "breadcrumbs", $this->breadcrumbs );
		$this->template->load( "template", "projects", $data );
	}
}
