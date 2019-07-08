<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Products extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library( [ "ion_auth", "form_validation", "upload", "twig", "Container" ] );
		$this->load->helper( "url" );
		$this->load->model( "product_model" );
		$user = $this->ion_auth->user()->row();
		if( $user ) {
			$user->image = md5( strtolower( trim( $this->ion_auth->user()->row()->email ) ) );
			$user->is_admin = $this->ion_auth->is_admin();
			$this->twig->addGlobal( "user",  $user );
		}
	}
	
	public $audience = [
		"Christian",
		"Muslim",
		"Buddhist",
		"Hindu",
		"Sikh",
		"Animist",
		"Secular",
	];
	
	public $product_types = [
		"book",
		"magabook",
		"booklet",
		"tract",
	];
	
	public $product_binding = [
		"Hardcover",
		"Perfect Bound",
		"Spiral Bound",
		"Saddle Stitch",
		"Folded",
	];
	
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
			"audience_options" => $this->audience,
			"product_types" => $this->product_types,
			"product_binding" => $this->product_binding,
			"series" => $this->product_model->getSeriesItems(),
		];
		$this->breadcrumbs[] = [ "label" => "All Products"  ];
		$this->twig->addGlobal( "title", "Products" );
		$this->twig->addGlobal( "breadcrumbs", $this->breadcrumbs );
		$this->twig->display( "twigs/products", $data );
	}
	
	public function detail( $product_id ) {
		/** @var \AdventistCommons\Domain\Repository\ProductRepository $productRepo */
		$productRepo = $this->container->get(\AdventistCommons\Domain\Repository\ProductRepository::class);
		$product = $productRepo->findWithAttachmentsAndProjects($product_id);
		if( ! $product ) show_404();
		$data = [
			"product" => $product,
			"file_types" => \AdventistCommons\Domain\Entity\ProductAttachment::FILE_TYPES,
		];
		$this->breadcrumbs[] = [ "label" => $product->getName() ];
		$this->twig->addGlobal( "title", $product->getName() );
		$this->twig->addGlobal( "breadcrumbs", $this->breadcrumbs );
		$this->twig->display( "twigs/product", $data );
	}
	
	public function edit( $product_id ) {
		if( ! $this->ion_auth->is_admin() ) {
			show_404();
		}
		
		$product = $this->product_model->getProduct( $product_id );
		if( ! $product ) show_404();
		
		$data = [
			"product" => $product,
			"audience_options" => $this->audience,
			"product_types" => $this->product_types,
			"product_binding" => $this->product_binding,
			"series" => $this->product_model->getSeriesItems(),
		];
		$this->breadcrumbs[] = [
			"label" => $product["name"],
			"url" => "/products/" . $product["id"],
		];
		$this->breadcrumbs[] = [
			"label" => "Edit",
		];
		$this->twig->addGlobal( "title", "Edit Product" );
		$this->twig->addGlobal( "breadcrumbs", $this->breadcrumbs );
		$this->twig->display( "twigs/edit_product", $data );
	}
	
	public function save() {
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
		
		$is_new = ! array_key_exists( "id", $data );
		
		if( ( array_key_exists( "id", $data ) && $_FILES["cover_image"]["name"] ) || $is_new ) {
			$cover_image = $this->_uploadCoverImage();
			if( ! $cover_image ) {
				$this->output->set_output( json_encode( [ "error" => "Error uploading cover image" ] ) );
				return false;
			}
			$data["cover_image"] = $cover_image["file_name"];
		}
		
		if( $is_new && $_FILES["xliff_file"]["name"] ) {
			$xliff_file = $this->_uploadXliff();
			if( ! $xliff_file ) {
				$this->output->set_output( json_encode( [ "error" => "Error uploading translation file" ] ) );
				return false;
			}
			$data["xliff_file"] = $xliff_file["file_name"];
		}
		
		if( $data["series_id"] == "" ) {
			$data["series_id"] = null;
		} elseif( ! is_numeric( $data["series_id"] ) ) {
			$this->db->insert( "series", [ "name" => $data["series_id"] ] );
			$data["series_id"] = $this->db->insert_id();
		}
		
		if( $is_new ) {
			$this->db->insert( "products", $data );
			$id = $this->db->insert_id();
			
			if( $xliff_file ) {
				$this->_parseXliff( $xliff_file["file_name"], $id );
			}
			
			$this->output->set_output( json_encode( [ "redirect" => "/products/$id" ] ) );
		} else {
			$this->db->where( "id", $data["id"] );
			$this->db->update( "products", $data );
			if( $_FILES["cover_image"]["name"] ) {
				$this->output->set_output( json_encode( [ "redirect" => "/products/edit/" . $data["id"] ] ) );
			} else {
				$this->output->set_output( json_encode( [ "success" => "Product info updated" ] ) );
			}
		}
	}
	
	public function save_xliff() {
		if( ! $this->ion_auth->is_admin() ) {
			show_404();
		}
		
		$this->output->set_content_type("application/json");
		
		$xliff_file = $this->_uploadXliff();
		if( ! $xliff_file ) {
			$this->output->set_output( json_encode( [ "error" => "Error uploading translation file" ] ) );
			return false;
		}
		
		$data = $this->input->post();
		$data["xliff_file"] = $xliff_file["file_name"];
		$this->db->where( "id", $data["id"] );
		$this->db->update( "products", $data );
		$this->output->set_output( json_encode( [ "redirect" => "/products/edit/" . $data["id"] . "#advanced" ] ) );
	}
	
	public function save_specs() {
		if( ! $this->ion_auth->is_admin() ) {
			show_404();
		}
		
		$this->output->set_content_type("application/json");
		$data = $this->input->post();
		$this->db->where( "id", $data["id"] );
		$this->db->update( "products", $data );
		$this->output->set_output( json_encode( [ "success" => "Product info updated" ] ) );
	}
	
	public function add_file() {
		if( ! $this->ion_auth->is_admin() ) {
			show_404();
		}
		
		$this->output->set_content_type("application/json");
		
		$this->form_validation->set_rules( "language_id", "Language", "required" );
		$this->form_validation->set_rules( "product_id", "Product ID", "required" );
		$this->form_validation->set_rules( "file_type", "File type", "required" );
		
		if( $this->form_validation->run() === false ) {
			$this->output->set_output( json_encode( [ "error" => validation_errors() ] ) );
			return false;
		}
		$data = $this->input->post();
		
		$attachment = $this->_uploadAttachment();
		if( ! $attachment ) {
			$this->output->set_output( json_encode( [ "error" => "Error uploading file" ] ) );
			return false;
		}
		
		$data["file"] = $attachment["file_name"];
		
		$this->db->insert( "product_attachments", $data );
		$id = $this->db->insert_id();
		$this->output->set_output( json_encode( [ "redirect" => "/products/" . $data["product_id"] ] ) );
	}
	
	public function delete( $product_id ) {
		if( ! $this->ion_auth->is_admin() ) {
			show_404();
		}
		
		$this->db->where( "id", $product_id )
			->delete( "products" );
		
		redirect( "/products", "refresh" );
	}
	
	private function _uploadCoverImage() {
		$config["upload_path"] = $_SERVER["DOCUMENT_ROOT"] . "/uploads";
		$config["allowed_types"] = "jpg|jpeg|png";
		$config["max_size"] = 10000;
		$config["encrypt_name"] = true;

		$this->load->library( "upload", $config );
		$this->upload->initialize( $config );

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

		$this->upload->initialize( $config );

		if ( ! $this->upload->do_upload( "xliff_file" ) ) {
			return false;
		}
		
		$file = $this->upload->data();
		return $this->upload->data();
	}
	
	private function _parseXliff( $file, $product_id ) {
		$xml = simplexml_load_file( $_SERVER["DOCUMENT_ROOT"] . "/uploads/" . $file );
		foreach( $xml as $key => $region ) {
			if( $key == "interior" ) {
				$this->_parseXliffParagraphContent( $region, $product_id );
			} else {
				$this->_parseXliffTagContent( $region, $key, $product_id );
			}
		}
	}
	
	private function _parseXliffParagraphContent( $region, $product_id ) {
		$section_names = [
			"maincontent" => "Main content",
			"main" => "Main content",
		];
		foreach( $region as $region_name => $content ) {
			$section_data = [
				"product_id" => $product_id,
				"name" => $section_names[$region_name] ?? ucfirst( str_replace( "_", " ", $region_name ) ),
				"xliff_region" => $region_name,
			];
			$this->db->insert( "product_sections", $section_data );
			$section_id = $this->db->insert_id();
			$paragraphs = preg_split("/\R/u", $content);;
			
			foreach( $paragraphs as $p ) {
				$content_data = [
					"product_id" => $product_id,
					"content" => $p,
					"section_id" => $section_id,
					"is_hidden" => empty( $p ),
				];
				$this->db->insert( "product_content", $content_data );
			}
		}
	}
	
	private function _parseXliffTagContent( $region, $region_name, $product_id ) {
		$section_names = [
			"cover" => "Front cover",
			"backcover" => "Back cover",
		];
		$section_data = [
			"product_id" => $product_id,
			"name" => $section_names[$region_name] ?? ucfirst( str_replace( "_", " ", $region_name ) ),
			"xliff_region" => $region_name,
		];
		$this->db->insert( "product_sections", $section_data );
		$section_id = $this->db->insert_id();
		foreach( $region as $tag_key => $tag ) {
			$content_data = [
				"product_id" => $product_id,
				"content" => $tag,
				"section_id" => $section_id,
				"xliff_tag" => $tag_key,
			];
			$this->db->insert( "product_content", $content_data );
		}
	}
		
	private function _uploadAttachment() {
		$config["upload_path"] = $_SERVER["DOCUMENT_ROOT"] . "/uploads";
		$config["allowed_types"] = "pdf";
		$config["max_size"] = 50000;
		$config["encrypt_name"] = true;

		$this->upload->initialize( $config );

		if ( ! $this->upload->do_upload( "file" ) ) {
			return false;
		}
		
		$file = $this->upload->data();
		return $this->upload->data();
	}
}
