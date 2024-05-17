<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class logout extends CI_Controller {  
	function __construct() {
		parent::__construct();


		
		
	}
	//functions  
	public function index()  
	{  
		/* $user_id = $this->session->userdata('USER_ID'); */
		$emp_id = $this->session->userdata('EMP_ID');

	
			// update log
			$data = array(
				
				'EMP_ID' => $emp_id,
				'IP' => $_SERVER['REMOTE_ADDR'],
				'LOGIN_DATE' => date("Y-m-d H:i:s"),
				'LOGIN_STATUS' => "LOGOUT:SUCCEED",
			);
			/* print_r($data); */
			 $this->db->insert("USER_LOGIN_LOG", $data); 
		
	  //มาแก้ต่อ
		 $session_id = $this->session->userdata('session_id');
		$this->db->where("session_id", $session_id);
		$this->db->delete("CI_SESSIONS");

		$logindata = array(
			'USER_ID' => '',
			'IS_ADMIN' => '',
			'LOGIN_NAME' => '',
		);

		$this->session->unset_userdata($logindata); 

		 redirect("./login/"); 
	} 
}



	