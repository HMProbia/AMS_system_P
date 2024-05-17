<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller { 
	function __construct() {
		parent::__construct();
		
		$this->load->helper('url');
	} 
    public function index()  
	{   
		_checksession();
		 $this->load->view("menu");
		
		
		
	}  


	function testpage(){
		
		
		$this->load->view("menu");
		
		
	}

	


}