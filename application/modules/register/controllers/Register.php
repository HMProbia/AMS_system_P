<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller { 
	function __construct() {
		parent::__construct();
		$this->load->model('RegistersModel');
		/* $this->load->helper('url'); */
	} 
    public function index()  
	{   
		
		 $this->load->view("register");
		/*  $this->load->model("register/registerModel"); */
		
	}  


	function register_frist(){
		
		
		$first_name = $this->input->post("first_name");
		$last_name  = $this->input->post("last_name");
		$emp_id  =$this->input->post("emp_id");
		$password_emergency  =$this->input->post("password_emergency");
		$birthday  =$this->input->post("birthday");
		$gender  =$this->input->post("gender");
		$email  =$this->input->post("email");
		$phone  = $this->input->post("phone");
		$job_start_date  = $this->input->post("job_start_date");
		$end_probatio  =$this->input->post("end_probatio");
		$address  = $this->input->post("address");
		$department  =$this->input->post("department");
		$job_position  =$this->input->post("job_position");
		$company  =$this->input->post("company");
		$manager_approve  =$this->input->post("manager_approve");
		$humane_resoures_approve  =$this->input->post("humane_resoures_approve");
		/* 
		echo $company; */
		
		  $this->RegistersModel->insert_data_register_frist($first_name,$last_name,$emp_id,$password_emergency,$birthday,$gender,$email,$phone,$job_start_date,$end_probatio
		 ,$address,$department,$job_position,$company,$manager_approve,$humane_resoures_approve); 
														
		
	

	}

	function import_view(){
		$this->load->view("import_view");
	}


}