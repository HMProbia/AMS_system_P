<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {  
	function __construct() {
		parent::__construct();
		$this->load->helper('url');

		$this->load->model('Loginmodel');
		
	}
	//functions  
	public function index()  
	{  
	
		// ลบ user ที่อยู่นานเกินกำหนดเวลา
		$sql1 = "DELETE FROM CI_SESSIONS WHERE expire_time<now()";
		$this->db->query($sql1);

		$arrBacklist = array(
			'23.226.231.210',
			'219.116.146.98',
			'220.117.108.172'
		);

	if (!in_array($_SERVER['REMOTE_ADDR'], $arrBacklist)) {


		if ($_POST) {

			$form_emp_id = strtolower($this->input->post("form_emp_id"));
			$form_password = $this->input->post("form_password");

			

			
			if (!empty($form_emp_id) && !empty($form_password)) {
					
				$sql ="SELECT *FROM USER_INFO WHERE EMP_ID = '$form_emp_id' AND PASSWORD = '$form_password' AND IS_APPROVE='1'";
				$users = $this->db->query($sql)->row();

				$user_id =@$users->USER_ID;
				$emp_id  = @$users->EMP_ID;
				$username= @$users->USERNAME;
				$password = @$users->PASSWORD;
				$name = @$users->NAME;
				$surname= @$users->SURNAME;
				$mail= @$users->EMAIL;
				$department= @$users->DEPARTMENT;
				$job_position= @$users->JOB_POSITION;
				$company_id=@$users->COMPANY_ID;
				$company_name =@$users->COMPANY_NAME;
				$user_level= @$users->USER_LEVEL;
				$user_active= @$users->USER_ACTIVE;
				$image_profile= @$users->IMAGE_PROFILE;
				$password_emergency= @$users->PASSWORD_EMERGENCY;
				$phone= @$users->PHONE;
				$contact_address= @$users->CONTACT_ADDRESS;
				$manager_approve= @$users->MANAGER_APPROVE;
				$humane_resources_appove= @$users->HUMANE_RESOURCES_APPOVE;
				$user_is_appove= @$users->USER_IS_APPOVE; 

				/* echo print_r($sql); */
				
				//เช็คมีข้อมูลหรือไม่ถ้าไม่มี redirect กลับ login
				if (empty($emp_id) ){
					$sql ="SELECT *FROM USER_INFO WHERE EMP_ID = '$form_emp_id' AND PASSWORD_EMERGENCY = '$form_password' AND IS_APPROVE='1'";
					$users = $this->db->query($sql)->row();

					$user_id =@$users->USER_ID; //
					$emp_id  = @$users->EMP_ID;
					$username= @$users->USERNAME;
					
					$name = @$users->NAME;
					$surname= @$users->SURNAME;
					$mail= @$users->EMAIL;
					$department= @$users->DEPARTMENT;
					$job_position= @$users->JOB_POSITION;
					$company_id=@$users->COMPANY_ID;
					$company_name =@$users->COMPANY_NAME;
					$user_level= @$users->USER_LEVEL;//
					$user_active= @$users->USER_ACTIVE;
					
					$password_emergency= @$users->PASSWORD_EMERGENCY;
					
					
					$user_is_appove= @$users->USER_IS_APPOVE;
					if (empty($emp_id) ){
						echo "<script>alert('Login ไม่สำเร็จเนื่องจากรหัสพนักงาน หรือ รหัสผ่านไม่ถูกต้อง กรุณา login ใหม่');</script>";
					 
					 echo "<script> window.location.href='login' </script>";
					 echo "test";
					}
					// อัพเดทข้อมูลการเข้าใช้งาน
					$edit_date = date("Y-m-d H:i:s");
					$this->Loginmodel->set_user_session($emp_id ,$name,$surname,$company_id,$company_name);
					$this->Loginmodel->set_login_logstatus($emp_id, "$emp_id", "LOGIN:SUCCESS");
					
					
					redirect('./dashboard/');



					
					 
					
				}
				
				

				// อัพเดทข้อมูลการเข้าใช้งาน
				$edit_date = date("Y-m-d H:i:s");
				$this->Loginmodel->set_user_session($emp_id ,$name,$surname,$company_id,$company_name);
				$this->Loginmodel->set_login_logstatus($emp_id, "$emp_id", "LOGIN:SUCCESS");
				
				
				  redirect('./dashboard/'); 

				
			}
		
			
		}
		$this->load->view('display');//ดึง form login

	} else {
		echo "BLOCK IP.";
	} 
	
}



}

		

