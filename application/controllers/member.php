<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Controller {

	public function __construct()
		{
			parent::__construct();
			$this->load->library('session');
			$this->load->helper('url');
			$this->load->model('employee_model');
			$this->load->model('subject_model');
			$this->load->model('user_model');
			$this->load->library('form_validation');
			error_reporting (0);
		}
		
	public function index()
		{
			$data['subjects'] = $this->subject_model->getAllSubjects();
			$empData = $this->employee_model->getData($this->input->post('id'), 'employees');
			$data['empData'] = $empData;
			
			if($this->session->userdata('is_logged_in')){
				$this->load->view('header');
				$this->load->view('member', $data);
	}
		else{
		$this->validation();
	}
		

		}

	public function logout()
		{
			$this->session->sess_destroy();
			redirect('main');
		}
		
		public function validation(){
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" style="width:30%;margin:30px auto;">', '</div>');
		$this->form_validation->set_rules('id', 'UserID', 'required|callback_dbChecking');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('header');
			$this->load->view('main');
		}
		else
		{
			$data['subjects'] = $this->subject_model->getAllSubjects();
			$empData = $this->employee_model->getData($this->input->post('id'), 'employees');
			$data['empData'] = $empData;
			$status = $empData->IsSubmitted;
			$sessData = array('UserID' => $this->input->post('id'), 'FormStatus' => $status, 'is_logged_in' => 1,  'FormID' => $empData->UserID );
			
			
		    $this->session->set_userdata($sessData);
			
			//$udata = array( );
			$this->load->view('header');
			$this->load->view('member',$data);
		}
	}
	
	public function dbChecking(){
		$this->load->model('user_model');
		$id = $this->input->post('id');
		$password = $this->input->post('password');
		$result = $this->user_model->login($id, $password);
		
		if ($result == true){
			return true;
		}
		else {
			$this->form_validation->set_message('dbChecking', 'Incorrect name/password');
			return false;
		}
	}
	
		
}