<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH.'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xls;


class Eleave extends CI_Controller {  
	function __construct() {
		parent::__construct();
		$this->load->library('session');
		// load excel library
		/* $this->load->library('Excel'); */
		$this->load->model('EleaveModel');
		
		
	}
	//functions  
	public function index()  
	{  
	
	}


	function eleave_add_data(){
		_menu();
		$this->load->view('eleave_add_order');
	}

	function eleave_add_data_send(){
		$form_user_id= $this->input->post("form_user_id");
		$form_emp= $this->input->post("form_emp");
		$form_name= $this->input->post("form_name");
		$form_surname= $this->input->post("form_surname");
		
		$form_email= $this->input->post("form_email");
		$form_company_name= $this->input->post("form_company_name");
		$form_department= $this->input->post("form_department");
		$form_job_position= $this->input->post("form_job_position");
		$form_phone= $this->input->post("form_phone");
		$form_eleave_type= $this->input->post("form_eleave_type");
		$form_date_start= $this->input->post("form_date_start");
		$form_date_end= $this->input->post("form_date_end");
		$form_range_time= $this->input->post("form_range_time");
		$form_time_start= $this->input->post("form_time_start");
		$form_time_end= $this->input->post("form_time_end");
		$form_address_eleave= $this->input->post("form_address_eleave");
		$form_manager_approve= $this->input->post("form_manager_approve");
		$form_humane_resources_approve= $this->input->post("form_humane_resources_approve");
		$form_number_time_eleave= $this->input->post("form_number_time_eleave"); 
		$form_cause= $this->input->post("form_cause");
		
		



		$sql="SELECT ELEAVE_TYPE_ID,ELEAVE_TYPE_NAME FROM ELEAVE_TYPE WHERE IS_APPROVE='1' AND ELEAVE_TYPE_ID ='$form_eleave_type'";
		$query = $this->db->query($sql)->result();
                foreach($query as $row){
                    $eleave_type_id  = $row->ELEAVE_TYPE_ID;
                 	$eleave_type_name = $row->ELEAVE_TYPE_NAME;
				}
		
				

		$user_id =$this->session->userdata("USER_ID");
		$emp_id_session =$this->session->userdata("EMP_ID");
		$name_session =$this->session->userdata("NAME");
		$date_action=date("Y-m-d H:i:s");
		$status="0";
		
		$type = @end(@explode(".", @$_FILES['file_upload']['name']));
		$attach_dir = "upload/document_eleave/";
		$attach_file = $attach_dir . @$_FILES['file_upload']['name'];
		//เช็คชื่อ
		if (!empty($attach_name)) {
			@$_FILES['file_upload']['name']=$emp_id_session."_".$name_session."_".date('d_m_Y_H_i_s').".".$type;

		}else $attach_name = @$_FILES['file_upload']['name'];


		if($form_range_time=="1"){
			$eleavename="ช่วงเช้า";
		}else if($form_range_time=="2"){
			$eleavename="ช่วงบ่าย";
		}else if($form_range_time=="3"){
			$eleavename="เต็มวัน";
		}

		$is_approve="1";
		/* echo $eleavename; */
		 $this->EleaveModel->eleave_data_add_order($form_user_id,$form_emp,$eleave_type_id,$eleave_type_name,$form_name
		,$form_surname,$form_email,$form_company_name,$form_department,$form_job_position,$form_phone,
		$form_date_start,$form_date_end,$form_range_time,$eleavename,$form_time_start,$form_time_end,$form_number_time_eleave,
		$form_address_eleave,$form_cause,$form_manager_approve,$form_humane_resources_approve,$date_action,$status,$attach_name,$is_approve);
	
		if (!empty($_FILES['file_upload']['name'])) {
			$status="UPLOAD:FALI";
			if (move_uploaded_file($_FILES['file_upload']['tmp_name'], $attach_file)) {
				$status="UPLOAD:SUCCESS";
				
				$this->EleaveModel->update_user_import_log($user_id,$attach_name,$type,$attach_file,$date_action,$status);
				
				
				
				
				}




		} 

	}


	function eleave_status(){
		__login(); 
		_menu();
		
		
		$this->load->view('eleave_view_status');
	}

	function eleave_status_load_data_content(){
		// POST data
		$postData = $this->input->post();
		/* echo print_r($postData); */
		// Get data
		$data = $this->EleaveModel->ajax_search_data_status($postData);
		 /* echo print_r($data); */
		echo json_encode($data);
	}


	function eleave_delete($data){
		_menu();
		/* __login();  */
		
		$eleave_id['eleave_id'] = $data; 

		

		/* $sql1="SELECT ELEAVE_ID,ELEAVE_NAME,ELEAVE_SURNAME,ELEAVE_COMPANY_NAME FROM ELEAVE WHERE   ELEAVE_ID ='$data'";
		$query1 =$this->db->query($sql1)->row();
		$eleave_id= @$query1->ELEAVE_ID; */

		$this->load->view('eleave_view_delete',$eleave_id);
		/* $id= $this->input->post("from_test"); */
		/* $eleave_id['ELEAVE_ID'] = $id; */ 
		
		/* $sql1="SELECT ELEAVE_NAME,ELEAVE_SURNAME,ELEAVE_COMPANY_NAME FROM ELEAVE WHERE ELEAVE_ID ='$id'";
		$query1 =$this->db->query($sql1)->row();
		$eleave_id= @$query1->ELEAVE_ID; */
		/* echo print_r($query1); */

		/* echo "เทสๆ"; */
		/* if(!empty($user_id) ){
			$this->EleaveModel->eleave_delete_order($data);
			  echo "<script>alert('ลบข้อมูลสำเร็จ');</script>";
			 
			 redirect('./eleave/eleave_status/'); 
		} */
		 
		
		
	}
	function eleave_delete_status(){
		$form_eleave_delete_status= $this->input->post("form_eleave_delete_status");
		$form_eleave_id= $this->input->post("form_eleave_id");
		/* echo $form_eleave_delete_status; */
		if($form_eleave_delete_status == "1"){
			
			//load model eleave delete order 
			
			$this->EleaveModel->eleave_delete_status($form_eleave_id);
			echo "<script>alert('คุณได้ลบคำขอการลาเรียบร้อยแล้ว');</script>";
		echo "<script> window.location.href='eleave_status' </script>";
		}else if($form_eleave_delete_status == "0"){
			/* echo "คุณเลือกเก็บไว้"; */
			//ย้อนกลับไปหน้าที่แล้ว
			echo "<script>alert('คุณได้เลือกทำรายการเก็บข้อมูลไว้ ระบบกำลังพากลับไปยังหน้าตางสถานะ');</script>";
			echo "<script> window.location.href='eleave_status' </script>";
		}else echo "กรุณาติดต่อฝ่าย IT";


	}


	function view_edit_data_eleave($data){
		__login(); 
		$eleave_id['eleave_id'] = $data;
		_menu();
		$this->load->view('eleave_edit_order',$eleave_id);
	}



	function view_approve_manager(){
		_check_permission_approve_manager();
		_menu();
		$this->load->view('eleave_view_approve_manager');
	}

	function view_approve_hr(){
		_check_permission_approve_manager();
		_menu();
		$this->load->view('eleave_view_approve_hr');
	}

	function view_report_data(){
		/* _check_permission_approve_manager(); */
		_menu();
		$this->load->view('eleave_report_data');
	}

	function eleave_report_data_export(){
		__login(); 
		_check_permission_approve_manager();
		//ดึง EMP_ID กับ USER_LEVEL จาก SESSION เพื่อเอาไปคำนวณ
		$emp_id =$this->session->userdata("EMP_ID");
		$user_level =$this->session->userdata("USER_LEVEL");

		//เช็คสิทธิแล้ว ตั้งให้เห็นเฉพาะตนเองถ้าสิทธิไม่ถึง
		/* if($user_level >="4"){
			$searchemp_id=$emp_id;
		}if($user_level <="3"){
			$searchemp_id="";
		} */


		
		$data = array(
			'form_eleave_type' => $eleave_type,
			'form_company_name' => $company_name,
			'name' => $name,
			'form_date_start' => $date_start,
			'form_date_end' => $date_end,
			'form_eleave_status' => $eleave_status,
		);

		$this->load->view('export/eleave_report_status_all_export', $data);
		

	}


	function update_data_edit_order(){

		$form_eleave_id= $this->input->post("form_eleave_id");
		$form_eleave_emp= $this->input->post("form_eleave_emp");
		$form_eleave_name= $this->input->post("form_eleave_name");
		$form_eleave_surname= $this->input->post("form_eleave_surname");
		$form_eleave_email= $this->input->post("form_eleave_email");
		$form_eleave_company_name= $this->input->post("form_eleave_company_name");
		$form_eleave_department= $this->input->post("form_eleave_department");
		$form_eleave_job_position= $this->input->post("form_eleave_job_position");
		$form_eleave_phone= $this->input->post("form_eleave_phone");
		$form_eleave_type= $this->input->post("form_eleave_type");
		$form_eleave_date_start= $this->input->post("form_eleave_date_start");
		$form_eleave_date_end= $this->input->post("form_eleave_date_end");
		$form_eleave_range_time= $this->input->post("form_eleave_range_time");
		$form_eleave_time_start= $this->input->post("form_eleave_time_start");
		$form_eleave_time_end= $this->input->post("form_eleave_time_end");
		$form_eleave_address_eleave= $this->input->post("form_eleave_address_eleave");
		$form_eleave_manager_approve= $this->input->post("form_eleave_manager_approve");
		$form_eleave_humane_resources_approve= $this->input->post("form_eleave_humane_resources_approve");
		$form_eleave_number_time_eleave= $this->input->post("form_eleave_number_time_eleave"); 
		$form_eleave_cause= $this->input->post("form_eleave_cause");

		$this->EleaveModel->update_order_edit($form_eleave_id
		,$form_eleave_emp
		,$form_eleave_name
		,$form_eleave_surname
		,$form_eleave_email
		,$form_eleave_company_name
		,$form_eleave_department
		,$form_eleave_job_position
		,$form_eleave_phone
		,$form_eleave_type
		,$form_eleave_date_start
		,$form_eleave_date_end
		,$form_eleave_range_time
		,$form_eleave_time_start
		,$form_eleave_time_end
		,$form_eleave_address_eleave
		,$form_eleave_manager_approve
		,$form_eleave_humane_resources_approve
		,$form_eleave_number_time_eleave
		,$form_eleave_cause);
		
		echo "<script>alert('เปลี่ยนแปลงข้อมูลสำเร็จ');</script>";
		echo "<script> window.location.href='eleave_status' </script>";
		
	}

