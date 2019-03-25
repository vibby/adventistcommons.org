<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(['ion_auth']);
		$this->load->helper(['url']);
		$this->load->model( "product_model" );
	}
	
	public $breadcrumbs = [
		[
			"label" => "Products",
			"url" => "/products",
		],
	];
	
	public function index( $product_id = null )
	{
		$data = [
			"products" => $this->product_model->getProducts(),
		];
		$this->template->set( "title", "Products" );
		$this->breadcrumbs[] = [ "label" => "All Products"  ];
		$this->template->set( "breadcrumbs", $this->breadcrumbs );
		$this->template->load( "template", "products", $data );
	}
	
	public function detail( $product_id ) {
		$this->load->model( "project_model" );
		$product = $this->product_model->getProduct( $product_id );
		$attachments = $this->product_model->getAttachments( $product_id );
		$languages = [];
		foreach( $attachments as $attachment ) {
			$languages[$attachment["language_id"]]["language_name"] = $attachment["name"];
			$languages[$attachment["language_id"]]["attachments"][] = $attachment;
		}
		$projects = $this->project_model->getProjectsByProductId( $product_id );
		foreach( $projects as $project ) {
			if( ! array_key_exists( $project["language_id"], $languages ) ) {
				$languages[$project["language_id"]]["language_name"] = $project["language_name"];
				$languages[$project["language_id"]]["project"] = $project;
			}
		}
		$data = [
			"product" => $product,
			"languages" => $languages,
		];
		$this->template->set( "title", $product["name"] );
		$this->breadcrumbs[] = [ "label" => $product["name"]  ];
		$this->template->set( "breadcrumbs", $this->breadcrumbs );
		$this->template->load( "template", "product", $data );
	}
}
