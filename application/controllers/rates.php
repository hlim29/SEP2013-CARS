<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rates extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load the 'User' model
		$this->load->model('rates_model');
		$this->load->library('session');
		$this->load->helper('url');
		error_reporting (0);
	}
	
	public function index()
	{
		$rateID = 0;
		if ($this->uri->segment(3) === FALSE){}
		else
			$rateID = $this->uri->segment(3);
			
		$this->load->view('editrates');
	}
	
	public function edit()
	{	
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		
		if ($this->uri->segment(3) === FALSE)
			$rateID = 0;
		else
			$rateID = $this->uri->segment(3);
		$data['rate'] = $this->rates_model->getRate($rateID);
		$this->load->view('header');
		$this->load->view('editrates', $data);
	}
	
	public function create()
	{	
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		
		//$rateID = 0;
		//$data['rate'] = $this->rates_model->getRate($rateID);
		$data['isNew'] = TRUE;
		$this->load->view('header');
		$this->load->view('editrates', $data);
	}
	
	
	public function submit(){
		$id = $this->input->post('id');
		$level = $this->input->post('level');
		$type = $this->input->post('type');
		$desc = $this->input->post('desc');
		$amount = $this->input->post('amount');
		if ($id=='')
		$this->rates_model->insertRate($id, $level, $type, $desc, $amount);
		else
		$this->rates_model->updateRate($id, $level, $type, $desc, $amount);
		
		$data['rates'] = $this->rates_model->getRates();
		$data['msg'] = 'Your changes have been applied successfully!';
		$this->load->view('header');
		$this->load->view('listpay', $data);
	}
	
	public function checkMember(){
		
	}
}