	//โหลดกราฟ eleave report รายงานการลา
	function graph_eleave_report_content(){
		//รับข้อมูล ใส่ตัวแปร
		$form_eleave_type = $this->input->post("form_eleave_type");
       
        
		$year = $this->input->post("year");
		$form_eleave_status = $this->input->post("form_eleave_status");
		
		//รวมตัวแปรเพื่อเตรียมส่งข้อมูล
		$data = array(
            'form_eleave_type' => $form_eleave_type,
			'year' => $year,
			'form_eleave_status' => $form_eleave_status
			
        );
		//โหลดคอนเทนและส่งข้อมูล
		__viewContent('report/eleave_graph_report_content', $data);
		
		
	}
	
	function check_the_remaining_days(){
		__login(); 
		_menu();
		
		$this->load->view('eleave_check_the_remaining_days');
	}
	function eleave_manager_approve(){
		__login(); 
		_menu();

		$this->load->view('eleave_manager_approve');
	}
	function eleave_manager_approve_load_data_content(){
		// POST data
		$postData = $this->input->post();
		/* echo print_r($postData); */
		// Get data
		$data = $this->EleaveModel->ajax_search_data_manager_approve($postData);
		 /* echo print_r($data); */
		echo json_encode($data);
	}


	function eleave_view_edit_status_manager_approve($data){
		__login(); 
		$eleave_id['eleave_id'] = $data;
		_menu();
		$this->load->view('eleave_view_approve_manager',$eleave_id);
	}

	function eleave_edit_data_status_manager(){
		$form_eleave_status_type= $this->input->post("form_eleave_status_type");
		$form_eleave_id= $this->input->post("form_eleave_id");
		$form_eleave_emp= $this->input->post("form_eleave_emp");

			/* echo $form_eleave_status_type;
			echo "<BR>";
			echo $form_eleave_id;
			echo "<BR>";
			echo $form_eleave_emp;
			echo "<BR>"; */

		
		if($form_eleave_status_type == "1"){

			/* echo "อนุมัติ"; */
			$status_manager="อนุมัติ";
			$this->EleaveModel->update_status_data_eleave_manager($form_eleave_status_type,$form_eleave_emp,$form_eleave_id);
			$this->EleaveModel->insert_order_approve_manager($form_eleave_id,$form_eleave_emp,$status_manager);


		}else if($form_eleave_status_type == "2"){

			/* echo "ไม่อนุมัติ"; */

			$status_manager="ไม่อนุมัติ";
			$this->EleaveModel->update_status_data_eleave_manager($form_eleave_status_type,$form_eleave_emp,$form_eleave_id);
			$this->EleaveModel->insert_order_approve_manager($form_eleave_id,$form_eleave_emp,$status_manager);
			
		}
		else {
			echo "<script>alert('ระบบทำงานผิดพลาด กรุณาตรวจสอบข้อมูลใหม่อีกครั้ง');</script>";
			echo "<script> window.location.href='eleave_manager_approve' </script>";
		}

		

		//ถ้ามีให้ alert แล้วอัพเดทข้อมูล status และ เก็บ log ว่า manager คนใดทำรายการแล้วรีเทิร์นกลับไปหน้า eleave manager
		/* if($form_eleave_status_type AND $form_eleave_id AND $form_eleave_emp !="" ){
			if($form_eleave_status_type == "4"){
				$eleave_status_approve ="ไม่อนุมัติ";
				//ปรับสถานะยกเลิก และ เก็บข้อมูลในระบบของผู้บังคับบัญชาว่าได้มีการยกเลิก
				$this->EleaveModel->insert_order_approve_manager($form_eleave_id,$form_eleave_emp,$eleave_status_approve);
			}else if($form_eleave_status_type == "1"){
				$eleave_status_approve ="อนุมัติ";
				$this->EleaveModel->update_status_data_eleave($form_eleave_status_type,$form_eleave_id,$form_eleave_emp);
			$this->EleaveModel->insert_order_approve_manager($form_eleave_id,$form_eleave_emp,$eleave_status_approve);
			echo "<script>alert('เปลี่ยนสถานะอนุมัติเสร็จสิ้น รอฝ่ายบุคคลอนุมัติต่อไป');</script>";
			echo "<script> window.location.href='eleave_manager_approve' </script>";
			}else {
				echo "<script>alert('ระบบทำงานผิดพลาด กรุณาตรวจสอบข้อมูลใหม่อีกครั้ง');</script>";
				echo "<script> window.location.href='eleave_manager_approve' </script>";
			}
				
		}else //ถ้าไม่มีให้ alert แล้วรีเทิร์นกลับไปหน้า eleave manager
		echo "<script>alert('ไม่สามารถเปลี่ยนแปลงได้เนื่องจากข้อมูลไม่ถูกต้อง');</script>";
		echo "<script> window.location.href='eleave_manager_approve' </script>"; */	
	}



	function eleave_hr_approve(){
		__login(); 
		_menu();
		
		$this->load->view('eleave_hr_approve');
	}

	function eleave_hr_approve_load_data_content(){
		// POST data
		$postData = $this->input->post();
		/* echo print_r($postData); */
		// Get data
		$data = $this->EleaveModel->ajax_search_data_hr_approve($postData);
		 /* echo print_r($data); */
		echo json_encode($data);
	}
	function eleave_view_edit_status_hr_approve($data){
		__login(); 
		_menu();
		$eleave_id['eleave_id'] = $data;
		$this->load->view('eleave_view_approve_hr',$eleave_id);
	}

	function eleave_edit_data_status_hr(){
		$form_eleave_status_type= $this->input->post("form_eleave_status_type");
		$form_eleave_id= $this->input->post("form_eleave_id");
		$form_eleave_emp= $this->input->post("form_eleave_emp");
		$form_eleave_type= $this->input->post("form_eleave_type");
		$form_number_time_eleave= $this->input->post("form_number_time_eleave");

		
		//ถ้ามีให้ alert แล้วอัพเดทข้อมูล status และ เก็บ log ว่า hr คนใดทำรายการแล้วรีเทิร์นกลับไปหน้า eleave hr
		
			
			//เช็คเก็บข้อมูล order ของ HR 
			if($form_eleave_status_type == "1"){
				echo $form_eleave_status_type;
				echo "<BR>";
				echo $form_eleave_id;
				echo "<BR>";
				echo $form_eleave_emp;
				echo "<BR>";
				echo $form_eleave_type;
				echo "<BR>";
				echo $form_number_time_eleave;
				
				//ปรับสถานะยกเลิก และ เก็บข้อมูลในระบบของผู้บังคับบัญชาว่าได้มีการยกเลิก
				$status_manager ="อนุมัติ";
				 $this->EleaveModel->update_status_data_eleave_hr($form_eleave_status_type,$form_eleave_id,$form_eleave_emp);
				/* echo print_r($r); */
				$this->EleaveModel->insert_order_approve_hr($form_eleave_id,$form_eleave_emp,$status_manager);

							//ตัดเวลา///
						if($form_eleave_type =="ลากิจ"){
							//เริ่มการตัดเวลา
							$this->EleaveModel->diffday_hour_minute_conem($form_eleave_status_type,$form_eleave_id,$form_eleave_emp,$form_number_time_eleave);
							
							echo "<script>alert('เปลี่ยนสถานะอนุมัติเสร็จสิ้น รอระบบปรับสถานะภายใน 5 นาที');</script>";
							echo "<script> window.location.href='eleave_hr_approve' </script>";
						}else if($form_eleave_type =="ลาป่วย"){
							$this->EleaveModel->diffday_hour_minute_sick($form_eleave_status_type,$form_eleave_id,$form_eleave_emp,$form_number_time_eleave);
							echo "<script>alert('เปลี่ยนสถานะอนุมัติเสร็จสิ้น รอระบบปรับสถานะภายใน 5 นาที');</script>";
							echo "<script> window.location.href='eleave_hr_approve' </script>";
						}else if($form_eleave_type =="ลากิจฉุกเฉิน"){
							$this->EleaveModel->diffday_hour_minute_emergency($form_eleave_status_type,$form_eleave_id,$form_eleave_emp,$form_number_time_eleave);
							echo "<script>alert('เปลี่ยนสถานะอนุมัติเสร็จสิ้น รอระบบปรับสถานะภายใน 5 นาที');</script>";
							echo "<script> window.location.href='eleave_hr_approve' </script>";
						}else {
							echo "<script>alert('ไม่สามารถอนุมัติได้เนื่องจากเงื่อนไขผิดพลาด');</script>";
							echo "<script> window.location.href='eleave_hr_approve' </script>";
						}

						//ออกเงื่อนไขหลังจากทำการตัดเวลาแล้ว  alert แจ้ง UI ว่าได้ทำการทำการปรับสถานะเรียบร้อยแล้ว
				echo "<script>alert('เปลี่ยนสถานะอนุมัติเสร็จสิ้น รอฝ่ายบุคคลอนุมัติต่อไป');</script>";
				echo "<script> window.location.href='eleave_hr_approve' </script>";
				/////////////////////////////////////////////////////////////////////////////////////////////
			}else if($form_eleave_status_type == "2"){
				echo $form_eleave_status_type;
				echo "<BR>";
				echo $form_eleave_id;
				echo "<BR>";
				echo $form_eleave_emp;
				echo "<BR>";
				echo $form_eleave_type;
				echo "<BR>";
				echo $form_number_time_eleave;
				echo "test";
				$status_manager ="ไม่อนุมัติ";
				$this->EleaveModel->update_status_data_eleave_hr($form_eleave_status_type,$form_eleave_id,$form_eleave_emp);
				$this->EleaveModel->insert_order_approve_hr($form_eleave_id,$form_eleave_emp,$status_manager);
				//ออก เงื่อนไขหลังจากทำการตัดเวลาแล้ว  alert แจ้ง UI ว่าได้ทำการทำการปรับสถานะเรียบร้อยแล้ว
				echo "<script>alert('ท่านทำรายการไม่อนุมัติเป็นที่เรียบร้อยแล้ว');</script>";
				echo "<script> window.location.href='eleave_hr_approve' </script>";
				/* base_url() */
			}else if($form_eleave_status_type = " "){
				echo "<script>alert('ระบบทำงานผิดพลาด กรุณาตรวจสอบข้อมูลใหม่อีกครั้ง');</script>";
				echo "<script> window.location.href='eleave/eleave_hr_approve' </script>";
				/* redirect('eleave/eleave_hr_approve/'); */
			}

		
			

			
				
			



	}

