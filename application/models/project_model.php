<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public $status = [
		0 => "Not started",
		1 => "In progress",
		2 => "Awaiting review",
		3 => "Approved",
		4 => "Finalized",
	];
	
	public function getProjects()
	{
		$projects= $this->db->select( "projects.*, publications.name as publication_name, languages.name as language_name" )
			->from( "projects" )
			->join( "publications", "projects.publication_id = publications.id" )
			->join( "languages", "projects.language_id = languages.id" )
			->get()
			->result_array();
		
		return array_map( function( $project ) {
			$project["total_strings"] = 0;
			$project["completed_strings"] = 0;
			$project["percent_complete"] = $project["total_strings"] > 0 ? $project["completed_strings"] / $project["total_strings"] : 0;
			$project["status"] = $this->status[$project["status"]];
			$project["members"] = $this->db->select( "*" )
				->from( "project_members" )
				->where( "project_id", $project["id"] )
				->join( "users", "project_members.user_id = users.id" )
				->get()
				->result_array();
			return $project;
		}, $projects );
	}
}
