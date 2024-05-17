<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Systemmaintenance extends CI_Controller {  
	function __construct() {
		parent::__construct();


		
		
	}
	//functions  
	public function index()  
	{  
	
		$this->load->view("systemmaintenance");
	}


}