	function export_eleave_data_excel(){
		$eleave_type = $this->input->post("form_eleave_type");
		$company_name = $this->input->post("form_company_name");
		$name = $this->input->post("name");
		$form_date_start = $this->input->post("form_date_start");
		$form_date_end = $this->input->post("form_date_end");
		$eleave_status = $this->input->post("form_eleave_status");
		$emp_id =$this->session->userdata("EMP_ID");
		$date_now= date("d/m/Y");

		if($name != ''){
			$search_arr[] = " ELEAVE_NAME='".$name."' ";
		}
		if($eleave_type != ''){
			$search_arr[] = " ELEAVE_TYPE_ID='".$eleave_type."' ";
		}
		if($company_name != ''){
			$search_arr[] = " ELEAVE_COMPANY_NAME='".$company_name."' ";
		}
		if($form_date_start != ''){
			$search_arr[] = " ELEAVE_DATE_START='".$form_date_start."' ";
		}
		if($form_date_end != ''){
			$search_arr[] = " ELEAVE_DATE_END='".$form_date_end."' ";
		}
		if($eleave_status != ''){
			$search_arr[] = " ELEAVE_STATUS='".$eleave_status."' ";
		}
		if($emp_id != ''){
			$search_arr[] = " ELEAVE_EMP_ID='".$emp_id."' ";
		}
		
		if(count($search_arr) > 0){
			$searchQuery = implode(" and ",$search_arr);
		}

		$sql = "SELECT ELEAVE_ID,ELEAVE_EMP_ID,ELEAVE_TYPE_NAME,ELEAVE_NAME,ELEAVE_SURNAME,ELEAVE_EMAIL,ELEAVE_COMPANY_NAME,ELEAVE_DEPARTMENT,ELEAVE_JOB_POSITION,ELEAVE_PHONE,ELEAVE_DATE_START,ELEAVE_DATE_END,ELEAVE_RANGE_TIME,ELEAVE_RANGE_TIME_NAME,ELEAVE_TIME_START,ELEAVE_TIME_END,ELEAVE_NUMBER,ELEAVE_ADDRESS_ELEAVE,ELEAVE_CAUSE,ELEAVE_DATE_SEND_DATA,ELEAVE_DATE_END_COMPLETE,ELEAVE_STATUS FROM ELEAVE WHERE $searchQuery";
		$data_lists = $this->db->query($sql)->result();
		
		$name =$this->session->userdata("NAME");
		
		
		

		ob_end_clean(); 
		header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");;
		header("Content-Disposition: attachment;filename=Report_Eleave_Status_$date_now.xlsx");
		header("Content-Transfer-Encoding: binary ");

		
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		//เซ็ตคอลั่ม
		$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(5);
		$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(5);
		$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(10);
		$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(15);
		$spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(15);
		$spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(15);
		$spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth(15);
		$spreadsheet->getActiveSheet()->getColumnDimension('K')->setWidth(15);
		$spreadsheet->getActiveSheet()->getColumnDimension('L')->setWidth(15);
		$spreadsheet->getActiveSheet()->getColumnDimension('M')->setWidth(15);
		$spreadsheet->getActiveSheet()->getColumnDimension('N')->setWidth(15);
		$spreadsheet->getActiveSheet()->getColumnDimension('O')->setWidth(15);
		$spreadsheet->getActiveSheet()->getColumnDimension('P')->setWidth(50);
		$spreadsheet->getActiveSheet()->getColumnDimension('Q')->setWidth(50);
		$spreadsheet->getActiveSheet()->getColumnDimension('R')->setWidth(17);
		$spreadsheet->getActiveSheet()->getColumnDimension('S')->setWidth(19);
		$spreadsheet->getActiveSheet()->getColumnDimension('T')->setWidth(15);
		
		
			  $sheet->setCellValue('A7', "ลำดับ");
			  $sheet->setCellValue('B7', "รหัสของการลา");
			  $sheet->setCellValue('C7', "ประเภทการลา");
			  $sheet->setCellValue('D7', "ชื่อ");
			  $sheet->setCellValue('E7', "นามสกุล");
			  $sheet->setCellValue('F7', "บริษัท");
			  $sheet->setCellValue('G7', "ฝ่าย");
			  $sheet->setCellValue('H7', "ตำแหน่ง");
			  $sheet->setCellValue('I7', "เบอร์โทร");
			  $sheet->setCellValue('J7', "วันที่เริ่มลางาน");
			  $sheet->setCellValue('K7', "วันที่สิ้นสุดการลางาน");
			  $sheet->setCellValue('L7', "ช่วงเวลา");
			  $sheet->setCellValue('M7', "เวลาเริ่มลางาน");
			  $sheet->setCellValue('N7', "เวลาสิ้นสุดการลางาน");
			  $sheet->setCellValue('O7', "จำนวนวันลางาน");
			  $sheet->setCellValue('P7', "ที่อยู่ที่ติดต่อได้");
			  $sheet->setCellValue('Q7', "สาเหตุของการลา");
			  $sheet->setCellValue('R7', "วันที่ส่งคำขอการลา");
			  $sheet->setCellValue('S7', "วันที่สิ้นสุดกระบวนการ");
			  $sheet->setCellValue('T7', "สถานะของคำขอการลางาน");
		//data
		 // set Row
		 $i=1;
			  $rowCount = 8;
			  foreach ($data_lists as $row) {
				$eleave_id = $row->ELEAVE_ID;
				$eleave_emp_id = $row->ELEAVE_EMP_ID;
				$eleave_type_name = $row->ELEAVE_TYPE_NAME;
				$eleave_name = $row->ELEAVE_NAME;
				$eleave_surname = $row->ELEAVE_SURNAME;
				$eleave_email = $row->ELEAVE_EMAIL;
				$eleave_company_name = $row->ELEAVE_COMPANY_NAME;
				$eleave_department = $row->ELEAVE_DEPARTMENT;
				$eleave_job_position = $row->ELEAVE_JOB_POSITION;
				$eleave_phone = $row->ELEAVE_PHONE;
				$eleave_date_start = $row->ELEAVE_DATE_START;
				$eleave_date_end = $row->ELEAVE_DATE_END;
				$eleave_range_time = $row->ELEAVE_RANGE_TIME;
				$eleave_range_time_name = $row->ELEAVE_RANGE_TIME_NAME;
				$eleave_time_start = $row->ELEAVE_TIME_START;
				$eleave_time_end = $row->ELEAVE_TIME_END;
				$eleave_number = $row->ELEAVE_NUMBER;
				$eleave_address = $row->ELEAVE_ADDRESS_ELEAVE;
				$eleave_cause = $row->ELEAVE_CAUSE;
				$eleave_date_send_data = $row->ELEAVE_DATE_SEND_DATA;
				$eleave_date_end_complete = $row->ELEAVE_DATE_END_COMPLETE;
				$eleave_status = $row->ELEAVE_STATUS;

				if($eleave_status==0){
					$eleave_status="ส่งคำร้องแล้ว";
				}else if($eleave_status==1){
					$eleave_status="ผู้บังคับบัญชาอนุมัติแล้ว";
				}else if($eleave_status==2){
					$eleave_status="ฝ่ายบุคคลอนุมัติแล้ว";
				}else if($eleave_status==3){
					$eleave_status="คำขออนุมัติแล้ว";
				}else if($eleave_status==4){
					$eleave_status="ไม่อนุมัติ";
				}

				//data to row and set cell value
				$sheet->setCellValue('A' . $rowCount, $i);
				$sheet->setCellValue('B' . $rowCount, $eleave_id);
				$sheet->setCellValue('C' . $rowCount, $eleave_type_name );
				$sheet->setCellValue('D' . $rowCount, $eleave_name );
				$sheet->setCellValue('E' . $rowCount, $eleave_surname );
				$sheet->setCellValue('F' . $rowCount, $eleave_company_name );
				$sheet->setCellValue('G' . $rowCount, $eleave_department );
				$sheet->setCellValue('H' . $rowCount, $eleave_job_position );
				$sheet->setCellValue('I' . $rowCount, $eleave_phone);
				$sheet->setCellValue('J' . $rowCount, $eleave_date_start );
				$sheet->setCellValue('K' . $rowCount, $eleave_date_end );
				$sheet->setCellValue('L' . $rowCount, $eleave_range_time_name );
				$sheet->setCellValue('M' . $rowCount, $eleave_time_start );
				$sheet->setCellValue('N' . $rowCount, $eleave_time_end );
				$sheet->setCellValue('O' . $rowCount, $eleave_number );
				$sheet->setCellValue('P' . $rowCount, $eleave_address );
				$sheet->setCellValue('Q' . $rowCount, $eleave_cause );
				$sheet->setCellValue('R' . $rowCount, $eleave_date_send_data );
				$sheet->setCellValue('S' . $rowCount, $eleave_date_end_complete);
				$sheet->setCellValue('T' . $rowCount, $eleave_status);
		 
					 $rowCount++;
					 $i++;
			  }
			 
			  //mergecells
				$spreadsheet->getActiveSheet()->mergeCells("A1:T1");
				$sheet->getStyle('A1:T1')->getAlignment()->setHorizontal('center');
			  //สร้างหัว
				$sheet->setCellValue('A1', "รายงานสถานะการลางานของ คุณ $eleave_name $eleave_surname");
				$sheet->setCellValue('D2', "วันที่ออกรายงาน");
				$sheet->setCellValue('E2', "$date_now");
			  /* $sheet->setCellValue('A1:T1', "รายงานสถานะการลางานของ คุณ"); */
			  $sheet->setCellValue('D3', "ทั้งหมดมี");
			  $sheet->setCellValue('E3', count($data_lists));
			  $sheet->setCellValue('F3', "ครั้ง");
		//sent to excel	  
		$writer = new Xlsx($spreadsheet);
		
		
		$writer->save("php://output");

	}

	function eleave_load_view_export_manager_excel(){
		__login(); 
		
		_menu();
		$this->load->view('eleave_load_view_export_manager_excel');
	}
	
