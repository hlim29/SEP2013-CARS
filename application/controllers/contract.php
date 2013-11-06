<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contract extends CI_Controller {

	public function __construct()
		{
			parent::__construct();
			$this->load->library('session');
			$this->load->helper('url');
			$this->load->model('employee_model');
			$this->load->model('user_model');
			$this->load->model('rates_model');
			$this->load->model('contract_model');
			
			error_reporting (0);
		}
		
	public function index()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		
		if ($this->checkMember()){	
			$data['contracts'] = $this->contract_model->getCContracts($this->session->userdata('UserID'));
				$this->load->view('header');
				$this->load->view('list_ccontract', $data);
			
		}
	}
	
	public function current()
	{
		if ($this->checkMember()){	
			$data['contracts'] = $this->contract_model->getCurrContracts($this->session->userdata('UserID'));
				$this->load->view('header');
				$this->load->view('list_currcontract', $data);
			
		}
	}
	
	
	public function edit()
	{
	$this->load->helper('form');
		if ($this->checkMember()){	
			$id = $this->uri->segment(3);
			$data['contract'] = $this->contract_model->getCContract($id);
			$data['rates'] = $this->rates_model->getRates();
			$this->load->view('header');
			$this->load->view('editcontract', $data);
		}
	}
	
		public function view()
	{
		if ($this->checkMember()){	
			$id = $this->uri->segment(3);
			$data['contract'] = $this->contract_model->getCContract($id);
			$data['rates'] = $this->rates_model->getRates();
			$this->load->view('header');
			$this->load->view('viewcontract', $data);
		}
	}
	
	public function approve(){
		$id = $this->input->post('id');
		$this->contract_model->approve($id);
		redirect('contract/current');
	}
	
		public function reject(){
		$id = $this->input->post('id');
		$this->contract_model->reject($id);
		redirect('contract/current');
	}
	
	
	public function adminView()
	{
		if ($this->checkMember()){	
			$id = $this->uri->segment(3);
				$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			
			//Some data validation.
			
			$this->form_validation->set_rules('fname', 'first name', 'required');
			$this->form_validation->set_rules('lname', 'last name', 'required');
			$data['eData'] = $this->employee_model->getData($id, 'emergencycontacts');		
			$data['fData'] = $this->employee_model->getData($id, 'financials');
			$data['cData'] = $this->employee_model->getData($id, 'citizenshipstatuses');
			$data['empData'] = $this->employee_model->getData($id, 'employees');
			
			
				$this->load->view('header');
				$this->load->view('employee_admin', $data);
		}
	}
	
	function refreshData(){
		
		$empData = $this->employee_model->getData($this->session->userdata('UserID'), 'employees');
		$sessData = array('FormStatus' => $empData->IsSubmitted,  'FormID' => $empData->UserID );
		$this->session->set_userdata($sessData);
	}
	
	public function submit(){
		$id = $this->input->post('id');
		$sdate  = $this->input->post('sdate');
		$edate = $this->input->post('edate');
		$weeks = $this->input->post('pweeks');
		$day = $this->input->post('day');
		$stime = $this->input->post('stime');
		$etime = $this->input->post('etime');
		$rate = $this->input->post('rate');
		
		$this->contract_model->update($id, $sdate, $edate, $weeks, $day, $stime, $etime, $rate);
		
		//$data['saved']='Your form is incomplete - please complete all four sections of your employement form';
		//$data['error']=true;
		redirect('contract/current');

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