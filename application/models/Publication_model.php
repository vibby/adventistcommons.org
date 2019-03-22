<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publication_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function getPublication( $publication_id ) {
		return $this->db->select( "*" )
			->from( "publications" )
			->where( "id", $publication_id )
			->get()
			->row_array();
	}
}
