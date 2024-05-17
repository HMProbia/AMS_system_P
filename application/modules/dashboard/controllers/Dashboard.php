<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	
	function __construct() {
		parent::__construct();
		$this->load->model('login/LoginModel');
		$this->load->model('dashboard/DashboardModel');
		$emp_id = $this->session->userdata('EMP_ID');
		$this->load->helper('url');
	
	} 

	public function index() {
		_checksession();
		
		_menu();
		$this->load->view('display');
		
		
	}

	

}

