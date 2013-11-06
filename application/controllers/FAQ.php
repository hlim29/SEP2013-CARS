<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class FAQ extends CI_Controller{

	public function FAQ(){
		
		parent::__construct();
						
		$this->load->library('session');
		$this->load->helper('url');
			error_reporting (0);	
	}
	
	public function index(){		
	if($this->checkMember()){
			$this->load->view('header');
			$this->load->view('FAQ');
	}		
	}
	
	public function checkMember(){
		if($this->session->userdata('is_logged_in')==1){
			return true;
			}
        else{					
			redirect('main');
			return false;
		}
	}
}
?>
