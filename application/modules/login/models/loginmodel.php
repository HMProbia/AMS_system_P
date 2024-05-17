<?php
class Loginmodel extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->library('session');
	}

	function set_user_session($emp_id ,$name,$surname,$company_id,$company_name) {
		$last_activity = time();

		 // อัพอันเก่า
		$sql = "UPDATE CI_SESSIONS SET emp_id='' WHERE emp_id='$emp_id'";
		$this->db->query($sql); 

		// สร้าง session เข้าใช้งานระบบ
		$logindata = array(
			
			'EMP_ID' => $emp_id,
			'NAME' => $name,
			'SURNAME'=>$surname,
			'LAST_ACTIVITY' => $last_activity,
			'COMPANY_ID' => $company_id,
			'COMPANY_NAME' => $company_name
		);

		$this->session->set_userdata($logindata); 
		
		$session_id = $this->session->userdata('session_id');
		

		$data2 = array(
			'last_activity' => $last_activity,
			'expire_time' => date("Y-m-d H:i:s", ($last_activity + 10800)),
			'EMP_ID' => $emp_id
		);
		$this->db->where("SESSION_ID", $session_id);
		$this->db->update("CI_SESSIONS", $data2);
		/* echo print_r($data2); */






		 //ลบ session อันเก่าออก
		   /*  $sql2 = "DELETE FROM CI_SESSIONS WHERE (user_id='') OR (user_id='0')";
		$this->db->query($sql2); */
	}	 



	function set_login_logstatus($user_id, $emp_id , $login_status) {
		$last_time = time();
		// update log
		$data = array(
			
			'EMP_id' => strtolower($emp_id),
			'IP' => $_SERVER['REMOTE_ADDR'],
			'LOGIN_DATE' => date("Y-m-d H:i:s", ($last_time + 10800)),
			'LOGIN_STATUS' => $login_status,
		);
		
		$this->db->insert("USER_LOGIN_LOG", $data);
		
	}






	// เคียร์ข้อมูล login
	function clear_data($txt = "") {
		
		$txt = trim($txt);
		$txt = str_ireplace(" ", "", $txt);
		$txt = str_ireplace("'", "", $txt);
		$txt = str_ireplace(",", "", $txt);
		$txt = str_ireplace("#", "", $txt);
		$txt = str_ireplace("\"", "", $txt);
		$txt = str_ireplace("/", "", $txt);
		$txt = str_ireplace("%", "", $txt);
		$txt = str_ireplace(" and ", "", $txt);
		$txt = str_ireplace(" or ", "", $txt);
		$txt = str_ireplace(" count(*) ", "", $txt);
		$txt = str_ireplace("#", "", $txt);
		$txt = str_ireplace("*", "", $txt);
		$txt = str_ireplace(")", "", $txt);
		$txt = str_ireplace("(", "", $txt);
		$txt = str_ireplace("=", "", $txt);
		$txt = str_ireplace("sleep", "", $txt);
		$txt = str_ireplace("select", "", $txt);
		$txt = str_ireplace("|", "", $txt);
		$txt = str_ireplace("\\", "", $txt);
		$txt = str_ireplace("if(", "", $txt);
		$txt = str_ireplace("ord(", "", $txt);
		
		return $txt;
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





  
