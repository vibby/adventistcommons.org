<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library( [ "twig" ] );
		$this->load->helper( [ "url" ] );
	}
	
	public function terms()
	{
		$this->twig->display( "twigs/content/terms_of_use" );
	}
	
	public function privacy()
	{
		$this->twig->display( "twigs/content/privacy_policy" );
	}
}
