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
			$data['eData'] = $this->employee_model->getData($this->session->userdata('UserID'), 'emergencycontacts');		
			$data['fData'] = $this->employee_model->getData($this->session->userdata('UserID'), 'financials');
			$data['cData'] = $this->employee_model->getData($this->session->userdata('UserID'), 'citizenshipstatuses');
			$data['empData'] = $this->employee_model->getData($this->session->userdata('UserID'), 'employees');
			
			$this->session->set_userdata($udata);
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			
			//Some data validation.
			
			$this->form_validation->set_rules('fname', 'first name', 'required');
			$this->form_validation->set_rules('lname', 'last name', 'required');

			//If data validation hasn't passed
			if ($this->form_validation->run() == FALSE){
			
				$this->load->view('header');
				$this->load->view('employee', $data);
			}
			else
			{
				$this->register();
			}
			
		}
	}
	
	public function view()
	{
		if ($this->checkMember()){	
			$data['eData'] = $this->employee_model->getData($this->session->userdata('UserID'), 'emergencycontacts');		
			$data['fData'] = $this->employee_model->getData($this->session->userdata('UserID'), 'financials');
			$data['cData'] = $this->employee_model->getData($this->session->userdata('UserID'), 'citizenshipstatuses');
			$data['empData'] = $this->employee_model->getData($this->session->userdata('UserID'), 'employees');
			
			
				$this->load->view('header');
				$this->load->view('employee_view', $data);

			
		}
	}
	
	function refreshData(){
		
		$empData = $this->employee_model->getData($this->session->userdata('UserID'), 'employees');
		$sessData = array('FormStatus' => $empData->IsSubmitted,  'FormID' => $empData->UserID );
		$this->session->set_userdata($sessData);
	}
	
	public function submit(){
		if($this->employee_model->checkAll($this->session->userdata('UserID'))){
			$this->employee_model->submit($this->session->userdata('UserID'));
			
			$this->refreshData();
			$data['saved']='Your form has been successfully submitted!';
			
			
			
			
			redirect('main');
			
			}
		else {
		
		$data['saved']='Your form is incomplete - please complete all four sections of your employement form';
		$data['error']=true;
					$this->load->view('header');
			$this->load->view('member', $data);
			}
		/*
		if one of the for,s is incomplete, send them back to ths apge wi error msh
		els
		sset sub flah to 1
		send them to mem pag
		*/
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
		$dob = date('Y-m-d',strtotime($this->input->post('dob')));
		$isNew = true;
		//Sends the data to the model for insertion. $result is a boolean - if registration was successful, the value will be true
		if ($this->employee_model->getData($uid, 'employees') != null)
			$isNew = false;
		$result = $this->employee_model->add($t, $uid, $fname, $mname, $lname, $addr, $state, $pcode, $dob, $gender, $isNew);
		
		//Loads the 'formsuccess' view
		if ($result != false){
			$this->refreshData();
			$data['saved'] = 'Your details have been successfully saved!';
			
			$this->load->view('header');
			$this->load->view('member', $data);
		}
	}
	
		public function financial(){

		//Converts POSTDATA into variables
		$uid = $this->session->userdata('UserID');
		$bsb = $this->input->post('bsb');
		$accno = $this->input->post('accno');
		$branch = $this->input->post('branch');
		$institution = $this->input->post('institution');
		
		
		//$this->form_validation->set_rules('lname', 'last name', 'required');
		$isNew = true;
		//Sends the data to the model for insertion. $result is a boolean - if registration was successful, the value will be true
		if ($this->employee_model->getData($uid, 'financials') != null)
			$isNew = false;
			
		$result = $this->employee_model->financials($uid, $bsb, $accno, $branch, $institution, $isNew);

		//Loads the 'formsuccess' view$this->session->set_userdata($sessData);
		if ($result != false){
			$this->refreshData();
			$data['saved']='Your financial details have been successfully saved!';
			$data['error']=false;
			$this->load->view('header');
			$this->load->view('member', $data);
		}
		}

	public function citizenship(){

		//Converts POSTDATA into variables
		$uid = $this->session->userdata('UserID');
		$cissue = $this->input->post('cissue');
		$ppno = $this->input->post('ppno');
		$vtype = $this->input->post('vtype');
		$status = $this->input->post('status');

		$isNew = true;
		//Sends the data to the model for insertion. $result is a boolean - if registration was successful, the value will be true
		if ($this->employee_model->getData($uid, 'citizenshipstatuses') != null)
			$isNew = false;
		$result = $this->employee_model->citizenship($uid, $cissue, $ppno, $vtype, $status, $isNew);

		//Loads the 'formsuccess' view
		if ($result != false){
		$this->refreshData();
			$data['saved']='Your citizenship details have been successfully saved!';
			$data['error']=false;
			$this->load->view('header');
			$this->load->view('member', $data);
		}
	}
	
	public function emergency(){

		//Converts POSTDATA into variables
		$uid = $this->session->userdata('UserID');
		$gname = $this->input->post('gname');
		$sname = $this->input->post('sname');
		$relation = $this->input->post('relation');
		$ph = $this->input->post('ph');
		$mob = $this->input->post('mob');
		
		$isNew = true;
		//Sends the data to the model for insertion. $result is a boolean - if registration was successful, the value will be true
		if ($this->employee_model->getData($uid, 'emergencycontacts') != null)
			$isNew = false;
			
		$result = $this->employee_model->emergency($uid, $gname, $sname, $relation, $ph, $mob, $isNew);

		//Loads the 'formsuccess' view
		if ($result != false){
			$this->refreshData();
			$data['saved']='Your emergency details have been successfully saved!';
			$data['error']=false;
			$this->load->view('header');
			$this->load->view('member', $data);
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