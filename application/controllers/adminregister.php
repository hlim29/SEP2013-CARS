<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adminregister extends CI_Controller {

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

			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');

			//Some data validation.
			$this->form_validation->set_rules('email', 'Email', 'is_unique[users.Email]');
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger" style="width:30%;margin: 10px auto;">', '</div>');
			$this->form_validation->set_rules('fname', 'first name', 'required');
			$this->form_validation->set_rules('lname', 'last name', 'required');

			$this->form_validation->set_rules('password', 'Password', 'required|matches[cpassword]');
			$this->form_validation->set_rules('cpassword', 'Password Confirmation', 'required');
			$this->form_validation->set_message("is_unique", "The email address you have entered already exists");

			$this->session->set_userdata($udata);
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');

			//Some data validation.

			//If data validation hasn't passed
			if ($this->form_validation->run() == FALSE){
				$this->load->view('header');
				$this->load->view('admin_reg', $data);
			}
			else
				$this->register();
		}
	}	
	
	public function register(){
		
		//Converts POSTDATA into variables
		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));
		$t = $this->input->post('title');
		$fname = $this->input->post('fname');
		$mname = $this->input->post('mname');
		$lname = $this->input->post('lname');
		$gender = $this->input->post('gender');
		$addr = $this->input->post('address');
		$state = $this->input->post('state');
		$pcode = $this->input->post('pcode');
		$dob = date('Y-m-d',strtotime($this->input->post('dob')));
		
		$uid = $this->user_model->adminRegister($email,$password);
		
		$isNew = true;
		//Sends the data to the model for insertion. $result is a boolean - if registration was successful, the value will be true
		$result = $this->employee_model->add($t, $uid, $fname, $mname, $lname, $addr, $state, $pcode, $dob, $gender, $isNew);
		
		//Loads the 'formsuccess' view
		
		$this->financial($uid);
		$this->citizenship($uid);
		$this->emergency($uid);
		
		$data['saved'] = 'User '. $uid . ' has been registered successfully!';
		$this->load->view('header');
		$this->load->view('member', $data);
	}
	
	public function financial($uid){

		//Converts POSTDATA into variables
		//$uid = $this->session->userdata('UserID');
		$bsb = $this->input->post('bsb');
		$accno = $this->input->post('accno');
		$branch = $this->input->post('branch');
		$institution = $this->input->post('institution');
		
		$isNew = true;

		$result = $this->employee_model->financials($uid, $bsb, $accno, $branch, $institution, $isNew);
		}

	public function citizenship($uid){

		//Converts POSTDATA into variables
		$cissue = $this->input->post('cissue');
		$ppno = $this->input->post('ppno');
		$vtype = $this->input->post('vtype');
		$status = $this->input->post('status');

		$isNew = true;

		$result = $this->employee_model->citizenship($uid, $cissue, $ppno, $vtype, $status, $isNew);
	}
	
	public function emergency($uid){

		//Converts POSTDATA into variables

		$gname = $this->input->post('gname');
		$sname = $this->input->post('sname');
		$relation = $this->input->post('relation');
		$ph = $this->input->post('ph');
		$mob = $this->input->post('mob');
		
		$isNew = true;

		$result = $this->employee_model->emergency($uid, $gname, $sname, $relation, $ph, $mob, $isNew);
	}
	
	
	public function checkMember(){
		if($this->session->userdata('is_logged_in')==1){
			if ($this->session->userdata('Privilege')!=3)
				redirect('nopermission');
			else
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