	function export_excel_manager_approve_excel(){
		$form_date_approve = $this->input->post("form_date_approve");
		$form_emp_id = $this->input->post("form_emp_id");
		$form_name = $this->input->post("form_name");
		$emp_id =$this->session->userdata("EMP_ID");
		$date_now= date("d/m/Y");
		
		$date_explode = explode("-",$form_date_approve);
		$year = $date_explode[0];
		$month = $date_explode[1];
		$day = $date_explode[2];
		$is_approve ="1";
		
		if($year != ''){
			$search_arr[] = " YEAR (MANAGER_APPROVE_DATE)='".$year."' ";
		}
		if($month != ''){
			$search_arr[] = " MONTH (MANAGER_APPROVE_DATE)='".$month."' ";
		}
		if($day != ''){
			$search_arr[] = " DAY (MANAGER_APPROVE_DATE)='".$day."' ";
		}
		if($form_emp_id != ''){
			$search_arr[] = " MANAGER_EMP_ID_USER_STAFF='".$form_emp_id."' ";
		}
		if($form_name != ''){
			$search_arr[] = "MANAGER_NAME_STAFF='".$form_name."' ";
		}
		if($is_approve != ''){
			$search_arr[] = "MANAGER_IS_APPROVE='".$is_approve."' ";
		}
		
		if(count($search_arr) > 0){
			$searchQuery = implode(" and ",$search_arr);
		}

		$sql = "SELECT * FROM MANAGER_APPROVE_ORDER_ALL  WHERE   $searchQuery   ORDER BY MANAGER_ID ASC ";
		$data_lists = $this->db->query($sql)->result();
		/* echo "<pre>";
		echo print_r($data_lists);
		echo "</pre>"; */
		
		

		ob_end_clean(); 
		header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");;
		header("Content-Disposition: attachment;filename=Report_Eleave_Manager_Approve_$date_now.xlsx");
		header("Content-Transfer-Encoding: binary ");

		
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		//เซ็ตคอลั่ม
		$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(5);
		$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(5);
		$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(10);
		$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(15);
		$spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(15);
		$spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('K')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('L')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('M')->setWidth(20);
		
		
			  $sheet->setCellValue('A7', "ลำดับ");
			  $sheet->setCellValue('B7', "รหัสการลางาน");
			  $sheet->setCellValue('C7', "รหัสพนักงานของผู้บังคับบัญชา");
			  $sheet->setCellValue('D7', "ชื่อผู้อนุมัติ");
			  $sheet->setCellValue('E7', "นามสกุลผู้อนุมัติ");
			  $sheet->setCellValue('F7', "บริษัท");
			  $sheet->setCellValue('G7', "ฝ่าย");
			  $sheet->setCellValue('H7', "ตำแหน่ง");
			  $sheet->setCellValue('I7', "รหัสพนักงานของผู้ส่งคำขอ");
			  $sheet->setCellValue('J7', "ชื่อพนักงานของผู้ส่งคำขอ");
			  $sheet->setCellValue('K7', "นามสกุลของผู้ส่งคำขอ");
			  $sheet->setCellValue('L7', "วันที่อนุมัติ");
			  $sheet->setCellValue('M7', "สถานะ");
			 
		//data
		 // set Row
		 $i=1;
			  $rowCount = 8;
			  foreach ($data_lists as $row) {
				$manager_id = $row->MANAGER_ID;
				$manager_eleave_id = $row->MANAGER_ISAPPROVE_ELEAVE_ID;
				$manager_emp_id = $row->MANAGER_EMP_ID;
				$manager_name = $row->MANAGER_NAME;
				$manager_surname = $row->MANAGER_SURNAME;
				$manager_company = $row->MANAGER_COMPANY;
				$manager_department = $row->MANAGER_DEPARTMENT;
				$manager_job_position = $row->MANAGER_JOB_POSITION;
				$manager_emp_id_user_staff = $row->MANAGER_EMP_ID_USER_STAFF;
				$manager_name_staff = $row->MANAGER_NAME_STAFF;
				$manager_surname = $row->MANAGER_SURNAME_STAFF;
				$manager_approve_date = $row->MANAGER_APPROVE_DATE;
				$manager_eleave_status = $row->MANAGER_ELEAVE_STATUS;

				//data to row and set cell value
				$sheet->setCellValue('A' . $rowCount, $i);
				$sheet->setCellValue('B' . $rowCount, $manager_eleave_id);
				$sheet->setCellValue('C' . $rowCount, $manager_emp_id );
				$sheet->setCellValue('D' . $rowCount, $manager_name );
				$sheet->setCellValue('E' . $rowCount, $manager_surname );
				$sheet->setCellValue('F' . $rowCount, $manager_company );
				$sheet->setCellValue('G' . $rowCount, $manager_department );
				$sheet->setCellValue('H' . $rowCount, $manager_job_position );
				$sheet->setCellValue('I' . $rowCount, $manager_emp_id_user_staff );
				$sheet->setCellValue('J' . $rowCount, $manager_name_staff );
				$sheet->setCellValue('K' . $rowCount, $manager_surname );
				$sheet->setCellValue('L' . $rowCount, $manager_approve_date);
				$sheet->setCellValue('M' . $rowCount, $manager_eleave_status);
				
		 
					 $rowCount++;
					 $i++;
			  }
			 
			  //mergecells
				$spreadsheet->getActiveSheet()->mergeCells("A1:L1");
				$sheet->getStyle('A1:L1')->getAlignment()->setHorizontal('center');
			  //สร้างหัว
				$sheet->setCellValue('A1', "รายงานจำนวนรายการที่ผู้บังคับบัญชาได้ทำการอนุมัติการลา");
				$sheet->setCellValue('D2', "วันที่ออกรายงาน");
				$sheet->setCellValue('E2', "$date_now");
			  
			  $sheet->setCellValue('D3', "ทั้งหมดมี");
			  $sheet->setCellValue('E3', count($data_lists));
			  $sheet->setCellValue('F3', "ครั้ง");
		//sent to excel	  
		$writer = new Xlsx($spreadsheet);
		
		
		$writer->save("php://output");
	}
	function eleave_load_view_export_hr_excel(){
		__login(); 
		
		_menu();
		$this->load->view('eleave_load_view_export_hr_excel');
	}

	function export_excel_HR_approve_excel(){
		$form_date_approve = $this->input->post("form_date_approve");
		$form_emp_id = $this->input->post("form_emp_id");
		$form_name = $this->input->post("form_name");
		$emp_id =$this->session->userdata("EMP_ID");
		$date_now= date("d/m/Y");
		
		$date_explode = explode("-",$form_date_approve);
		$year = $date_explode[0];
		$month = $date_explode[1];
		$day = $date_explode[2];
		$is_approve ="1";
		
		if($year != ''){
			$search_arr[] = " YEAR (HUMANE_RESOURCES_APPROVE_DATE)='".$year."' ";
		}
		if($month != ''){
			$search_arr[] = " MONTH (HUMANE_RESOURCES_APPROVE_DATE)='".$month."' ";
		}
		if($day != ''){
			$search_arr[] = " DAY (HUMANE_RESOURCES_APPROVE_DATE)='".$day."' ";
		}
		if($form_emp_id != ''){
			$search_arr[] = " HUMANE_RESOURCES_EMP_ID_USER_STAFF='".$form_emp_id."' ";
		}
		if($form_name != ''){
			$search_arr[] = "HUMANE_RESOURCES_NAME_STAFF='".$form_name."' ";
		}
		if($is_approve != ''){
			$search_arr[] = "HUMANE_RESOURCES_IS_APPROVE='".$is_approve."' ";
		}
		
		if(count($search_arr) > 0){
			$searchQuery = implode(" and ",$search_arr);
		}

		

		$sql = "SELECT * FROM HUMANE_RESOURCES_APPROVE_ORDER_ALL  WHERE $searchQuery ORDER BY HUMANE_RESOURCES_ID ASC ";
		$data_lists = $this->db->query($sql)->result();
		

		
		
		

		ob_end_clean(); 
		header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");;
		header("Content-Disposition: attachment;filename=Report_Eleave_HR_Approve_$date_now.xlsx");
		header("Content-Transfer-Encoding: binary ");

		
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		//เซ็ตคอลั่ม
		$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(5);
		$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(5);
		$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(10);
		$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(15);
		$spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(15);
		$spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('K')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('L')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('M')->setWidth(20);
		
		
		$sheet->setCellValue('A7', "ลำดับ");
		$sheet->setCellValue('B7', "รหัสการลางาน");
		$sheet->setCellValue('C7', "รหัสพนักงานของผู้บังคับบัญชา");
		$sheet->setCellValue('D7', "ชื่อผู้อนุมัติ");
		$sheet->setCellValue('E7', "นามสกุลผู้อนุมัติ");
		$sheet->setCellValue('F7', "บริษัท");
		$sheet->setCellValue('G7', "ฝ่าย");
		$sheet->setCellValue('H7', "ตำแหน่ง");
		$sheet->setCellValue('I7', "รหัสพนักงานของผู้ส่งคำขอ");
		$sheet->setCellValue('J7', "ชื่อพนักงานของผู้ส่งคำขอ");
		$sheet->setCellValue('K7', "นามสกุลของผู้ส่งคำขอ");
		$sheet->setCellValue('L7', "วันที่อนุมัติ");
		$sheet->setCellValue('M7', "วันที่อนุมัติ");
			 
		//data
		 // set Row
		 	  $i=1;
			  $rowCount = 8;
			  foreach ($data_lists as $row) {
				$hr_id = $row->HUMANE_RESOURCES_ID;
				$hr_isapprove_eleave_id = $row->HUMANE_RESOURCES_ISAPPROVE_ELEAVE_ID;
				$hr_emp_id = $row->HUMANE_RESOURCES_EMP_ID;
				$hr_name = $row->HUMANE_RESOURCES_NAME;
				$hr_surname = $row->HUMANE_RESOURCES_SURNAME;
				$hr_company = $row->HUMANE_RESOURCES_COMPANY;
				$hr_department = $row->HUMANE_RESOURCES_DEPARTMENT;
				$hr_job_position = $row->HUMANE_RESOURCES_JOB_POSITION;
				$hr_emp_user_staff = $row->HUMANE_RESOURCES_EMP_ID_USER_STAFF;
				$hr_name_staff = $row->HUMANE_RESOURCES_NAME_STAFF;
				$hr_surname = $row->HUMANE_RESOURCES_SURNAME_STAFF;
				$hr_approve_date = $row->HUMANE_RESOURCES_APPROVE_DATE;
				$hr_approve_eleave_status = $row->HUMANE_RESOURCES_ELEAVE_STATUS;

				//data to row and set cell value
				$sheet->setCellValue('A' . $rowCount, $i);
				$sheet->setCellValue('B' . $rowCount, $hr_isapprove_eleave_id);
				$sheet->setCellValue('C' . $rowCount, $hr_emp_id );
				$sheet->setCellValue('D' . $rowCount, $hr_name );
				$sheet->setCellValue('E' . $rowCount, $hr_surname );
				$sheet->setCellValue('F' . $rowCount, $hr_company );
				$sheet->setCellValue('G' . $rowCount, $hr_department );
				$sheet->setCellValue('H' . $rowCount, $hr_job_position );
				$sheet->setCellValue('I' . $rowCount, $hr_emp_user_staff );
				$sheet->setCellValue('J' . $rowCount, $hr_name_staff );
				$sheet->setCellValue('K' . $rowCount, $hr_surname );
				$sheet->setCellValue('L' . $rowCount, $hr_approve_date);
				$sheet->setCellValue('M' . $rowCount, $hr_approve_eleave_status);
				
		 
					 $rowCount++;
					 $i++;
			  }
			 
			  

			  //mergecells
				$spreadsheet->getActiveSheet()->mergeCells("A1:L1");
				$sheet->getStyle('A1:L1')->getAlignment()->setHorizontal('center');
			  //สร้างหัว
				$sheet->setCellValue('A1', "รายงานจำนวนรายการที่ฝ่ายบุคคลได้ทำการอนุมัติการลา");
				$sheet->setCellValue('D2', "วันที่ออกรายงาน");
				$sheet->setCellValue('E2', "$date_now");
			  
			  $sheet->setCellValue('D3', "ทั้งหมดมี");
			  $sheet->setCellValue('E3', count($data_lists));
			  $sheet->setCellValue('F3', "ครั้ง");


		//sent to excel	  
		$writer = new Xlsx($spreadsheet);
		$writer->save("php://output");
	}

