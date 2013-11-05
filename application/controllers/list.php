<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class listview extends CI_Controller {

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
	$data['subject'] = $this->subject_model->getAllSubjects();

	if($this->session->userdata('is_logged_in')){
		$this->load->view('header');
		$this->load->view('list', $data);
	}
	}
	
	public function admin()
	{
	$data['subject'] = $this->subject_model->getAllSubjects();

	if($this->session->userdata('is_logged_in') && $this->session->userdata('Privilege')==3){
		$this->load->view('header');
		$this->load->view('listsuba', $data);
	}
	}
	
	
		
}