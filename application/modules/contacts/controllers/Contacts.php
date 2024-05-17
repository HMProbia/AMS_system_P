<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacts extends CI_Controller { 
	function __construct() {
		parent::__construct();
		/* $this->load->model('RegistersModel'); */
		/* $this->load->helper('url'); */
	} 
    public function index()  
	{   
		_menu();
		 $this->load->view("contacts");
		/*  $this->load->model("register/registerModel"); */
		
	}  


	


}