	function time_diff_kab(){
		/* echo "test"; */

		$datetest="2021-11-12";
		echo $datetest;


		$sql = "SELECT ELEAVE_CONEM_NUMBER_SCORE_ID,ELEAVE_CONEM_NUMBER_SCORE_EMP_ID,ELEAVE_CONEM_NUMBER_SCORE_D,ELEAVE_CONEM_NUMBER_SCORE_H,ELEAVE_CONEM_NUMBER_SCORE_M
		 FROM ELEAVE_CONEM_NUMBER_SCORE WHERE ELEAVE_CONEM_NUMBER_SCORE_EMP_ID ='63045'";
		$query = $this->db->query($sql)->row();
		$eleave_conem_number_score_id= @$query->ELEAVE_CONEM_NUMBER_SCORE_ID;
		$eleave_conem_number_score_emp_id= @$query->ELEAVE_CONEM_NUMBER_SCORE_EMP_ID;
		$eleave_conem_number_score_d= @$query->ELEAVE_CONEM_NUMBER_SCORE_D;
		$eleave_conem_number_score_h= @$query->ELEAVE_CONEM_NUMBER_SCORE_H;
		$eleave_conem_number_score_m= @$query->ELEAVE_CONEM_NUMBER_SCORE_M;

		$eleave_conem_number_score_1=$eleave_conem_number_score_d*8*60*60;
		$eleave_conem_number_score_2=$eleave_conem_number_score_h*60*60;
		$eleave_conem_number_score_3=$eleave_conem_number_score_m*60;
		$eleave_conem_number_score_all=$eleave_conem_number_score_1+$eleave_conem_number_score_2+$eleave_conem_number_score_3;
		echo "<BR>";
		echo $eleave_conem_number_score_all;
		/* s */

		$datetest ="1 วัน 2 ชั่วโมง 0 นาที";

		$text_number =explode(" ",$datetest);
		
		$day = $text_number[0];
		$test1 = $text_number[1];
		$hour = $text_number[2];
		$test3 = $text_number[3];
		$minute = $text_number[4];
		$test5 = $text_number[5];
		echo "<BR>";
		echo print_r($text_number);
		//คำนวณเอาวันแปลงเป็นวิ
		$day_to_s=$day*8*60*60;
		//เอาชั่วโมงแปลงเป็นวิ
		$hour_to_s=$hour*60*60;
		//เอานาทีแปลงเป็นวิ
		$minute_to_s=$minute*60;


		$alltimeinput=$day_to_s+$hour_to_s+$minute_to_s;

		echo "<BR>";
		echo print_r($alltimeinput);
		$test_ams= $eleave_conem_number_score_all-$alltimeinput;

		echo "<BR>";
		echo print_r($test_ams);
		$day2 = 28800;
		$hour2 = 3600;
		$minute2 = 60;

		
		$day_aaa=floor(($test_ams/$day2));
		$hoursout=floor(($test_ams-$day_aaa*$day2)/$hour2);
		$minutesout=floor(($test_ams-$day_aaa*$day2-$hoursout*$hour2)/$minute2);

		echo "<BR>";
		echo $day_aaa;
		echo "<BR>";
		echo $hoursout;
		echo "<BR>";
		echo $minutesout;



	}
	function report_all_for_executive(){
		_checksession();
		_menu();
		$this->load->view('eleave_report_view_for_excutive');

	}
	function export_excel_eleave_status_all(){

		$form_emp_id = $this->input->post("form_emp_id");
		/* $form_name = $this->input->post("form_name");
		$form_surname = $this->input->post("form_surname"); */
		$form_eleave_status = $this->input->post("form_eleave_status");
		$form_send_date_eleave = $this->input->post("form_send_date_eleave");
		/* $form_end_eleave = $this->input->post("form_end_eleave"); */
		$date_now= date("d/m/Y");
		$is_approve ="1";
		
	

		/* if($form_name != ''){
			$search_arr[] = " ELEAVE_NAME='".$form_name."' ";
		}
		if($form_surname != ''){
			$search_arr[] = " ELEAVE_SURNAME='".$form_surname."' ";
		} */
		if($form_emp_id != ''){
			$search_arr[] = " ELEAVE_EMP_ID='".$form_emp_id."' ";
		}
		if($form_eleave_status != ''){
			$search_arr[] = " ELEAVE_STATUS='".$form_eleave_status."' ";
		}
		/* if($form_start_eleave != ''){
			$search_arr[] = " ELEAVE_DATE_START='".$form_start_eleave."' ";
		} */
		if($form_send_date_eleave != ''){
			$search_arr[] = " ELEAVE_DATE_SEND_DATA='".$form_send_date_eleave."' ";
		}
		if($is_approve != ''){
			$search_arr[] = " IS_APPROVE='".$is_approve."' ";
		}
		
		if(count($search_arr) > 0){
			$searchQuery = implode(" and ",$search_arr);
		}

		$sql = "SELECT ELEAVE_ID,ELEAVE_EMP_ID,ELEAVE_TYPE_NAME,ELEAVE_NAME,ELEAVE_SURNAME,ELEAVE_EMAIL,ELEAVE_COMPANY_NAME,ELEAVE_DEPARTMENT,ELEAVE_JOB_POSITION,ELEAVE_PHONE,ELEAVE_DATE_START,ELEAVE_DATE_END,ELEAVE_RANGE_TIME,ELEAVE_RANGE_TIME_NAME,ELEAVE_TIME_START,ELEAVE_TIME_END,ELEAVE_NUMBER,ELEAVE_ADDRESS_ELEAVE,ELEAVE_CAUSE,ELEAVE_DATE_SEND_DATA,ELEAVE_DATE_END_COMPLETE,ELEAVE_STATUS FROM ELEAVE WHERE $searchQuery ";
		$data_lists = $this->db->query($sql)->result();
		
		
		
		
		

		ob_end_clean(); 
		header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");;
		header("Content-Disposition: attachment;filename=Report_Eleave_Status_$date_now.xlsx");
		header("Content-Transfer-Encoding: binary ");

		
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		//เซ็ตคอลั่ม
		$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(5);
		$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(5);
		$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(10);
		$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(15);
		$spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(15);
		$spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(15);
		$spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth(15);
		$spreadsheet->getActiveSheet()->getColumnDimension('K')->setWidth(15);
		$spreadsheet->getActiveSheet()->getColumnDimension('L')->setWidth(15);
		$spreadsheet->getActiveSheet()->getColumnDimension('M')->setWidth(15);
		$spreadsheet->getActiveSheet()->getColumnDimension('N')->setWidth(15);
		$spreadsheet->getActiveSheet()->getColumnDimension('O')->setWidth(15);
		$spreadsheet->getActiveSheet()->getColumnDimension('P')->setWidth(50);
		$spreadsheet->getActiveSheet()->getColumnDimension('Q')->setWidth(50);
		$spreadsheet->getActiveSheet()->getColumnDimension('R')->setWidth(17);
		$spreadsheet->getActiveSheet()->getColumnDimension('S')->setWidth(19);
		$spreadsheet->getActiveSheet()->getColumnDimension('T')->setWidth(15);
		
		
			  $sheet->setCellValue('A7', "ลำดับ");
			  $sheet->setCellValue('B7', "รหัสของการลา");
			  $sheet->setCellValue('C7', "ประเภทการลา");
			  $sheet->setCellValue('D7', "ชื่อ");
			  $sheet->setCellValue('E7', "นามสกุล");
			  $sheet->setCellValue('F7', "บริษัท");
			  $sheet->setCellValue('G7', "ฝ่าย");
			  $sheet->setCellValue('H7', "ตำแหน่ง");
			  $sheet->setCellValue('I7', "เบอร์โทร");
			  $sheet->setCellValue('J7', "วันที่เริ่มลางาน");
			  $sheet->setCellValue('K7', "วันที่สิ้นสุดการลางาน");
			  $sheet->setCellValue('L7', "ช่วงเวลา");
			  $sheet->setCellValue('M7', "เวลาเริ่มลางาน");
			  $sheet->setCellValue('N7', "เวลาสิ้นสุดการลางาน");
			  $sheet->setCellValue('O7', "จำนวนวันลางาน");
			  $sheet->setCellValue('P7', "ที่อยู่ที่ติดต่อได้");
			  $sheet->setCellValue('Q7', "สาเหตุของการลา");
			  $sheet->setCellValue('R7', "วันที่ส่งคำขอการลา");
			  $sheet->setCellValue('S7', "วันที่สิ้นสุดกระบวนการ");
			  $sheet->setCellValue('T7', "สถานะของคำขอการลางาน");
		//data
		 // set Row
		 $i=1;
			  $rowCount = 8;
			  foreach ($data_lists as $row) {
				$eleave_id = $row->ELEAVE_ID;
				$eleave_emp_id = $row->ELEAVE_EMP_ID;
				$eleave_type_name = $row->ELEAVE_TYPE_NAME;
				$eleave_name = $row->ELEAVE_NAME;
				$eleave_surname = $row->ELEAVE_SURNAME;
				$eleave_email = $row->ELEAVE_EMAIL;
				$eleave_company_name = $row->ELEAVE_COMPANY_NAME;
				$eleave_department = $row->ELEAVE_DEPARTMENT;
				$eleave_job_position = $row->ELEAVE_JOB_POSITION;
				$eleave_phone = $row->ELEAVE_PHONE;
				$eleave_date_start = $row->ELEAVE_DATE_START;
				$eleave_date_end = $row->ELEAVE_DATE_END;
				$eleave_range_time = $row->ELEAVE_RANGE_TIME;
				$eleave_range_time_name = $row->ELEAVE_RANGE_TIME_NAME;
				$eleave_time_start = $row->ELEAVE_TIME_START;
				$eleave_time_end = $row->ELEAVE_TIME_END;
				$eleave_number = $row->ELEAVE_NUMBER;
				$eleave_address = $row->ELEAVE_ADDRESS_ELEAVE;
				$eleave_cause = $row->ELEAVE_CAUSE;
				$eleave_date_send_data = $row->ELEAVE_DATE_SEND_DATA;
				$eleave_date_end_complete = $row->ELEAVE_DATE_END_COMPLETE;
				$eleave_status = $row->ELEAVE_STATUS;

				if($eleave_status==0){
					$eleave_status="ส่งคำร้องแล้ว";
				}else if($eleave_status==1){
					$eleave_status="ผู้บังคับบัญชาอนุมัติแล้ว";
				}else if($eleave_status==2){
					$eleave_status="ฝ่ายบุคคลอนุมัติแล้ว";
				}else if($eleave_status==3){
					$eleave_status="คำขออนุมัติแล้ว";
				}else if($eleave_status==4){
					$eleave_status="ไม่อนุมัติ";
				}

				//data to row and set cell value
				$sheet->setCellValue('A' . $rowCount, $i);
				$sheet->setCellValue('B' . $rowCount, $eleave_id);
				$sheet->setCellValue('C' . $rowCount, $eleave_type_name );
				$sheet->setCellValue('D' . $rowCount, $eleave_name );
				$sheet->setCellValue('E' . $rowCount, $eleave_surname );
				$sheet->setCellValue('F' . $rowCount, $eleave_company_name );
				$sheet->setCellValue('G' . $rowCount, $eleave_department );
				$sheet->setCellValue('H' . $rowCount, $eleave_job_position );
				$sheet->setCellValue('I' . $rowCount, $eleave_phone);
				$sheet->setCellValue('J' . $rowCount, $eleave_date_start );
				$sheet->setCellValue('K' . $rowCount, $eleave_date_end );
				$sheet->setCellValue('L' . $rowCount, $eleave_range_time_name );
				$sheet->setCellValue('M' . $rowCount, $eleave_time_start );
				$sheet->setCellValue('N' . $rowCount, $eleave_time_end );
				$sheet->setCellValue('O' . $rowCount, $eleave_number );
				$sheet->setCellValue('P' . $rowCount, $eleave_address );
				$sheet->setCellValue('Q' . $rowCount, $eleave_cause );
				$sheet->setCellValue('R' . $rowCount, $eleave_date_send_data );
				$sheet->setCellValue('S' . $rowCount, $eleave_date_end_complete);
				$sheet->setCellValue('T' . $rowCount, $eleave_status);
		 
					 $rowCount++;
					 $i++;
			  }
			 
			  //mergecells
				$spreadsheet->getActiveSheet()->mergeCells("A1:T1");
				$sheet->getStyle('A1:T1')->getAlignment()->setHorizontal('center');
			  //สร้างหัว
			  	if(empty($form_emp_id)){
					$sheet->setCellValue('A1', "รายงานสถานะการลางาน");
				}else if(!empty($form_emp_id)) {
					$sql2 = "SELECT NAME,SURNAME FROM USER_INFO WHERE EMP_ID='$form_emp_id' ";
					$users = $this->db->query($sql2)->row();
					$name = @$users->NAME;
					$surname= @$users->SURNAME;

					$sheet->setCellValue('A1', "รายงานสถานะการลางานของ คุณ $name $surname");
				}
				
				$sheet->setCellValue('D2', "วันที่ออกรายงาน");
				$sheet->setCellValue('E2', "$date_now");
				$sheet->setCellValue('D3', "ทั้งหมดมี");
				$sheet->setCellValue('E3', count($data_lists));
				$sheet->setCellValue('F3', "รายการ");
				
		//sent to excel	  
		$writer = new Xlsx($spreadsheet);
		
		
		$writer->save("php://output");

		
				
		



		
		
	}

