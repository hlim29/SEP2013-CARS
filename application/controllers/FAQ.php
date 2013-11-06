<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class FAQ extends CI_Controller{

	public function FAQ(){
		
		parent::__construct();
						
		$this->load->library('session');
		$this->load->helper('url');
			error_reporting (0);	
	}
	
	public function index(){
			$this->load->view('header');
			$this->load->view('FAQ');		
	}
}
?>
