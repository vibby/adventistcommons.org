<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(['ion_auth']);
		$this->load->helper(['url']);
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
	
	public function index( $project_id = null, $section_id = null )
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
		];
		$this->template->set( "title", "Dashboard" );
		$this->breadcrumbs[] = [ "label" => $product["name"] . " (" . $project["language_name"] . ")", "url" => "/projects/" . $project["id"]  ];
		$this->breadcrumbs[] = [ "label" => $section["name"] ];
		$this->template->set( "breadcrumbs", $this->breadcrumbs );
		$this->template->load( "template", "editor", $data );
	}
}
