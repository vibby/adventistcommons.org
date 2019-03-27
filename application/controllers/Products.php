<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Products extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(["ion_auth", "form_validation"]);
		$this->load->helper(["url"]);
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
		if( ! $product ) show_404();
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
	
	public function save( $product_id = null ) {
		if( ! $this->ion_auth->is_admin() ) {
			show_404();
		}
		
		$this->output->set_content_type("application/json");
		
		$this->form_validation->set_rules( "name", "Title", "required" );
		$this->form_validation->set_rules( "audience", "Audience", "required" );
		$this->form_validation->set_rules( "page_count", "Page count", "required|numeric" );
		$this->form_validation->set_rules( "type", "Product type", "required" );
		
		if( $this->form_validation->run() === false ) {
			$this->output->set_output( json_encode( [ "error" => validation_errors() ] ) );
			return false;
		}
		$data = $this->input->post();
		$cover_image = $this->_uploadCoverImage();
		if( ! $cover_image ) {
			$this->output->set_output( json_encode( [ "error" => "Error uploading cover image" ] ) );
			return false;
		}
		/*$xliff_file = $this->_uploadXliff();
		if( ! $xliff_file ) {
			$this->output->set_output( json_encode( [ "error" => "Error uploading translation file" ] ) );
			return false;
		}*/
		$data["cover_image"] = $cover_image["file_name"];
		//$data["xliff_file"] = $xliff_file["file_name"];
		
		if( $product_id ) {
			$this->db->where( "id", $product_id );
			$this->db->update( "products", $data );
			$this->output->set_output( json_encode( [ "success" => "Product info updated" ] ) );
		} else {
			$this->db->insert( "products", $data );
			$id = $this->db->insert_id();
			$this->output->set_output( json_encode( [ "redirect" => "/products/$id" ] ) );
		}
	}
	
	private function _uploadCoverImage() {
		$config["upload_path"] = $_SERVER["DOCUMENT_ROOT"] . "/uploads";
		$config["allowed_types"] = "jpg|png";
		$config["max_size"] = 10000;
		$config["encrypt_name"] = true;

		$this->load->library( "upload", $config );

		if ( ! $this->upload->do_upload( "cover_image" ) ) {
			return false;
		}
		$image = $this->upload->data();
		$source_path = $_SERVER["DOCUMENT_ROOT"] . "/uploads/" . $image["file_name"];
		$target_path = $_SERVER["DOCUMENT_ROOT"] . "/uploads/";
		
		$config_manip = [
			"image_library" => "gd2",
			"source_image" => $source_path,
			"maintain_ratio" => true,
			"width" => 768,
			"height" => 768,
			"quality" => "70%",
		];

		$this->load->library( "image_lib", $config_manip );
		if( ! $this->image_lib->resize() ) {
			return false;
		}

		$this->image_lib->clear();
		return $this->upload->data();
	}
	
	private function _uploadXliff() {
		$config["upload_path"] = $_SERVER["DOCUMENT_ROOT"] . "/uploads";
		$config["allowed_types"] = "xml";
		$config["max_size"] = 50000;
		$config["encrypt_name"] = true;

		$this->load->library( "upload", $config );

		if ( ! $this->upload->do_upload( "xliff_file" ) ) {
			return false;
		}
		
		$file = $this->upload->data();
		return $this->upload->data();
	}
}
