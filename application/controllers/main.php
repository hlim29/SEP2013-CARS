<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
		{
			parent::__construct();
			$this->load->library('session');
			$this->load->helper('url');
			$this->load->model('employee_model');
			$this->load->model('user_model');
			error_reporting (0);
		}
		
	public function index()
		{
			if ($this->checkMember()){			
				
				$this->load->view('main', $data);
			}
		}

	public function checkMember(){
		if($this->session->userdata('is_logged_in')==1){
		return true;
             }
            else
					{
					
		redirect('login');
		return false;
		}
	}
	public function logout()
		{
			$this->session->sess_destroy();
			$this->load->view('main');
		}
		
}