<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public $file_types = [
		"PDF" => "PDF",
		"INDD" => "InDesign",
	];
	
	public function getProducts()
	{
		$products = $this->db->select( "*" )
			->from( "products" )
			->get()
			->result_array();
		
		return array_map( function( $product ) {
			$product["languages"] = $this->db->select( "DISTINCT( language_id )" )
			->from( "product_attachments" )
			->where( "product_id", $product["id"] )
			->group_by( "language_id" )
			->get()
			->num_rows();
			return $product;
		}, $products );
	}
	
	public function getProduct( $product_id ) {
		return $this->db->select( "*" )
			->from( "products" )
			->where( "id", $product_id )
			->get()
			->row_array();
	}
	
	public function getAttachments( $product_id ) {
		$attachments = $this->db->select( "*" )
			->from( "product_attachments" )
			->where( "product_id", $product_id )
			->join( "languages", "product_attachments.language_id = languages.id" )
			->get()
			->result_array();
		
		return array_map( function( $attachment ) {
			$attachment["file_type"] = $this->file_types[$attachment["file_type"]];
			return $attachment;
		}, $attachments );
	}
	
	public function getSection( $section_id ) {
		return $this->db->select( "*" )
			->from( "product_sections" )
			->where( "id", $section_id )
			->get()
			->row_array();
	}
	
	public function getSectionContent( $project_id, $section_id ) {
		$content = $this->db->select( "*" )
			->from( "product_content" )
			->where( "section_id", $section_id )
			->get()
			->result_array();
		
		return array_map( function( $content ) use( $project_id ) {
			$content["revisions"] = $this->db->select( "*" )
				->from( "product_content_revisions" )
				->where( "content_id", $content["id"] )
				->order_by( "created_at", "desc" )
				->join( "users", "product_content_revisions.user_id = users.id" )
				->get()
				->result_array();
			$content["total_revisions"] = count( $content["revisions"] );
			return $content;
		}, $content );
	}
}
