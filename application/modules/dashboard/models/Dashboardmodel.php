<?php
class DashboardModel extends CI_Model {

	function __construct() {
		parent::__construct();
		
	}

	function get_user_info(){

	
		 $sql = "SELECT * FROM USER_INFO WHERE USER_ID='" . $userID . "'";
		$query = $this->db->query($sql)->row();
		return @$query;	 
	}

}


     /* public function login($post)  
     {  
          $this->db->select('*'); 
          $this->db->from('tbl_user'); 
          $this->db->where('USERNAME', $post['username']);  
          $this->db->where('PASSWORD', $post['password']);  
          $query = $this->db->get();
          return $query;  
          //SELECT * FROM users WHERE username = '$username' AND password = '$password'  
          
     }   */





  