	function export_excel_eleave_number_score_all(){
		$form_emp_id = $this->input->post("form_emp_id");
		
		$is_approve="1";
		echo $form_eleave_type;
		echo "<BR>";
		echo $form_emp_id;

		$date_now= date("d/m/Y");
		
		
	

		
		if($form_emp_id != ''){
			$search_arr[] = " ELEAVE_SICK_NUMBER_SCORE_EMP_ID='".$form_emp_id."' ";
		}
		
		if($is_approve != ''){
			$search_arr[] = " ELEAVE_SICK_NUMBER_SCORE_IS_APPROVE='".$is_approve."' ";
		}
		
		if(count($search_arr) > 0){
			$searchQuery = implode(" and ",$search_arr);
		}

		$sql = "SELECT * FROM ELEAVE_SICK_NUMBER_SCORE WHERE $searchQuery";
		$data_lists = $this->db->query($sql)->result();
		
		
		
		
		

		ob_end_clean(); 
		header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");;
		header("Content-Disposition: attachment;filename=Report_Eleave_number_All_$date_now.xlsx");
		header("Content-Transfer-Encoding: binary ");

		
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setTitle('ลาป่วย');
		/* getSheetNames() */
		//เซ็ตคอลั่ม
		$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(5);
		$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(15);
		$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(10);
		$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(15);
		$spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(15);
		
		
		
			  $sheet->setCellValue('A7', "ลำดับ");
			  $sheet->setCellValue('B7', "รหัสพนักงาน");
			  $sheet->setCellValue('C7', "วันที่เหลือ");
			  $sheet->setCellValue('D7', "ชั่วโมงที่เหลือ");
			  $sheet->setCellValue('E7', "นาทีที่เหลือ");
			  
		//data
		 // set Row
		 $i=1;
			  $rowCount = 8;
			  foreach ($data_lists as $row) {
				$eleave_sick_number_score_id = $row->ELEAVE_SICK_NUMBER_SCORE_ID;
				$eleave_sick_number_score_emp_id = $row->ELEAVE_SICK_NUMBER_SCORE_EMP_ID;
				$eleave_sick_number_score_day = $row->ELEAVE_SICK_NUMBER_SCORE_D;
				$eleave_sick_number_score_h = $row->ELEAVE_SICK_NUMBER_SCORE_H;
				$eleave_sick_number_score_m = $row->ELEAVE_SICK_NUMBER_SCORE_M;
				

				

				//data to row and set cell value
				$sheet->setCellValue('A' . $rowCount, $i);
				$sheet->setCellValue('B' . $rowCount, $eleave_sick_number_score_emp_id);
				$sheet->setCellValue('C' . $rowCount, $eleave_sick_number_score_day );
				$sheet->setCellValue('D' . $rowCount, $eleave_sick_number_score_h );
				$sheet->setCellValue('E' . $rowCount, $eleave_sick_number_score_m );
				
				
		 
					 $rowCount++;
					 $i++;
			  }
			 
			  //mergecells
				$spreadsheet->getActiveSheet()->mergeCells("A1:T1");
				$sheet->getStyle('A1:T1')->getAlignment()->setHorizontal('center');
			  //สร้างหัว
			  	if(empty($form_emp_id)){
					$sheet->setCellValue('A1', "รายงานเวลาที่เหลือของพนักงานทั้งหมด");
				}else if(!empty($form_emp_id)) {
					$sql2 = "SELECT NAME,SURNAME FROM USER_INFO WHERE EMP_ID='$form_emp_id' ";
					$users = $this->db->query($sql2)->row();
					$name = @$users->NAME;
					$surname= @$users->SURNAME;

					$sheet->setCellValue('A1', "รายงานเวลาที่เหลือของ คุณ $name $surname");
				}
				
				$sheet->setCellValue('D2', "วันที่ออกรายงาน");
				$sheet->setCellValue('E2', "$date_now");
				$sheet->setCellValue('D3', "ทั้งหมดมี");
				$sheet->setCellValue('E3', count($data_lists));
				$sheet->setCellValue('F3', "รายการ");


			  /////////////////////////////////////////sheet2/////////////////////////////////////////
			  $spreadsheet->createSheet(1);
			  $spreadsheet->setActiveSheetIndex(1);
			  $sheet2 = $spreadsheet->getActiveSheet(1);
			  $sheet2->setTitle('ลากิจฉุกเฉิน');
			  //set data on sheet2

			  if($form_emp_id != ''){
				$search_arr2[] = " ELEAVE_EMERGENCY_NUMBER_SCORE_EMP_ID='".$form_emp_id."' ";
			}
			
			if($is_approve != ''){
				$search_arr2[] = " ELEAVE_EMERGENCY_NUMBER_SCORE_IS_APPROVE='".$is_approve."' ";
			}
			
			if(count($search_arr) > 0){
				$searchQuery2 = implode(" and ",$search_arr2);
			}
	
			$sql3 = "SELECT * FROM ELEAVE_EMERGENCY_NUMBER_SCORE WHERE $searchQuery2";
			$data_lists3 = $this->db->query($sql3)->result();

			//เซ็ตคอลั่ม
			$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(5);
			$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(15);
			$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(10);
			$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(15);
			$spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(15);



				$sheet2->setCellValue('A7', "ลำดับ");
				$sheet2->setCellValue('B7', "รหัสพนักงาน");
				$sheet2->setCellValue('C7', "วันที่เหลือ");
				$sheet2->setCellValue('D7', "ชั่วโมงที่เหลือ");
				$sheet2->setCellValue('E7', "นาทีที่เหลือ");

		 //data
		 // set Row
		 $i=1;
			  $rowCount = 8;
			  foreach ($data_lists3 as $row) {
				$eleave_emergency_number_score_id = $row->ELEAVE_EMERGENCY_NUMBER_SCORE_ID;
				$eleave_emergency_number_score_emp_id = $row->ELEAVE_EMERGENCY_NUMBER_SCORE_EMP_ID;
				$eleave_emergency_number_score_day = $row->ELEAVE_EMERGENCY_NUMBER_SCORE_D;
				$eleave_emergency_number_score_h = $row->ELEAVE_EMERGENCY_NUMBER_SCORE_H;
				$eleave_emergency_number_score_m = $row->ELEAVE_EMERGENCY_NUMBER_SCORE_M;
				

				

				//data to row and set cell value
				$sheet2->setCellValue('A' . $rowCount, $i);
				$sheet2->setCellValue('B' . $rowCount, $eleave_emergency_number_score_emp_id);
				$sheet2->setCellValue('C' . $rowCount, $eleave_emergency_number_score_day );
				$sheet2->setCellValue('D' . $rowCount, $eleave_emergency_number_score_h );
				$sheet2->setCellValue('E' . $rowCount, $eleave_emergency_number_score_m );
				
				
		 
					 $rowCount++;
					 $i++;
			  }

			  //mergecells
				$spreadsheet->getActiveSheet()->mergeCells("A1:T1");
				$sheet2->getStyle('A1:T1')->getAlignment()->setHorizontal('center');
			  //สร้างหัว
			  	if(empty($form_emp_id)){
					$sheet2->setCellValue('A1', "รายงานเวลาที่เหลือของพนักงานทั้งหมด");
				}else if(!empty($form_emp_id)) {
					$sql2 = "SELECT NAME,SURNAME FROM USER_INFO WHERE EMP_ID='$form_emp_id' ";
					$users = $this->db->query($sql2)->row();
					$name = @$users->NAME;
					$surname= @$users->SURNAME;

					$sheet2->setCellValue('A1', "รายงานเวลาที่เหลือของ คุณ $name $surname");
				}
				
				$sheet2->setCellValue('D2', "วันที่ออกรายงาน");
				$sheet2->setCellValue('E2', "$date_now");
				$sheet2->setCellValue('D3', "ทั้งหมดมี");
				$sheet2->setCellValue('E3', count($data_lists3));
				$sheet2->setCellValue('F3', "รายการ");
				///////////////////////////////////////////////////////////////////////////////	  

				/////////////////////////////////////////sheet3/////////////////////////////////////////
				$spreadsheet->createSheet(1);
				$spreadsheet->setActiveSheetIndex(1);
				$sheet3 = $spreadsheet->getActiveSheet(1);
				$sheet3->setTitle('ลากิจ');
				//set data on sheet2

				if($form_emp_id != ''){
				$search_arr3[] = " ELEAVE_CONEM_NUMBER_SCORE_EMP_ID='".$form_emp_id."' ";
				}

				if($is_approve != ''){
				$search_arr3[] = " ELEAVE_CONEM_NUMBER_SCORE_IS_APPROVE='".$is_approve."' ";
				}

				if(count($search_arr) > 0){
				$searchQuery3 = implode(" and ",$search_arr3);
				}
				
				$sql4 = "SELECT * FROM ELEAVE_CONEM_NUMBER_SCORE WHERE $searchQuery3";
				$data_lists4 = $this->db->query($sql4)->result();

				//เซ็ตคอลั่ม
				$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(5);
				$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(15);
				$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(10);
				$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(15);
				$spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(15);



				$sheet3->setCellValue('A7', "ลำดับ");
				$sheet3->setCellValue('B7', "รหัสพนักงาน");
				$sheet3->setCellValue('C7', "วันที่เหลือ");
				$sheet3->setCellValue('D7', "ชั่วโมงที่เหลือ");
				$sheet3->setCellValue('E7', "นาทีที่เหลือ");

				//data
				// set Row
				$i=1;
				$rowCount = 8;
				foreach ($data_lists4 as $row) {
				$eleave_conem_number_score_id = $row->ELEAVE_CONEM_NUMBER_SCORE_ID;
				$eleave_conem_number_score_emp_id = $row->ELEAVE_CONEM_NUMBER_SCORE_EMP_ID;
				$eleave_conem_number_score_day = $row->ELEAVE_CONEM_NUMBER_SCORE_D;
				$eleave_conem_number_score_h = $row->ELEAVE_CONEM_NUMBER_SCORE_H;
				$eleave_conem_number_score_m = $row->ELEAVE_CONEM_NUMBER_SCORE_M;
				

				

				//data to row and set cell value
				$sheet3->setCellValue('A' . $rowCount, $i);
				$sheet3->setCellValue('B' . $rowCount, $eleave_conem_number_score_emp_id);
				$sheet3->setCellValue('C' . $rowCount, $eleave_conem_number_score_day );
				$sheet3->setCellValue('D' . $rowCount, $eleave_conem_number_score_h );
				$sheet3->setCellValue('E' . $rowCount, $eleave_conem_number_score_m );
				
				

					$rowCount++;
					$i++;
				}

				//mergecells
				$spreadsheet->getActiveSheet()->mergeCells("A1:T1");
				$sheet3->getStyle('A1:T1')->getAlignment()->setHorizontal('center');
				//สร้างหัว
					if(empty($form_emp_id)){
					$sheet3->setCellValue('A1', "รายงานเวลาที่เหลือของพนักงานทั้งหมด");
				}else if(!empty($form_emp_id)) {
					$sql2 = "SELECT NAME,SURNAME FROM USER_INFO WHERE EMP_ID='$form_emp_id' ";
					$users = $this->db->query($sql2)->row();
					$name = @$users->NAME;
					$surname= @$users->SURNAME;

					$sheet3->setCellValue('A1', "รายงานเวลาที่เหลือของ คุณ $name $surname");
				}
				
				$sheet3->setCellValue('D2', "วันที่ออกรายงาน");
				$sheet3->setCellValue('E2', "$date_now");
				$sheet3->setCellValue('D3', "ทั้งหมดมี");                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
				$sheet3->setCellValue('E3', count($data_lists4));
				$sheet3->setCellValue('F3', "รายการ");
				///////////////////////////////////////////////////////////////////////////////////////	  


		//sent to excel	  
		$writer = new Xlsx($spreadsheet);
		
		
		$writer->save("php://output");

		
	}




