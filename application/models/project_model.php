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
		$projects = $this->db->select( "projects.*, publications.name as publication_name, languages.name as language_name" )
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
	
	public function getProject( $project_id )
	{
		$project = $this->db->select( "projects.*, languages.name as language_name" )
			->from( "projects" )
			->join( "languages", "projects.language_id = languages.id" )
			->where( "projects.id", $project_id )
			->get()
			->row_array();
		if( ! $project ) show_404();
		$project["total_strings"] = 0;
		$project["completed_strings"] = 0;
		$project["percent_complete"] = $project["total_strings"] > 0 ? $project["completed_strings"] / $project["total_strings"] : 0;
		$project["status"] = $this->status[$project["status"]];
		return $project;
	}
	
	public function getPublication( $publication_id ) {
		return $this->db->select( "*" )
			->from( "publications" )
			->where( "id", $publication_id )
			->get()
			->result_array();
	}
	
	public function getMembers( $project_id ) {
		return $this->db->select( "*" )
			->from( "project_members" )
			->where( "project_id", $project_id )
			->join( "users", "project_members.user_id = users.id" )
			->get()
			->result_array();
	}
	
	public function getSections( $project_id ) {
		$sections = $this->db->select( "*" )
			->from( "publication_sections" )
			->join( "projects", "publication_sections.publication_id = projects.publication_id", "left" )
			->where( "projects.id", $project_id )
			->get()
			->result_array();
		return array_map( function( $section ) {
			$section["total_strings"] = 0;
			$section["completed_strings"] = 0;
			$section["percent_complete"] = $section["total_strings"] > 0 ? $section["completed_strings"] / $section["total_strings"] : 0;
			$section["last_activity"] = "today";
			return $section;
		}, $sections );
		
		return $sections;
	}
}
