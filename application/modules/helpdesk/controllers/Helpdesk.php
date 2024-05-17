<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH.'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xls;


class Helpdesk extends CI_Controller {  
	function __construct() {
		parent::__construct();
		_checksession();
		$this->load->library('session');
		// load excel library
		/* $this->load->library('Excel'); */
		$this->load->model('HelpdeskModel');
		
		
	}
	//functions  
	public function index()  
	{  
	
	}


	function helpdesk_check_case(){
		_checksession();
		_menu();
		$this->load->view('helpdesk_check_case');
	}
	function help_add_case(){
		_checksession();
		_menu();
		$this->load->view('helpdesk_add_case');
	}

	function helpdesk_add_data_to_database(){
		//ดึงตัวแปรที่ส่งมาแล้วสร้างรหัสเคส
		//set1
		$form_emp_set1= $this->input->post("form_emp_set1");
		$form_name_set1= $this->input->post("form_name_set1");
		$form_surname_set1= $this->input->post("form_surname_set1");
		$form_department_type_set1= $this->input->post("form_department_type_set1");
		$form_company_set1= $this->input->post("form_company_set1");
		$form_phone_set1= $this->input->post("form_phone_set1");
		//set 2
		$form_department_type_set2= $this->input->post("form_department_type_set2");
		$form_company_set2= $this->input->post("form_company_set2");
		//set 3
		$from_helpdesk_type_set3= $this->input->post("from_helpdesk_type_set3");
		$from_helpdesk_systems_type_set32= $this->input->post("from_helpdesk_systems_type_set32");
		$form_supjeck_set3= $this->input->post("form_supjeck_set3");
		$form_text_qa= $this->input->post("form_text_qa");

	
		//เงื่อนไข
		if($from_helpdesk_type_set3 == "0"){
			$set_helpdesk_s_id ="Q-".date("dmyHis");
			$is_approve="1";
			$set_case_status_request_sent="1";
		}else if($from_helpdesk_type_set3 == "1"){
			$set_helpdesk_s_id ="S-".date("dmyHis");
			$is_approve="1";
			$set_case_status_request_sent="1";
		}else if($from_helpdesk_type_set3 == "2"){
			$set_helpdesk_s_id ="P-".date("dmyHis");
			$is_approve="1";
			$set_case_status_request_sent="1";
		}else if($set_helpdesk_s_id == " "){
		$set_helpdesk_s_id =""; 
		$is_approve="0";
		}
		
		//load model เพื่อนำไปเข้า DB 
		$this->HelpdeskModel->add_case($set_helpdesk_s_id,$form_emp_set1,$form_name_set1,$form_surname_set1,$form_department_type_set1,$form_company_set1,$form_phone_set1,$form_department_type_set2,$form_company_set2,$form_supjeck_set3,$form_text_qa,$from_helpdesk_type_set3,$from_helpdesk_systems_type_set32,$set_case_status_request_sent,$is_approve);
		
	}
	function ajax_search_data_status_cases(){
		// POST data
		$postData = $this->input->post();
		/* echo print_r($postData); */
		// Get data
		$data = $this->HelpdeskModel->ajax_data_status_case($postData);
		
		echo json_encode($data);
	}
	function ajax_search_data_staff_approve_status_cases(){
		// POST data
		$postData = $this->input->post();
		/* echo print_r($postData); */
		// Get data
		$data = $this->HelpdeskModel->ajax_data_staff_status_case($postData);
		
		echo json_encode($data);
	}

	function helpdesk_view_checking_case($data){
		$helpdesk_s_id['helpdesk_s_id'] = $data;
		_menu();
		$this->load->view('helpdesk_view_checking_case',$helpdesk_s_id);


		
	}
	function helpdesk_staff_active(){
		
		_menu();
		$this->load->view('helpdesk_staff_active_case');


		
	}
	function helpdesk_staff_active_case_approve($data){
		$helpdesk_s_id['helpdesk_s_id'] = $data;
		_menu();
		$this->load->view('helpdesk_staff_active_case_approve',$helpdesk_s_id);


		
	}

	function helpdesk_check_send_data_update_status_to_is_progress(){
		$from_helpdesk_s_id_set3= $this->input->post("from_helpdesk_s_id_set3");
		$form_emp_set1= $this->input->post("form_emp_set1");
		$name =$this->session->userdata("NAME");
		$surname =$this->session->userdata("SURNAME");
		$emp_id =$this->session->userdata("EMP_ID");
		/* echo $from_helpdesk_s_id_set3;
		echo $form_emp_set1; */
		$this->HelpdeskModel->staff_update_status_to_is_progress($from_helpdesk_s_id_set3,$form_emp_set1,$name,$surname,$emp_id);
	}

	function helpdesk_check_send_data_update_status_to_forward(){
		$from_helpdesk_s_id_set3= $this->input->post("from_helpdesk_s_id_set3");
		$form_emp_set1= $this->input->post("form_emp_set1");
		
		$form_case_forward_to= $this->input->post("form_case_forward_to");
		
		/* echo $from_helpdesk_s_id_set3;
		echo"<BR>";
		echo $form_emp_set1;
		echo"<BR>";
		echo $form_case_forward_to; */
		$this->HelpdeskModel->staff_update_status_to_forward($from_helpdesk_s_id_set3,$form_emp_set1,$form_case_forward_to);
	}

	
	//ไว้รอ report
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



	