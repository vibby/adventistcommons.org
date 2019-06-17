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
		"pdf_printing" => "PDF (Production)",
		"pdf_personal" => "PDF (Personal)",
		"indd" => "InDesign",
		
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
		$content = $this->db->select( "*, product_content.id as id" )
			->from( "product_content" )
			->where( "section_id", $section_id )
			->where( "is_hidden", false )
			->join( "project_content_status", "project_content_status.content_id = product_content.id AND project_content_status.project_id = " . $project_id, "left" )
			->join( "users", "project_content_status.approved_by = users.id", "left" )
			->get()
			->result_array();
		
		return array_map( function( $content ) use( $project_id ) {
			$revisions = $this->db->select( "*" )
				->from( "product_content_revisions" )
				->where( "content_id", $content["id"] )
				->where( "project_id", $project_id )
				->order_by( "created_at", "desc" )
				->join( "users", "product_content_revisions.user_id = users.id" )
				->get()
				->result_array();
			
			foreach( $revisions as $key => $revision ) {
				$date = new DateTime( $revision["created_at"] );
				$revisions[$key]["created_at_formatted"] = $date->format( "Y-m-d H:i a" );
				$revisions[$key]["created_at"] = $date->format( "c" );
				$old_content = array_key_exists( $key+1, $revisions ) ? $revisions[$key+1]["content"] : "";
				$revisions[$key]["diff"] = $this->_htmlDiff( $old_content, $revision["content"] );
			}
			$content["revisions"] = $revisions;
			$content["total_revisions"] = count( $content["revisions"] );
			$content["latest_revision"] = $content["revisions"][0]["content"] ?? "";
			
			$errors = $this->db->select( "*" )
				->from( "product_content_log" )
				->where( "content_id", $content["id"] )
				->where( "project_id", $project_id )
				->where( "type", "error" )
				->where( "is_resolved", false )
				->order_by( "created_at", "desc" )
				->get()
				->result_array();	
			
			$content["errors"] = $errors;
			
			$str_length = strlen( $content["content"] );
			$content["textarea_height"] = $str_length > 60 ? ( $str_length / 60 ) + 1 : 2;
			return $content;
		}, $content );
	}
	
	public function getSectionId( $content_id ) {
		$section = $this->db->select( "section_id" )
			->from( "product_content" )
			->where( "id", $content_id )
			->get()
			->row_array();
		return $section["section_id"];
	}
	
	public function getContentLog( $id ) {
		return $this->db->select( "*" )
			->from( "product_content_log" )
			->where( "id", $id )
			->get()
			->row_array();
	}
	
	public function getSeriesItems() {
		return $this->db->select( "*" )
			->from( "series" )
			->get()
			->result_array();
	}
	
	//https://github.com/paulgb/simplediff
	private function _diff($old, $new){
		$matrix = array();
		$maxlen = 0;
		foreach($old as $oindex => $ovalue){
			$nkeys = array_keys($new, $ovalue);
			foreach($nkeys as $nindex){
				$matrix[$oindex][$nindex] = isset($matrix[$oindex - 1][$nindex - 1]) ?
					$matrix[$oindex - 1][$nindex - 1] + 1 : 1;
				if($matrix[$oindex][$nindex] > $maxlen){
					$maxlen = $matrix[$oindex][$nindex];
					$omax = $oindex + 1 - $maxlen;
					$nmax = $nindex + 1 - $maxlen;
				}
			}   
		}
		if($maxlen == 0) return array(array('d'=>$old, 'i'=>$new));
		return array_merge(
			$this->_diff(array_slice($old, 0, $omax), array_slice($new, 0, $nmax)),
			array_slice($new, $nmax, $maxlen),
			$this->_diff(array_slice($old, $omax + $maxlen), array_slice($new, $nmax + $maxlen)));
	}
	private function _htmlDiff($old, $new){
		$ret = '';
		$diff = $this->_diff(preg_split("/[\s]+/", $old), preg_split("/[\s]+/", $new));
		foreach($diff as $k){
			if(is_array($k))
				$ret .= (!empty($k['d'])?"<del>".implode(' ',$k['d'])."</del> ":'').
					(!empty($k['i'])?"<ins>".implode(' ',$k['i'])."</ins> ":'');
			else $ret .= $k . ' ';
		}
		return $ret;
	}
}
