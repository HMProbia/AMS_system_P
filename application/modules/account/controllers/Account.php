<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
	
class Account extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('AccountModel');
		
		$this->load->library('upload');
		
		_checksession();
	}

	public function index() {
		_menu();
		$this->load->view('account_content');
		
		
	}


	function account_list(){
		_menu();
		$this->load->view('account_content');
		
		
		
	}


	function account_content(){
		
				

		///
			// POST data
		$postData = $this->input->post();
		
		// Get data
		$data = $this->AccountModel->ajax_account_content($postData);
		/* echo print_r($postData); */
		echo json_encode($data);
	
	}


	//ตรวจสอบ ข้อมูล(เข้าไปดูเฉยๆ)
	function account_view($data){
		_checksession();
		__login(); 
		_menu();
		$user_id['user_id'] = $data;
		$this->load->view('account_view',$user_id);
		

	}

	//load view add data emp 
	function account_add_data_emp(){
			
		_checksession();
		__login(); 
		_menu();
		$this->load->view('account_add_data_menu_emp');


	}

	//load view chang password (HR)
	function account_edit_password($data){
		$user_id['user_id'] = $data; 
		 _menu();
		$this->load->view('change_password_account',$user_id);
	}

	//HR edit password in account user
	function account_change_password(){
		$change_password_01 = $this->input->post("change_password_01");
		$change_password_02 = $this->input->post("change_password_02");
		$emp_id = $this->input->post("emp_id");
		 
		if(!empty($change_password_01) && !empty($change_password_02) ){
			if  (empty($change_password_01) && empty($change_password_02) ){
				echo "<script>alert('ไม่สามารถดำเนินการได้เนื่องจาก Password ต้องไม่เป็นค่าว่าง');</script>";
				echo "<script> window.location.href='account_list' </script>";
				}else if ($change_password_01  != $change_password_02 ){
					echo "<script>alert('ไม่สามารถดำเนินการได้เนื่องจาก Password ทั้ง2 ช่องไม่เหมือนกัน');</script>";
					echo "<script> window.location.href='account_list' </script>";
					}else if ($change_password_01  = $change_password_02 ){
						$this->AccountModel->change_password_account_model($emp_id,$change_password_02);
						echo "<script>alert('เปลี่ยนแปลงรหัสผ่านสำเร็จ');</script>";
						echo "<script> window.location.href='account_list' </script>";
					}
		}redirect('./account/account_list/'); 
		
	}




	//ตรวจสอบ ข้อมูล(เข้าไปดูเฉยๆ)
	function view_profile(){
		_checksession();
		__login();	
		_menu();
		
		$this->load->view('profile');
		

	}

	//All user edit password my
	function user_edit_password(){
		
		$password_1=$this->input->post("password_1");
		$password_2=$this->input->post("password_2");
		
		$emp_id_session =$this->session->userdata("EMP_ID");
		$user_id =$this->session->userdata("USER_ID");
		

		
		$type = @end(@explode(".", @$_FILES['file_upload']['name']));
		$attach_dir = "upload/profile/";
		$attach_file = $attach_dir . @$_FILES['file_upload']['name'];
		$attach_name = @$_FILES['file_upload']['name'];
		
		if (!empty($_FILES['file_upload']['name'])) {
			if (move_uploaded_file($_FILES['file_upload']['tmp_name'], $attach_file)) {
				$this->AccountModel->upload_file($attach_name,$user_id,$emp_id_session);
						
						//ส่วน password 		
					 if(!empty($password_1) && !empty($password_2) ){
						if  (empty($password_1) && empty($password_2) ){
							echo "<script>alert('ไม่สามารถดำเนินการได้เนื่องจาก Password ต้องไม่เป็นค่าว่าง');</script>";
							echo "<script> window.location.href='view_profile' </script>";
							}else if ($password_1  != $password_2 ){
								echo "<script>alert('ไม่สามารถดำเนินการได้เนื่องจาก Password ทั้ง2 ช่องไม่เหมือนกัน');</script>";
								echo "<script> window.location.href='view_profile' </script>";
								}else if ($password_1  = $password_2 ){
									$this->AccountModel->user_edit_password_model($emp_id_session,$password_2);
									echo "<script>alert('เปลี่ยนแปลงข้อมูลสำเร็จ');</script>";
									echo "<script> window.location.href='view_profile' </script>";
								}
					} echo "<script> window.location.href='view_profile' </script>";
				 
				}




			} else 
			//ไม่ได้อัพรูป
					//ส่วน password 		
					if(!empty($password_1) && !empty($password_2) ){
						if  (empty($password_1) && empty($password_2) ){
							echo "<script>alert('ไม่สามารถดำเนินการได้เนื่องจาก Password ต้องไม่เป็นค่าว่าง');</script>";
							echo "<script> window.location.href='view_profile' </script>";
							}else if ($password_1  != $password_2 ){
								echo "<script>alert('ไม่สามารถดำเนินการได้เนื่องจาก Password ทั้ง2 ช่องไม่เหมือนกัน');</script>";
								echo "<script> window.location.href='view_profile' </script>";
								}else if ($password_1  = $password_2 ){
									$this->AccountModel->user_edit_password_model($emp_id_session,$password_2);
									echo "<script>alert('เปลี่ยนแปลงข้อมูลสำเร็จ');</script>";
									echo "<script> window.location.href='view_profile' </script>";
								}
					} echo "<script> window.location.href='view_profile' </script>";

	}



 
	 function edit_data_user_all(){
			$from_emp =$this->input->post("from_emp");
			$from_name=$this->input->post("from_name");
			$from_surname=$this->input->post("from_surname");
			$from_gender=$this->input->post("from_gender");
			$from_email=$this->input->post("from_email");
			$from_department=$this->input->post("from_department");
			$from_job_position=$this->input->post("from_job_position");
			$from_company=$this->input->post("from_company");
			$from_phone=$this->input->post("from_phone");
			$from_address=$this->input->post("from_address");
			$from_manager_approve=$this->input->post("from_manager_approve");
			$from_humane_resources_approve=$this->input->post("from_humane_resources_approve");
			$from_password_1=$this->input->post("from_password_1");
			$from_password_2=$this->input->post("from_password_2");
			$user_id=$this->input->post("form_user_id");
			$user_status=$this->input->post("form_user_status");
			


			$type = @end(@explode(".", @$_FILES['file_upload']['name']));
			$attach_dir = "upload/profile/";
			$attach_file = $attach_dir . @$_FILES['file_upload']['name'];
			$attach_name = @$_FILES['file_upload']['name'];


			
			
			if (!empty($_FILES['file_upload']['name'])) {
				if (move_uploaded_file($_FILES['file_upload']['tmp_name'], $attach_file)) {
					$this->AccountModel->upload_file2($attach_name,$user_id,$from_emp);

					if (empty($from_emp) && empty($from_name)  && empty($from_surname)&&empty($from_gender)&& empty($from_email)&& empty($from_department)&& empty($from_job_position)
						&& empty($from_company)&& empty($from_phone)&& empty($from_address)&& empty($from_manager_approve)&& empty($from_humane_resources_approve)){
				
					echo "<script>alert('ไม่สามารถรับค่าว่างได้ กรุณาตรวจสอบ และ ส่งข้อมูลกลับมาใหม่');</script>";
					echo "<script> window.location.href='account_list' </script>"; 
					}else 
				$this->AccountModel->hr_edit_profile_user($from_emp,$from_name,$from_surname,$from_gender,$from_email,$from_department,
				$from_job_position,$from_company,$from_phone,$from_address,$from_manager_approve,$from_humane_resources_approve,$user_id,$user_status);
				
			
				echo "<script>alert('ปรับปรุงข้อมูลสำเร็จ');</script>";
				echo "<script> window.location.href='account_list' </script>";
				}
			}else
				//อัพเดทข้อมูลอย่างเดียวไม่เอารูป
				if (empty($from_emp) && empty($from_name)  && empty($from_surname)&&empty($from_gender)&& empty($from_email)&& empty($from_department)&& empty($from_job_position)
						&& empty($from_company)&& empty($from_phone)&& empty($from_address)&& empty($from_manager_approve)&& empty($from_humane_resources_approve)
						){
				
					echo "<script>alert('ไม่สามารถรับค่าว่างได้ กรุณาตรวจสอบ และ ส่งข้อมูลกลับมาใหม่');</script>";
					echo "<script> window.location.href='account_list' </script>"; 
					}else 
				$this->AccountModel->hr_edit_profile_user($from_emp,$from_name,$from_surname,$from_gender,$from_email,$from_department,
				$from_job_position,$from_company,$from_phone,$from_address,$from_manager_approve,$from_humane_resources_approve,$user_id,$user_status);
				
			
				echo "<script>alert('ปรับปรุงข้อมูลสำเร็จ');</script>";
				echo "<script> window.location.href='account_list' </script>";
	} 



	function account_delete($data){
		$user_id['user_id'] = $data; 
		if(!empty($user_id) ){
			$this->AccountModel->user_delete($data);
			  echo "<script>alert('ลบข้อมูลสำเร็จ');</script>";
			 /* echo "<script> window.location.href='./account/account_list/' </script>";  */
			 redirect('./account/account_list/'); 
		}
		 
		
		
	}


	function import_user_all(){
			
		_checksession();
		__login(); 
		_menu();
		$this->load->view('import_excel_user_');


	}


	function import_file_user_all(){
		_checksession();
		__login();
		$user_id = $this->session->userdata("USER_ID");
		$date_action=date("Y-m-d H:i:s");
		$status="IMPORT:FALI";
		/* $date_now=date("Y-m-d"); */
		$type = @end(@explode(".", @$_FILES['file_upload']['name']));
		$attach_dir = "upload/import_user/";
		$attach_file = $attach_dir . @$_FILES['file_upload']['name'];
		$attach_name = @$_FILES['file_upload']['name'];
		
		
		 if($type !="xlsx" AND $type !="xls"){
			$this->AccountModel->update_user_import_log($user_id,$attach_name,$type,$attach_file,$date_action,$status);
			echo "<script>alert('นำเข้าข้อมูลไม่สำเร็จ นำเขาได้เฉพาะไฟล์ Excel เท่านั้น (.xlsx)');</script>";
				echo "<script> window.location.href='import_user_all' </script>";
				
				
		}

		if (move_uploaded_file($_FILES['file_upload']['tmp_name'], $attach_file)) {
			
			 
			  include "application/modules/account/views/imports/account_add_data_user_all_save.php";
			  $status="IMPORT:SUCCESS";
			  $this->AccountModel->update_user_import_log($user_id,$attach_name,$type,$attach_file,$date_action,$status);
			 
			@unlink($attach_file); 
		}	
		
		
		

	}



	function account_edit_permission(){
		__login(); 
		_menu();
		
		
		$this->load->view('account_edit_permission');
	}
	function account_edit_permission_content(){
		// POST data
		$postData = $this->input->post();
		/* echo print_r($postData); */
		// Get data
		$data = $this->AccountModel->ajax_search_data_permission($postData);
		echo json_encode($data);
		
	}

	function account_edit_permission_edituser($data){
		__login(); 
		_menu();
		$user_id['user_id'] = $data; 
		 
		$this->load->view('account_edit_permission_user',$user_id);
	}

	function account_edit_permisstion_pro_sent_to_db(){
		$main_menu1 = $this->input->post("items1_send");
		$sub_menu2 = $this->input->post("items2_send");
		$emp_id = $this->input->post("from_emp");
		
		$this->AccountModel->update_user_edit_permission($main_menu1,$sub_menu2,$emp_id);
		
		
		
		
	}

	function load_view_add_manager(){
		_menu();
		$this->load->view('account_add_manager_approve');
	}
	function account_load_view_add_managercontent(){
		
				

		///
			// POST data
		$postData = $this->input->post();
		
		// Get data
		$data = $this->AccountModel->ajax__load_view_add_manager_content($postData);
		/* echo print_r($postData); */
		echo json_encode($data);
	
	}


	function view_data_manager_add_approve($data){
		_menu();
		$user_id['user_id'] = $data; 
		$this->load->view('account_add_manager_approve_view',$user_id);
	}
	function data_view_manager_add_approve_to_db(){
		$emp_id = $this->input->post("from_emp");
		$user_name = $this->input->post("from_name");
		$user_surname = $this->input->post("from_surname");
		$user_id = $this->input->post("form_user_id");
		$manager_emp_id ="";

		$sql= "SELECT MANAGER_EMP_ID FROM MANAGER_TYPE  WHERE IS_APPROVE='1'AND MANAGER_EMP_ID='$emp_id'";
		$query =$this->db->query($sql)->result();;
		foreach($query as $row ){

			$manager_emp_id  = $row->MANAGER_EMP_ID;
		}
		
		if ($manager_emp_id ==="" ){
			
			
			$this->AccountModel->insert_add_manager_approve($emp_id,$user_name,$user_surname);
			echo "<script>alert('เพิ่มข้อมูลสำเร็จโปรดตรวจสอบข้อมูล');</script>";
				echo "<script> window.location.href='load_view_add_manager' </script>";
		}elseif($manager_emp_id == $emp_id){ 
		echo "<script>alert('เพิ่มข้อมูลไม่สำเร็จเนื่องจากมีข้อมูลอยู่แล้วโปรดแจ้ง IT เพื่อทำการตรวจสอบฐานข้อมูล');</script>";
				echo "<script> window.location.href='view_data_manager_add_approve/$user_id' </script>";
		}
	}



	function load_view_add_hr(){
		_menu();
		$this->load->view('account_add_hr_approve');
	}

	function account_load_view_add_hrcontent(){
		// POST data
		$postData = $this->input->post();
		/* echo print_r($postData); */
		// Get data
		$data = $this->AccountModel->ajax__load_view_add_hr_content($postData);
		echo json_encode($data);
		
	}


	function view_data_hr_add_approve($data){
		_menu();
		$user_id['user_id'] = $data; 
		$this->load->view('account_add_hr_approve_view',$user_id);
	}
	function data_view_hr_add_approve_to_db(){
		$emp_id = $this->input->post("from_emp");
		$user_name = $this->input->post("from_name");
		$user_surname = $this->input->post("from_surname");
		$user_id = $this->input->post("form_user_id");
		$humane_resources_emp_id ="";

		$sql= "SELECT HUMANE_RESOURCES_EMP_ID FROM HUMANE_RESOURCES_TYPE  WHERE IS_APPROVE='1'AND HUMANE_RESOURCES_EMP_ID='$emp_id'";
		$query =$this->db->query($sql)->result();;
		foreach($query as $row ){

			$humane_resources_emp_id  = $row->HUMANE_RESOURCES_EMP_ID;
		}

		
		

		if ($humane_resources_emp_id ==="" ){
			
			
			$this->AccountModel->insert_add_hr_approve($emp_id,$user_name,$user_surname);
			echo "<script>alert('เพิ่มข้อมูลสำเร็จโปรดตรวจสอบข้อมูล');</script>";
				echo "<script> window.location.href='load_view_add_hr' </script>";
		}elseif($humane_resources_emp_id == $emp_id){ 
		echo "<script>alert('เพิ่มข้อมูลไม่สำเร็จเนื่องจากมีข้อมูลอยู่แล้วโปรดแจ้ง IT เพื่อทำการตรวจสอบฐานข้อมูล');</script>";
				echo "<script> window.location.href='view_data_hr_add_approve/$user_id' </script>";
		}
	}


	
		
		
	
	



	
}

