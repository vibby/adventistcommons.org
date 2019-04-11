<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library( "ion_auth" );
		$this->load->model( "product_model" );
	}
	
	public function index()
	{
		$this->template->set( "is_home", true );
		$this->template->load( "template", "home" );
	}
}
