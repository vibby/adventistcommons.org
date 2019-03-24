<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publications extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(['ion_auth']);
		$this->load->helper(['url']);
		$this->load->model( "publication_model" );
		
		if ( ! $this->ion_auth->logged_in() ) {
			redirect( "/login", "refresh" );
		}
	}
	
	public $breadcrumbs = [
		[
			"label" => "Publications",
			"url" => "/publications",
		],
	];
	
	public function index( $publication_id = null )
	{
		$data = [
			"publications" => $this->publication_model->getPublications(),
		];
		$this->template->set( "title", "Publications" );
		$this->breadcrumbs[] = [ "label" => "All"  ];
		$this->template->set( "breadcrumbs", $this->breadcrumbs );
		$this->template->load( "template", "publications", $data );
	}
	
	public function detail( $publication_id ) {
		$this->load->model( "project_model" );
		$publication = $this->publication_model->getPublication( $publication_id );
		$attachments = $this->publication_model->getAttachments( $publication_id );
		$languages = [];
		foreach( $attachments as $attachment ) {
			$languages[$attachment["language_id"]]["language_name"] = $attachment["name"];
			$languages[$attachment["language_id"]]["attachments"][] = $attachment;
		}
		$projects = $this->project_model->getProjectsByPublicationId( $publication_id );
		foreach( $projects as $project ) {
			if( ! array_key_exists( $project["language_id"], $languages ) ) {
				$languages[$project["language_id"]]["language_name"] = $project["language_name"];
				$languages[$project["language_id"]]["project"] = $project;
			}
		}
		$data = [
			"publication" => $publication,
			"languages" => $languages,
		];
		$this->template->set( "title", $publication["name"] );
		$this->breadcrumbs[] = [ "label" => $publication["name"]  ];
		$this->template->set( "breadcrumbs", $this->breadcrumbs );
		$this->template->load( "template", "publication", $data );
	}
}
