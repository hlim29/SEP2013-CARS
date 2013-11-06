<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subject extends CI_Controller {

	public function __construct()
		{
			parent::__construct();
			$this->load->library('session');
			$this->load->helper('url');
			$this->load->model('employee_model');
			$this->load->model('subject_model');
			$this->load->model('user_model');
			$this->load->model('rates_model');
			$this->load->model('contract_model');
			$this->load->library('form_validation');
			error_reporting (0);
		}
		
	public function index()
	{
		$data['subjects'] = $this->subject_model->getAllSubjects();

		if($this->session->userdata('is_logged_in') && $this->isAdmin()){
			$this->load->view('header');
			$this->load->view('list', $data);
		}
	}
	
	public function admin()
	{
		$data['subjects'] = $this->subject_model->getAllSubjects();

		if($this->session->userdata('is_logged_in') && $this->isAdmin()){
			$this->load->view('header');
			$this->load->view('listsuba', $data);
		}
	}
	
	public function edit()
	{	
		$this->load->helper(array('form', 'url'));
		
		if ($this->uri->segment(3) === FALSE)
			$isNew = TRUE;
		else
			$id = $this->uri->segment(3);
		$data['subject'] = $this->subject_model->getSubject($id);
		$data['coordinators'] = $this->employee_model->getType(2);
		$this->load->view('header');
		$this->load->view('editsubject', $data);
	}
	
	public function submit(){
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$coordinator = $this->input->post('coordinator');
		
		

		$this->subject_model->insertSubject($id, $name, $coordinator);


		$this->admin();
	}

	
	/*public function employees(){
		if ($this->isAdmin()){
			$data['users'] = $this->user_model->getAllUserData();
			$this->load->view('header');
			$this->load->view('listemployees', $data);
		
		}
	}
	
	public function viewrates(){
		if ($this->isAdmin()){
			$data['rates'] = $this->rates_model->getRates();
			$this->load->view('header');
			$this->load->view('listpay', $data);
		
		}
	}
	
	public function addrates(){
		if ($this->isAdmin()){
			$data['rates'] = $this->rates_model->getAllUserData();
			$this->load->view('header');
			$this->load->view('listemployees', $data);
		
		}
	}*/
	
	public function isAdmin(){
		if ($this->session->userdata('Privilege')!=3){
			//redirect('nopermission');
			return false;
		}
		return true;
	}
		
		
		
				public function send(){
			$id = $this->input->post('subjectid');
			$eid = $this->session->userdata('EmpID');
			$result = $this->contract_model->assignUser($eid, $id);
				redirect('main');
		}
		
		
		public function existing(){
			$eID = $this->session->userdata('EmpID');
			$data['subjects'] = $this->contract_model->getContracts($eID);
			$this->load->view('header');
			$this->load->view('list_existing', $data);
		}
	
		
}