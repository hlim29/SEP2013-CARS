<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employee extends CI_Controller {

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
			$data['empData'] = $this->employee_model->getEmployee($this->session->userdata('UserID'));
			$this->session->set_userdata($udata);
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			
			//Some data validation.

			$this->form_validation->set_rules('fname', 'first name', 'required');
			$this->form_validation->set_rules('lname', 'last name', 'required');

			//If data validation hasn't passed
			if ($this->form_validation->run() == FALSE){
				$this->load->view('employee', $data);
			}
			else
			{
				$this->register();
			}
			
		}
	}
	
		public function register(){
		//Converts POSTDATA into variables
		$uid = $this->session->userdata('UserID');
		$t = $this->input->post('title');
		$fname = $this->input->post('fname');
		$mname = $this->input->post('mname');
		$lname = $this->input->post('lname');
		$gender = $this->input->post('gender');
		$addr = $this->input->post('address');
		$state = $this->input->post('state');
		$pcode = $this->input->post('pcode');
		$dob = $this->input->post('dob');
		//Sends the data to the model for insertion. $result is a boolean - if registration was successful, the value will be true
		if ($this->employee_model->getEmployee($uid) != null)
			$result = $this->employee_model->update($t, $uid, $fname, $mname, $lname, $addr, $state, $pcode, $dob, $gender);
		else
			$result = $this->employee_model->register($t, $uid, $fname, $mname, $lname, $addr, $state, $pcode, $dob, $gender);
		
		//Loads the 'formsuccess' view
		if ($result != false){
			$data['UserID'] = 1;
			$this->load->view('det_success', $data);
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