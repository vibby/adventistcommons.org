<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Google\Cloud\Translate\TranslateClient;

class Content extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library( [ "twig" ] );
		$this->load->helper( [ "url" ] );
	}
	
	public function termsOfUse()
	{
		$this->twig->display( "twigs/content/termsOfUse" );
	}
	
	public function privacyPolicy()
	{
		$this->twig->display( "twigs/content/privacyPolicy" );
	}
	
	public function dataProcessingAgreement()
	{
		$this->twig->display( "twigs/content/dataProcessingAgreement" );
	}
}
