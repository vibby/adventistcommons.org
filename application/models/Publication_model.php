<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publication_model extends CI_Model
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
	
	public function getPublications()
	{
		$publications = $this->db->select( "*" )
			->from( "publications" )
			->get()
			->result_array();
		return array_map( function( $publication ) {
			$publication["languages"] = $this->db->select( "DISTINCT( language_id )" )
			->from( "publication_attachments" )
			->where( "publication_id", $publication["id"] )
			->group_by( "language_id" )
			->get()
			->num_rows();
			return $publication;
		}, $publications );
	}
	
	public function getPublication( $publication_id ) {
		return $this->db->select( "*" )
			->from( "publications" )
			->where( "id", $publication_id )
			->get()
			->row_array();
	}
	
	public function getAttachments( $publication_id ) {
		$attachments = $this->db->select( "*" )
			->from( "publication_attachments" )
			->where( "publication_id", $publication_id )
			->join( "languages", "publication_attachments.language_id = languages.id" )
			->get()
			->result_array();
		return array_map( function( $attachment ) {
			$attachment["file_type"] = $this->file_types[$attachment["file_type"]];
			return $attachment;
		}, $attachments );
	}
}
