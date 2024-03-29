<?php
class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load the 'User' model
		$this->load->model('user_model');
		$this->load->model('employee_model');
		$this->load->library('session');
		$this->load->helper('url');
		error_reporting (0);
	}
	 
	function index()
	{
	if($this->session->userdata('is_logged_in')){
			$this->load->view('header');
			$this->load->view('member');
	}
		else{
		$this->validation();
	}
		
	}
		
	public function validation(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('id', 'UserID', 'required|callback_dbChecking');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('header');
			$this->load->view('login');
		}
		else
		{
		
			$empData = $this->employee_model->getEmployee($this->input->post('id'));
			
			$data = array('UserID' => $this->input->post('id'), 'is_logged_in' => 1, 'FormStatus' => $empData->isSubmitted , 'FormID' => $empData->UserID );
			
		    $this->session->set_userdata($data);
			redirect('member');
			//$udata = array( );
			//$this->load->view('header');
			//$this->load->view('member',$data);
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
	
	public function logout(){
		$this->session->sess_destroy();
		redirect('main');
	}   
}
?>