	function report_manager_approve(){
		
		//รับค่าเพื่อมาค้นหาข้อมูล
		$form_emp_id = $this->input->post("form_emp_id");
		$form_date_approve = $this->input->post("form_date_approve");
		
		$is_approve="1";
		//เช็คค่าถ้าไม่ได้กรอกมาแจ้งเตือนแล้วดีดกลับไปหน้าเดิม
		if (empty($form_emp_id) ){
			echo "<script>alert('คุณไม่ได้กรอกรหัสพนักงานของผู้บังคับบัญชา');</script>";
		 
		 echo "<script> window.location.href='report_all_for_executive' </script>";
		}
		if (empty($form_date_approve) ){
			echo "<script>alert('คุณไม่ได้กรอกวันที่อนุมัติ');</script>";
		 
		 echo "<script> window.location.href='report_all_for_executive' </script>";
		}
		///
		
		$date_approve_approve =explode("-",$form_date_approve);
		/* print_r($date_approve_approve); */

		$day =$date_approve_approve[2];
		$month =$date_approve_approve[1];
		$year = $date_approve_approve[0];
		$date_now= date("d/m/Y");
		


		////
		if($year != ''){
			$search_arr[] = " YEAR (MANAGER_APPROVE_DATE)='".$year."' ";
		}
		if($month != ''){
			$search_arr[] = " MONTH (MANAGER_APPROVE_DATE)='".$month."' ";
		}
		if($day != ''){
			$search_arr[] = " DAY (MANAGER_APPROVE_DATE)='".$day."' ";
		}
		if($form_emp_id != ''){
			$search_arr[] = " MANAGER_EMP_ID_USER_STAFF='".$form_emp_id."' ";
		}
		
		if($is_approve != ''){
			$search_arr[] = "MANAGER_IS_APPROVE='".$is_approve."' ";
		}
		
		if(count($search_arr) > 0){
			$searchQuery = implode(" and ",$search_arr);
		}

		 $sql = "SELECT * FROM MANAGER_APPROVE_ORDER_ALL  WHERE   $searchQuery   ORDER BY MANAGER_ID ASC ";
		$data_lists = $this->db->query($sql)->result();
		echo "<pre>";
		echo print_r($data_lists);
		echo "</pre>";
		
		

		ob_end_clean(); 
		header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");;
		header("Content-Disposition: attachment;filename=Report_Eleave_Manager_Approve_$date_now.xlsx");
		header("Content-Transfer-Encoding: binary ");

		
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet(); 
		$sheet->setTitle('รายการผู้ยังคับบัญชาอนุมัติ');
		//เซ็ตคอลั่ม
		$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(5);
		$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(5);
		$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(10);
		$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(15);
		$spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(15);
		$spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('K')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('L')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('M')->setWidth(20);
		
		
			  $sheet->setCellValue('A7', "ลำดับ");
			  $sheet->setCellValue('B7', "รหัสการลางาน");
			  $sheet->setCellValue('C7', "รหัสพนักงานของผู้บังคับบัญชา");
			  $sheet->setCellValue('D7', "ชื่อผู้อนุมัติ");
			  $sheet->setCellValue('E7', "นามสกุลผู้อนุมัติ");
			  $sheet->setCellValue('F7', "บริษัท");
			  $sheet->setCellValue('G7', "ฝ่าย");
			  $sheet->setCellValue('H7', "ตำแหน่ง");
			  $sheet->setCellValue('I7', "รหัสพนักงานของผู้ส่งคำขอ");
			  $sheet->setCellValue('J7', "ชื่อพนักงานของผู้ส่งคำขอ");
			  $sheet->setCellValue('K7', "นามสกุลของผู้ส่งคำขอ");
			  $sheet->setCellValue('L7', "วันที่อนุมัติ");
			  $sheet->setCellValue('M7', "สถานะ");
			 
		//data
		 // set Row
		 $i=1;
			  $rowCount = 8;
			  foreach ($data_lists as $row) {
				$manager_id = $row->MANAGER_ID;
				$manager_eleave_id = $row->MANAGER_ISAPPROVE_ELEAVE_ID;
				$manager_emp_id = $row->MANAGER_EMP_ID;
				$manager_name = $row->MANAGER_NAME;
				$manager_surname = $row->MANAGER_SURNAME;
				$manager_company = $row->MANAGER_COMPANY;
				$manager_department = $row->MANAGER_DEPARTMENT;
				$manager_job_position = $row->MANAGER_JOB_POSITION;
				$manager_emp_id_user_staff = $row->MANAGER_EMP_ID_USER_STAFF;
				$manager_name_staff = $row->MANAGER_NAME_STAFF;
				$manager_surname = $row->MANAGER_SURNAME_STAFF;
				$manager_approve_date = $row->MANAGER_APPROVE_DATE;
				$manager_eleave_status = $row->MANAGER_ELEAVE_STATUS;

				//data to row and set cell value
				$sheet->setCellValue('A' . $rowCount, $i);
				$sheet->setCellValue('B' . $rowCount, $manager_eleave_id);
				$sheet->setCellValue('C' . $rowCount, $manager_emp_id );
				$sheet->setCellValue('D' . $rowCount, $manager_name );
				$sheet->setCellValue('E' . $rowCount, $manager_surname );
				$sheet->setCellValue('F' . $rowCount, $manager_company );
				$sheet->setCellValue('G' . $rowCount, $manager_department );
				$sheet->setCellValue('H' . $rowCount, $manager_job_position );
				$sheet->setCellValue('I' . $rowCount, $manager_emp_id_user_staff );
				$sheet->setCellValue('J' . $rowCount, $manager_name_staff );
				$sheet->setCellValue('K' . $rowCount, $manager_surname );
				$sheet->setCellValue('L' . $rowCount, $manager_approve_date);
				$sheet->setCellValue('M' . $rowCount, $manager_eleave_status);
				
		 
					 $rowCount++;
					 $i++;
			  }
			 
			  //mergecells
				$spreadsheet->getActiveSheet()->mergeCells("A1:L1");
				$sheet->getStyle('A1:L1')->getAlignment()->setHorizontal('center');
			  //สร้างหัว
				$sheet->setCellValue('A1', "รายงานจำนวนรายการที่ผู้บังคับบัญชาได้ทำการอนุมัติการลา");
				$sheet->setCellValue('D2', "วันที่ออกรายงาน");
				$sheet->setCellValue('E2', "$date_now");
			  
			  $sheet->setCellValue('D3', "ทั้งหมดมี");
			  $sheet->setCellValue('E3', count($data_lists));
			  $sheet->setCellValue('F3', "รายการ");
		//sent to excel	  
		$writer = new Xlsx($spreadsheet);
		
		
		$writer->save("php://output");

		/* print_r (explode("-",$form_date_approve)); */

	}

