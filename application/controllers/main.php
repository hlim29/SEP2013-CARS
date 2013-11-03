<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

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
			//$data['subjects'] = $this->subject_model->getAllSubjects();
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
		$this->form_validation->set_rules('id', 'UserID', 'trim|xss_clean|required|callback_dbChecking');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		
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
		$id = $this->input->post('id');
		$password = $this->input->post('password');
		if (ctype_digit($id))
		$result = $this->user_model->login($id, $password);
		else
		$result = false;
		if ($result){
			return true;
		}
		else {
			$this->form_validation->set_message('dbChecking', 'Incorrect name/password');
			return false;
		}
	}
	
		
}