<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class help extends CI_Controller{

	public function help(){
		
		parent::__construct();
						
		$this->load->library('session');
		$this->load->helper('url');
			error_reporting (0);	
	}
	
	public function index(){		
	
			$this->load->view('header');
			$this->load->view('help');
	}		
	}	
?>
