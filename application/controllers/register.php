<?php
class Register extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load the 'User' model
		$this->load->model('user_model');
		$this->load->library('session');
		error_reporting (0);
	}
	 
	function index()
	{
		
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		
		//Some data validation.
		$this->form_validation->set_rules('email', 'Email', 'is_unique[users.Email]');

		$this->form_validation->set_rules('fname', 'first name', 'required');
		$this->form_validation->set_rules('lname', 'last name', 'required');
		$this->form_validation->set_rules('email', 'e-mail', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
		$this->form_validation->set_message("is_unique", "email already exists");

		//If data validation hasn't passed
		if ($this->form_validation->run() == FALSE){
			$this->load->view('register',$data);
		}
		else
		{
			$this->register();
		}
	}

	function register(){
			//Converts POSTDATA into variables
			$email = $this->input->post('email');
			$firstname = $this->input->post('fname');
			$lastname = $this->input->post('lname');
			$password = md5($this->input->post('password'));
			
			//Sends the data to the model for insertion. $result is a boolean - if registration was successful, the value will be true
			$result = $this->user_model->register($email, $firstname, $lastname, $password);
			
			//Loads the 'formsuccess' view
			if ($result != false){
				//Get the ID of the last person who registered
				$userid = $this->user_model->getLastRegistered();
				//Set the ID into the session
				$data = array('UserID' => $userid, 'is_logged_in' => 1 );
				$this->session->set_userdata($data);
				//Load success page
				$this->load->view('reg_success', $data);
			}
	}
	
	
}
?>