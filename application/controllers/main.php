<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
		{
			parent::__construct();
			$this->load->library('session');
			error_reporting (0);
		}
		
	public function index()
		{
			$this->load->view('main');
		}

	public function logout()
		{
			$this->session->sess_destroy();
			$this->load->view('main');
		}
}