	function report_hr_approve(){
		$form_emp_id = $this->input->post("form_emp_id");
		$form_date_approve = $this->input->post("form_date_approve");
		$is_approve="1";
		//เช็คค่าถ้าไม่ได้กรอกมาแจ้งเตือนแล้วดีดกลับไปหน้าเดิม
		if (empty($form_emp_id) ){
			echo "<script>alert('คุณไม่ได้กรอกรหัสพนักงานของฝ่ายบุคคล');</script>";
		 
		 echo "<script> window.location.href='report_all_for_executive' </script>";
		}
		if (empty($form_date_approve) ){
			echo "<script>alert('คุณไม่ได้กรอกวันที่อนุมัติ');</script>";
		 
		 echo "<script> window.location.href='report_all_for_executive' </script>";
		}
		///
		//เช้าเงื่อนไขexport
		$date_approve_approve =explode("-",$form_date_approve);
		/* print_r($date_approve_approve); */

		$day =$date_approve_approve[2];
		$month =$date_approve_approve[1];
		$year = $date_approve_approve[0];
		$date_now= date("d/m/Y");
		////
		if($year != ''){
			$search_arr[] = " YEAR (HUMANE_RESOURCES_APPROVE_DATE)='".$year."' ";
		}
		if($month != ''){
			$search_arr[] = " MONTH (HUMANE_RESOURCES_APPROVE_DATE)='".$month."' ";
		}
		if($day != ''){
			$search_arr[] = " DAY (HUMANE_RESOURCES_APPROVE_DATE)='".$day."' ";
		}
		if($form_emp_id != ''){
			$search_arr[] = " HUMANE_RESOURCES_EMP_ID_USER_STAFF='".$form_emp_id."' ";
		}
		
		if($is_approve != ''){
			$search_arr[] = "HUMANE_RESOURCES_IS_APPROVE='".$is_approve."' ";
		}
		
		if(count($search_arr) > 0){
			$searchQuery = implode(" and ",$search_arr);
		}

		 $sql = "SELECT * FROM HUMANE_RESOURCES_APPROVE_ORDER_ALL  WHERE   $searchQuery   ORDER BY HUMANE_RESOURCES_ID ASC ";
		$data_lists = $this->db->query($sql)->result();
		/* echo "<pre>";
		echo print_r($data_lists);
		echo "</pre>"; */
		
		

		ob_end_clean(); 
		header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");;
		header("Content-Disposition: attachment;filename=Report_Eleave_HR_Approve_$date_now.xlsx");
		header("Content-Transfer-Encoding: binary ");

		
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet(); 
		$sheet->setTitle('รายการที่ฝ่ายบุคคลอนุมัติ');
		//เซ็ตคอลั่ม
		$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(5);
		$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(5);
		$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(10);
		$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(15);
		$spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(15);
		$spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('K')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('L')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('M')->setWidth(20);
		
		
			  $sheet->setCellValue('A7', "ลำดับ");
			  $sheet->setCellValue('B7', "รหัสการลางาน");
			  $sheet->setCellValue('C7', "รหัสพนักงานของผู้บังคับบัญชา");
			  $sheet->setCellValue('D7', "ชื่อผู้อนุมัติ");
			  $sheet->setCellValue('E7', "นามสกุลผู้อนุมัติ");
			  $sheet->setCellValue('F7', "บริษัท");
			  $sheet->setCellValue('G7', "ฝ่าย");
			  $sheet->setCellValue('H7', "ตำแหน่ง");
			  $sheet->setCellValue('I7', "รหัสพนักงานของผู้ส่งคำขอ");
			  $sheet->setCellValue('J7', "ชื่อพนักงานของผู้ส่งคำขอ");
			  $sheet->setCellValue('K7', "นามสกุลของผู้ส่งคำขอ");
			  $sheet->setCellValue('L7', "วันที่อนุมัติ");
			  $sheet->setCellValue('M7', "สถานะ");
			 
		//data
		 // set Row
		 $i=1;
			  $rowCount = 8;
			  foreach ($data_lists as $row) {
				$humane_resources_id = $row->HUMANE_RESOURCES_ID;
				$humane_resources_eleave_id = $row->HUMANE_RESOURCES_ISAPPROVE_ELEAVE_ID;
				$humane_resources_emp_id = $row->HUMANE_RESOURCES_EMP_ID;
				$humane_resources_name = $row->HUMANE_RESOURCES_NAME;
				$humane_resources_surname = $row->HUMANE_RESOURCES_SURNAME;
				$humane_resources_company = $row->HUMANE_RESOURCES_COMPANY;
				$humane_resources_department = $row->HUMANE_RESOURCES_DEPARTMENT;
				$humane_resources_job_position = $row->HUMANE_RESOURCES_JOB_POSITION;
				$humane_resources_emp_id_user_staff = $row->HUMANE_RESOURCES_EMP_ID_USER_STAFF;
				$humane_resources_name_staff = $row->HUMANE_RESOURCES_NAME_STAFF;
				$humane_resources_surname = $row->HUMANE_RESOURCES_SURNAME_STAFF;
				$humane_resources_approve_date = $row->HUMANE_RESOURCES_APPROVE_DATE;
				$humane_resources_eleave_status = $row->HUMANE_RESOURCES_ELEAVE_STATUS;

				//data to row and set cell value
				$sheet->setCellValue('A' . $rowCount, $i);
				$sheet->setCellValue('B' . $rowCount, $humane_resources_eleave_id);
				$sheet->setCellValue('C' . $rowCount, $humane_resources_emp_id );
				$sheet->setCellValue('D' . $rowCount, $humane_resources_name );
				$sheet->setCellValue('E' . $rowCount, $humane_resources_surname );
				$sheet->setCellValue('F' . $rowCount, $humane_resources_company );
				$sheet->setCellValue('G' . $rowCount, $humane_resources_department );
				$sheet->setCellValue('H' . $rowCount, $humane_resources_job_position );
				$sheet->setCellValue('I' . $rowCount, $humane_resources_emp_id_user_staff );
				$sheet->setCellValue('J' . $rowCount, $humane_resources_name_staff );
				$sheet->setCellValue('K' . $rowCount, $humane_resources_surname );
				$sheet->setCellValue('L' . $rowCount, $humane_resources_approve_date);
				$sheet->setCellValue('M' . $rowCount, $humane_resources_eleave_status);
				
		 
					 $rowCount++;
					 $i++;
			  }
			 
			  //mergecells
				$spreadsheet->getActiveSheet()->mergeCells("A1:L1");
				$sheet->getStyle('A1:L1')->getAlignment()->setHorizontal('center');
			  //สร้างหัว
				$sheet->setCellValue('A1', "รายงานจำนวนรายการที่ผู้บังคับบัญชาได้ทำการอนุมัติการลา");
				$sheet->setCellValue('D2', "วันที่ออกรายงาน");
				$sheet->setCellValue('E2', "$date_now");
			  
			  $sheet->setCellValue('D3', "ทั้งหมดมี");
			  $sheet->setCellValue('E3', count($data_lists));
			  $sheet->setCellValue('F3', "รายการ");
		//sent to excel	  
		$writer = new Xlsx($spreadsheet);
		
		
		$writer->save("php://output");

		/* print_r (explode("-",$form_date_approve)); */
		

		
			  

	}
	//เตรียมทำ report (รอทำ db ก่อน)
	function report_executive_approve(){
		$form_emp_id = $this->input->post("form_emp_id");
		$form_date_approve = $this->input->post("form_date_approve");
		$is_approve="1";
		echo $form_emp_id;
		echo "<BR>";
		echo $form_date_approve;

		
	}
		
	
	


		

}



	