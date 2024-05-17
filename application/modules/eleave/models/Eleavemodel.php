<?php
class EleaveModel extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->library('session');
	}

	function update_user_import_log($user_id,$attach_name,$type,$attach_file,$date_action,$status){
		if($status=="IMPORT:SUCCESS"){
			$status="IMPORT:SUCCESS";
		}elseif($status=="IMPORT:FALI"){
			$status="IMPORT:FALI";
		}
		
		$sql= "INSERT INTO USER_UPLOAD_FILE_LOG (UPLOAD_USER_ID,
		UPLOAD_NAME_FILE,
		UPLOAD_TYPE_FILE,
		UPLOAD_PART_FILE,
		UPLOAD_DATE,
		UPLOAD_STATUS) VALUES ('$user_id','$attach_name','$type','$attach_file','$date_action','$status')";
		$query =$this->db->query($sql);

		
	}




	function ajax_search_data_status($postData=null){
		$response = array();
		
		## Read value
		$draw = $postData['draw'];
			$start = $postData['start'];
			$rowperpage = $postData['length']; // Rows display per page
			$columnIndex = $postData['order'][0]['column']; // Column index
			$columnName = $postData['columns'][$columnIndex]['data']; // Column name
			$columnSortOrder = $postData['order'][0]['dir']; // asc or desc
			$searchValue = $postData['search']['value']; // Search value
			
		// Custom search filter 
		$searchname = $postData['searchname'];
		$search_eleave_type = $postData['search_eleave_type'];
		$searchcompany_name = $postData['searchcompany_name'];
		$searcheleaveid = $postData['searcheleaveid'];
		$searchudate_start = $postData['searchudate_start'];
		$searchdate_end = $postData['searchdate_end'];
		
		
		//ดึง EMP_ID กับ USER_LEVEL จาก SESSION เพื่อเอาไปคำนวณ
		$emp_id =$this->session->userdata("EMP_ID");
		$user_level =$this->session->userdata("USER_LEVEL");

		//เช็คสิทธิแล้ว ตั้งให้เห็นเฉพาะตนเองถ้าสิทธิไม่ถึง
		
			$searchemp_id=$emp_id;
		
		//
		
		## Search 
		$search_arr = array();
		$searchQuery = "";
		if($searchValue != ''){
			$search_arr[] = " (ELEAVE_NAME like '%".$searchValue."%' or
			ELEAVE_ID like '%".$searchValue."%' or 
			ELEAVE_TYPE_ID like '%".$searchValue."%' or 
			ELEAVE_COMPANY_NAME like'%".$searchValue."%'  or
			ELEAVE_DATE_START like'%".$searchValue."%' or
			ELEAVE_DATE_END like'%".$searchValue."%'or
			ELEAVE_EMP_ID like'%".$searchValue."%'
			) ";
		}
		if($searchname != ''){
			$search_arr[] = " ELEAVE_NAME='".$searchname."' ";
		}
		if($search_eleave_type != ''){
			$search_arr[] = " ELEAVE_TYPE_ID='".$search_eleave_type."' ";
		}
		if($searchcompany_name != ''){
			$search_arr[] = " ELEAVE_COMPANY_NAME='".$searchcompany_name."' ";
		}
		if($searchudate_start != ''){
			$search_arr[] = " ELEAVE_DATE_START like '%".$searchudate_start."%' ";
		}
		if($searchdate_end != ''){
			$search_arr[] = " ELEAVE_DATE_END like '%".$searchdate_end."%' ";
		}
		if($searcheleaveid != ''){
			$search_arr[] = " ELEAVE_ID like  '%".$searcheleaveid."%' ";
		}
		
		if($searchemp_id != ''){
			$search_arr[] = " ELEAVE_EMP_ID like '%".$searchemp_id."%' ";
		}
		if(count($search_arr) > 0){
			$searchQuery = implode(" and ",$search_arr);
		}
		/* print_r($search_arr); */
		/* echo print_r($searchQuery); */
		## Total number of records without filtering
		$this->db->select('count(*) as allcount');
		$records = $this->db->get('ELEAVE')->result();
		$totalRecords = $records[0]->allcount;
		
		## Total number of record with filtering
		$this->db->select('count(*) as allcount');
		if($searchQuery != '')
		$this->db->where($searchQuery);
		$records = $this->db->get('ELEAVE')->result();
		$totalRecordwithFilter = $records[0]->allcount;
		/* echo print_r($records); */
		## Fetch records
		$this->db->select('*');
		if($searchQuery != '')
		$this->db->where($searchQuery);
		$this->db->order_by($columnName, $columnSortOrder);
		$this->db->limit($rowperpage, $start);
		$records = $this->db->get('ELEAVE')->result();
		
		
		
		$data = [];
	
			foreach($records as $record){
				$data[] = $record;
			}
		
			
		/* echo print_r($data); */
		## Response
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data
		);
  
		return $response; 
		echo print_r($response);
	}



	function delete_order($data){
		$sql= "DELETE FROM ELEAVE WHERE ELEAVE_ID='$data'" ;
		$query =$this->db->query($sql);
	}



	function eleave_data_add_order($form_user_id,$form_emp,$eleave_type_id,$eleave_type_name,$form_name
	,$form_surname,$form_email,$form_company_name,$form_department,$form_job_position,$form_phone,
	$form_date_start,$form_date_end,$form_range_time,$eleavename,$form_time_start,$form_time_end,$form_number_time_eleave,
	$form_address_eleave,$form_manager_approve,$form_humane_resources_approve,$date_action,$status,$attach_name,$is_approve){
		//
		$sql= "INSERT INTO ELEAVE (
			ELEAVE_USER_ID
			,ELEAVE_EMP_ID
			,ELEAVE_TYPE_ID
			,ELEAVE_TYPE_NAME
			,ELEAVE_NAME
			,ELEAVE_SURNAME
			,ELEAVE_EMAIL
			,ELEAVE_COMPANY_NAME
			,ELEAVE_DEPARTMENT
			,ELEAVE_JOB_POSITION
			,ELEAVE_PHONE
			,ELEAVE_DATE_START
			,ELEAVE_DATE_END
			,ELEAVE_RANGE_TIME
			,ELEAVE_RANGE_TIME_NAME
			,ELEAVE_TIME_START
			,ELEAVE_TIME_END
			,ELEAVE_NUMBER
			,ELEAVE_ADDRESS_ELEAVE
			,ELEAVE_CAUSE
			,ELEAVE_MANAGER_APPROVE_ID_DEFAILT
			,ELEAVE_HUMANE_RESOURCES_ID_DEFAULT
			,ELEAVE_DATE_SEND_DATA
			,ELEAVE_STATUS
			,ELEAVE_NAME_FILE
			,IS_APPROVE)
			VALUES
			('$form_user_id','$form_emp','$eleave_type_id'
			,'$eleave_type_name','$form_name','$form_surname'
			,'$form_email','$form_company_name','$form_department'
			,'$form_job_position','$form_phone','$form_date_start'
			,'$form_date_end','$form_range_time','$eleavename','$form_time_start'
			,'$form_time_end','$form_number_time_eleave','$form_address_eleave','$form_cause'
			,'$form_manager_approve','$form_humane_resources_approve'
			,'$date_action','$status','$attach_name','$is_approve')
			";
		$query =$this->db->query($sql);
		


	}


	function testmodel($user_id){
		$sql = "SELECT * FROM USER_INFO WHERE IS_APPROVE='1' AND USER_ID ='$user_id'";
		$query =$this->db->query($sql);
	}

	function update_order_edit($form_eleave_id,$form_eleave_emp,$form_eleave_name,$form_eleave_surname,$form_eleave_email,$form_eleave_company_name
,$form_eleave_department,$form_eleave_job_position,$form_eleave_phone,$form_eleave_type,$form_eleave_date_start,$form_eleave_date_end,$form_eleave_range_time
,$form_eleave_time_start,$form_eleave_time_end,$form_eleave_address_eleave,$form_eleave_manager_approve,$form_eleave_humane_resources_approve,$form_eleave_number_time_eleave,$form_eleave_cause){

	$sql = "UPDATE  ELEAVE SET
	ELEAVE_ID='$form_eleave_id'
	,ELEAVE_EMP_ID ='$form_eleave_emp'
	,ELEAVE_NAME ='$form_eleave_name'
	,ELEAVE_SURNAME ='$form_eleave_surname'
	,ELEAVE_EMAIL ='$form_eleave_email'
	,ELEAVE_COMPANY_NAME ='$form_eleave_company_name'
	,ELEAVE_DEPARTMENT ='$form_eleave_department'
	,ELEAVE_JOB_POSITION ='$form_eleave_job_position'
	,ELEAVE_PHONE ='$form_eleave_phone'
	,ELEAVE_TYPE_NAME='$form_eleave_type'
	,ELEAVE_DATE_START='$form_eleave_date_start'
	,ELEAVE_DATE_END='$form_eleave_date_end'
	,ELEAVE_RANGE_TIME='$form_eleave_range_time'
	,ELEAVE_TIME_START='$form_eleave_time_start'
	,ELEAVE_TIME_END='$form_eleave_time_end'
	,ELEAVE_ADDRESS_ELEAVE ='$form_eleave_address_eleave'
	,ELEAVE_MANAGER_APPROVE_ID_DEFAILT='$form_eleave_manager_approve'
	,ELEAVE_HUMANE_RESOURCES_ID_DEFAULT='$form_eleave_humane_resources_approve'
	,ELEAVE_NUMBER='$form_eleave_number_time_eleave '
	,ELEAVE_CAUSE ='$form_eleave_cause' WHERE ELEAVE_ID ='$form_eleave_id'";
	
	$query =$this->db->query($sql);	
	
	}

	function ajax_search_data_manager_approve($postData=null){
		$response = array();
		
		## Read value
		$draw = $postData['draw'];
			$start = $postData['start'];
			$rowperpage = $postData['length']; // Rows display per page
			$columnIndex = $postData['order'][0]['column']; // Column index
			$columnName = $postData['columns'][$columnIndex]['data']; // Column name
			$columnSortOrder = $postData['order'][0]['dir']; // asc or desc
			$searchValue = $postData['search']['value']; // Search value
			
		// Custom search filter 
		$search_eleave_type = $postData['search_eleave_type'];
		$searchcompany_name = $postData['searchcompany_name'];
		$searchname = $postData['searchname'];
		$searchudate_start = $postData['searchudate_start'];
		$searchdate_end = $postData['searchdate_end'];
		$searcheleave_id= $postData['searcheleave_id'];
		/* $searcheleave_status = $postData['searcheleave_status']; */
		
		//ดึง EMP_ID กับ USER_LEVEL จาก SESSION เพื่อเอาไปคำนวณ
		$emp_id =$this->session->userdata("EMP_ID");
		
		$searcheleave_status ="0";
		//เช็คสิทธิแล้ว ตั้งให้เห็นเฉพาะตนเองถ้าสิทธิไม่ถึง
		
			$searchemp_id=$emp_id;
		
		//
		
		## Search 
		$search_arr = array();
		$searchQuery = "";
		if($searchValue != ''){
			$search_arr[] = " (ELEAVE_NAME like '%".$searchValue."%' or 
			ELEAVE_TYPE_ID like '%".$searchValue."%' or 
			ELEAVE_COMPANY_NAME like'%".$searchValue."%'  or
			ELEAVE_DATE_START like'%".$searchValue."%' or
			ELEAVE_DATE_END like'%".$searchValue."%'or
			ELEAVE_MANAGER_APPROVE like'%".$searchValue."%' or
			ELEAVE_MANAGER_APPROVE_ID_DEFAILT like'%".$searchValue."%' or
			ELEAVE_ID like'%".$searchValue."%'
			) ";
		}
		if($search_eleave_type != ''){
			$search_arr[] = " ELEAVE_TYPE_ID='".$search_eleave_type."' ";
		}
		if($searchcompany_name != ''){
			$search_arr[] = " ELEAVE_COMPANY_NAME='".$searchcompany_name."' ";
		}
		if($searchudate_start != ''){
			$search_arr[] = " ELEAVE_DATE_START like '%".$searchudate_start."%' ";
		}
		if($searchdate_end != ''){
			$search_arr[] = " ELEAVE_DATE_END like '%".$searchdate_end."%' ";
		}
		if($searchname != ''){
			$search_arr[] = " ELEAVE_NAME like '%".$searchname."%' ";
		}
		if($searcheleave_status != ''){
			$search_arr[] = " ELEAVE_MANAGER_APPROVE like '%".$searcheleave_status."%' ";
		}
		if($searchemp_id != ''){
			$search_arr[] = " ELEAVE_MANAGER_APPROVE_ID_DEFAILT like '%".$searchemp_id."%' ";
		}
		if($searcheleave_id != ''){
			$search_arr[] = " ELEAVE_ID like '%".$searcheleave_id."%' ";
		}
		if(count($search_arr) > 0){
			$searchQuery = implode(" and ",$search_arr);
		}
		
		
		## Total number of records without filtering
		$this->db->select('count(*) as allcount');
		$records = $this->db->get('ELEAVE')->result();
		$totalRecords = $records[0]->allcount;
		
		## Total number of record with filtering
		$this->db->select('count(*) as allcount');
		if($searchQuery != '')
		$this->db->where($searchQuery);
		$records = $this->db->get('ELEAVE')->result();
		$totalRecordwithFilter = $records[0]->allcount;
		/* echo print_r($records); */
		## Fetch records
		$this->db->select('*');
		if($searchQuery != '')
		$this->db->where($searchQuery);
		$this->db->order_by($columnName, $columnSortOrder);
		$this->db->limit($rowperpage, $start);
		$records = $this->db->get('ELEAVE')->result();
		
		$data = [];
	
			foreach($records as $record){
				$data[] = $record;
			}
		
		
		/* echo print_r($data); */
		## Response
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data
		);
  
		return $response; 
		echo print_r($response);
	}
	//สำหรับอัพเดท status eleave 
	function update_status_data_eleave_manager($form_eleave_status_type,$form_eleave_emp,$form_eleave_id){
		$sql = "UPDATE ELEAVE SET ELEAVE_MANAGER_APPROVE ='$form_eleave_status_type' WHERE ELEAVE_ID ='$form_eleave_id' AND ELEAVE_EMP_ID='$form_eleave_emp' ";
		$query =$this->db->query($sql);
	}

	///function ลบข้อมูล
	function eleave_delete_order(){
	
	}
	

	


	function insert_order_approve_manager($form_eleave_id,$form_eleave_emp,$status_manager){
		//โหลดข้อมูลพนักงาน
		$sql="SELECT EMP_ID,NAME,SURNAME FROM USER_INFO WHERE EMP_ID='$form_eleave_emp'AND IS_APPROVE='1'";
		$query =$this->db->query($sql)->row();
		$user_emp_id= @$query->EMP_ID;
		$user_name= @$query->NAME;
		$user_surname= @$query->SURNAME;
		
		//โหลดข้อมูลผู้จัดการ
		$emp_id_session =$this->session->userdata("EMP_ID");
		$sql1="SELECT ELEAVE_NAME,ELEAVE_SURNAME,ELEAVE_COMPANY_NAME FROM ELEAVE WHERE  ELEAVE_EMP_ID ='$emp_id_session' AND ELEAVE_ID ='$form_eleave_id'";
		$query1 =$this->db->query($sql1)->row();
		$eleave_name= @$query1->ELEAVE_NAME;
		$eleave_surname= @$query1->ELEAVE_SURNAME;
		$eleave_company_name= @$query1->ELEAVE_COMPANY_NAME;
		
		

		$sql2="SELECT DEPARTMENT,JOB_POSITION FROM USER_INFO WHERE  EMP_ID ='$emp_id_session' AND IS_APPROVE='1'";
		$query2 =$this->db->query($sql2)->row();
		$user_department= @$query2->DEPARTMENT;
		$user_jobposition= @$query2->JOB_POSITION;
		$is_approve="1";
		$datenow=date("Y-m-d h:i:s");
		
		//
		$sql3= "INSERT INTO MANAGER_APPROVE_ORDER_ALL (
		MANAGER_ISAPPROVE_ELEAVE_ID,
		MANAGER_EMP_ID,
		MANAGER_NAME,
		MANAGER_SURNAME,
		MANAGER_COMPANY,
		MANAGER_DEPARTMENT,
		MANAGER_JOB_POSITION,
		MANAGER_EMP_ID_USER_STAFF,
		MANAGER_NAME_STAFF,
		MANAGER_SURNAME_STAFF,
		MANAGER_APPROVE_DATE,
		MANAGER_ELEAVE_STATUS,
		MANAGER_IS_APPROVE)
			VALUES
			('$form_eleave_id','$emp_id_session','$eleave_name'
			,'$eleave_surname','$eleave_company_name','$user_department'
			,'$user_jobposition','$user_emp_id','$user_name','$user_surname','$datenow','$status_manager','$is_approve')";
		$query3 =$this->db->query($sql3);
		

	}

	function ajax_search_data_hr_approve($postData=null){
		$response = array();
		
		## Read value
		$draw = $postData['draw'];
			$start = $postData['start'];
			$rowperpage = $postData['length']; // Rows display per page
			$columnIndex = $postData['order'][0]['column']; // Column index
			$columnName = $postData['columns'][$columnIndex]['data']; // Column name
			$columnSortOrder = $postData['order'][0]['dir']; // asc or desc
			$searchValue = $postData['search']['value']; // Search value
			
		// Custom search filter 
		$search_eleave_type = $postData['search_eleave_type'];
		$searchcompany_name = $postData['searchcompany_name'];
		$searchname = $postData['searchname'];
		$searchudate_start = $postData['searchudate_start'];
		$searchdate_end = $postData['searchdate_end'];
		$searcheleave_id= $postData['searcheleave_id'];
		/* $searcheleave_status = $postData['searcheleave_status']; */
		
		//ดึง EMP_ID กับ USER_LEVEL จาก SESSION เพื่อเอาไปคำนวณ
		$emp_id =$this->session->userdata("EMP_ID");
		
		$searcheleave_status ="0";
		$searchmanagerapprove ="1";
		//เช็คสิทธิแล้ว ตั้งให้เห็นเฉพาะตนเองถ้าสิทธิไม่ถึง
		
			$searchemp_id=$emp_id;
		
		//
		
		## Search 
		$search_arr = array();
		$searchQuery = "";
		if($searchValue != ''){
			$search_arr[] = " (ELEAVE_NAME like '%".$searchValue."%' or 
			ELEAVE_TYPE_ID like '%".$searchValue."%' or 
			ELEAVE_COMPANY_NAME like'%".$searchValue."%'  or
			ELEAVE_DATE_START like'%".$searchValue."%' or
			ELEAVE_DATE_END like'%".$searchValue."%'or
			ELEAVE_STATUS like'%".$searchValue."%' or
			ELEAVE_HR_APPROVE like'%".$searchValue."%' or
			ELEAVE_MANAGER_APPROVE like'%".$searchValue."%' or
			ELEAVE_HUMANE_RESOURCES_ID_DEFAULT like'%".$searchValue."%' or
			ELEAVE_ID like'%".$searchValue."%'
			) ";
		}
		if($search_eleave_type != ''){
			$search_arr[] = " ELEAVE_TYPE_ID='".$search_eleave_type."' ";
		}
		if($searchcompany_name != ''){
			$search_arr[] = " ELEAVE_COMPANY_NAME='".$searchcompany_name."' ";
		}
		if($searchudate_start != ''){
			$search_arr[] = " ELEAVE_DATE_START like '%".$searchudate_start."%' ";
		}
		if($searchdate_end != ''){
			$search_arr[] = " ELEAVE_DATE_END like '%".$searchdate_end."%' ";
		}
		if($searchname != ''){
			$search_arr[] = " ELEAVE_NAME like '%".$searchname."%' ";
		}
		
		if($searcheleave_status != ''){
			$search_arr[] = " ELEAVE_HR_APPROVE like '%".$searcheleave_status."%' ";
		}
		if($searchemp_id != ''){
			$search_arr[] = " ELEAVE_HUMANE_RESOURCES_ID_DEFAULT like '%".$searchemp_id."%' ";
		}
		if($searchmanagerapprove != ''){
			$search_arr[] = " ELEAVE_MANAGER_APPROVE like '%".$searchmanagerapprove."%' ";
		}
		if($searcheleave_id != ''){
			$search_arr[] = " ELEAVE_ID like '%".$searcheleave_id."%' ";
		}
		if(count($search_arr) > 0){
			$searchQuery = implode(" and ",$search_arr);
		}
		
		
		## Total number of records without filtering
		$this->db->select('count(*) as allcount');
		$records = $this->db->get('ELEAVE')->result();
		$totalRecords = $records[0]->allcount;
		
		## Total number of record with filtering
		$this->db->select('count(*) as allcount');
		if($searchQuery != '')
		$this->db->where($searchQuery);
		$records = $this->db->get('ELEAVE')->result();
		$totalRecordwithFilter = $records[0]->allcount;
		/* echo print_r($records); */
		## Fetch records
		$this->db->select('*');
		if($searchQuery != '')
		$this->db->where($searchQuery);
		$this->db->order_by($columnName, $columnSortOrder);
		$this->db->limit($rowperpage, $start);
		$records = $this->db->get('ELEAVE')->result();
		
		$data = [];
	
			foreach($records as $record){
				$data[] = $record;
			}
		
		
		/* echo print_r($data); */
		## Response
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data
		);
  
		return $response; 
		echo print_r($response);
	}



	//สำหรับอัพเดท status eleave 
	function update_status_data_eleave_hr($form_eleave_status_type,$form_eleave_id,$form_eleave_emp){
		$sql = "UPDATE ELEAVE SET ELEAVE_HR_APPROVE ='$form_eleave_status_type' WHERE ELEAVE_ID ='$form_eleave_id' AND ELEAVE_EMP_ID='$form_eleave_emp' ";
		$query =$this->db->query($sql);
	}

	function insert_order_approve_hr($form_eleave_id,$form_eleave_emp,$status_manager){
		//โหลดข้อมูลพนักงาน
		$sql="SELECT EMP_ID,NAME,SURNAME FROM USER_INFO WHERE EMP_ID='$form_eleave_emp'AND IS_APPROVE='1'";
		$query =$this->db->query($sql)->row();
		$user_emp_id= @$query->EMP_ID;
		$user_name= @$query->NAME;
		$user_surname= @$query->SURNAME;


		$emp_id_session =$this->session->userdata("EMP_ID");
		//
		$sql1="SELECT ELEAVE_NAME,ELEAVE_SURNAME,ELEAVE_COMPANY_NAME FROM ELEAVE WHERE  ELEAVE_EMP_ID ='$emp_id_session' AND ELEAVE_ID ='$form_eleave_id'";
		$query1 =$this->db->query($sql1)->row();
		$eleave_name= @$query1->ELEAVE_NAME;
		$eleave_surname= @$query1->ELEAVE_SURNAME;
		$eleave_company_name= @$query1->ELEAVE_COMPANY_NAME;

		$sql2="SELECT DEPARTMENT,JOB_POSITION FROM USER_INFO WHERE  EMP_ID ='$emp_id_session' AND IS_APPROVE='1'";
		$query2 =$this->db->query($sql2)->row();
		$user_department= @$query2->DEPARTMENT;
		$user_jobposition= @$query2->JOB_POSITION;
		$is_approve="1";
		$datenow=date("Y-m-d h:i:s");
		//
		$sql3= "INSERT INTO HUMANE_RESOURCES_APPROVE_ORDER_ALL (
		HUMANE_RESOURCES_ISAPPROVE_ELEAVE_ID,
		HUMANE_RESOURCES_EMP_ID,
		HUMANE_RESOURCES_NAME,
		HUMANE_RESOURCES_SURNAME,
		HUMANE_RESOURCES_COMPANY,
		HUMANE_RESOURCES_DEPARTMENT,
		HUMANE_RESOURCES_JOB_POSITION,
		HUMANE_RESOURCES_EMP_ID_USER_STAFF,
		HUMANE_RESOURCES_NAME_STAFF,
		HUMANE_RESOURCES_SURNAME_STAFF,
		HUMANE_RESOURCES_APPROVE_DATE,
		HUMANE_RESOURCES_ELEAVE_STATUS,
		HUMANE_RESOURCES_IS_APPROVE)
			VALUES
			('$form_eleave_id','$emp_id_session','$eleave_name'
			,'$eleave_surname','$eleave_company_name','$user_department'
			,'$user_jobposition','$user_emp_id','$user_name','$user_surname','$datenow','$status_manager','$is_approve')";
		$query3 =$this->db->query($sql3);

	}
	//ลบเวลาของลากิจ
	function diffday_hour_minute_conem($form_eleave_status_type,$form_eleave_id,$form_eleave_emp,$form_number_time_eleave){
		
		//บวกลบเวลาประเภทลากิจจากสกอ
		$sql = "SELECT ELEAVE_CONEM_NUMBER_SCORE_ID,ELEAVE_CONEM_NUMBER_SCORE_EMP_ID,ELEAVE_CONEM_NUMBER_SCORE_D,ELEAVE_CONEM_NUMBER_SCORE_H,ELEAVE_CONEM_NUMBER_SCORE_M
		 FROM ELEAVE_CONEM_NUMBER_SCORE WHERE ELEAVE_CONEM_NUMBER_SCORE_EMP_ID ='$form_eleave_emp'";
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
		//

		//ดึงเวลามาแตกจาก form_number_time_eleave
		$text_number =explode(" ",$form_number_time_eleave);
		/* echo print_f($text_number); */
		$day = $text_number[0];
		$test1 = $text_number[1];
		$hour = $text_number[2];
		$test3 = $text_number[3];
		$minute = $text_number[4];
		$test5 = $text_number[5];
		/* echo print_r($text_number); */
		/* echo "<BR>";
		echo print_r($text_number); */
		//คิด function ตัดวัน
		//คำนวณเอาวันแปลงเป็นวิ
		$day_to_s=$day*8*60*60;
		//เอาชั่วโมงแปลงเป็นวิ
		$hour_to_s=$hour*60*60;
		//เอานาทีแปลงเป็นวิ
		$minute_to_s=$minute*60;
		$alltimeinput=$day_to_s+$hour_to_s+$minute_to_s;
		//ดึงเวลาจากสกอมาคำนวณ
		/* $day_default="30";
		$day_to_s_default=$day_default*86400; */
		
		//ค่าต่อ 1 วัน 1 ชม และ 1 นาที 
		$day2 = 28800;
		$hour2 = 3600;
		$minute2 = 60;

		
		//สมการในการคำนวณหาวัน ชม นาที 
		$all=$eleave_conem_number_score_all-$alltimeinput;
		$day_aaa=floor(($all/$day2));
		$hoursout=floor(($all-$day_aaa*$day2)/$hour2);
		$minutesout=floor(($all-$day_aaa*$day2-$hoursout*$hour2)/$minute2);
		
		//แสดงผลเพื่อทดสอบ
		/* echo "<BR>";
		echo $day_aaa;
		echo "<BR>";
		echo $hoursout;
		echo "<BR>";
		echo $minutesout; */

		$sql2 = "UPDATE ELEAVE_CONEM_NUMBER_SCORE SET ELEAVE_CONEM_NUMBER_SCORE_D ='$day_aaa', ELEAVE_CONEM_NUMBER_SCORE_H ='$hoursout', ELEAVE_CONEM_NUMBER_SCORE_M ='$minutesout' WHERE  ELEAVE_CONEM_NUMBER_SCORE_EMP_ID='$form_eleave_emp' ";
		$query2 =$this->db->query($sql2);

		echo $query2;
	}

	//ลบเวลาของป่วย
	function diffday_hour_minute_sick($form_eleave_status_type,$form_eleave_id,$form_eleave_emp,$form_number_time_eleave){
		
		//บวกลบเวลาประเภทลากิจจากสกอ
		$sql = "SELECT ELEAVE_SICK_NUMBER_SCORE_ID,ELEAVE_SICK_NUMBER_SCORE_EMP_ID,ELEAVE_SICK_NUMBER_SCORE_D,ELEAVE_SICK_NUMBER_SCORE_H,ELEAVE_SICK_NUMBER_SCORE_M
		 FROM ELEAVE_SICK_NUMBER_SCORE WHERE ELEAVE_SICK_NUMBER_SCORE_EMP_ID ='$form_eleave_emp'";
		$query = $this->db->query($sql)->row();
		$eleave_sick_number_score_id= @$query->ELEAVE_SICK_NUMBER_SCORE_ID;
		$eleave_sick_number_score_emp_id= @$query->ELEAVE_SICK_NUMBER_SCORE_EMP_ID;
		$eleave_sick_number_score_d= @$query->ELEAVE_SICK_NUMBER_SCORE_D;
		$eleave_sick_number_score_h= @$query->ELEAVE_SICK_NUMBER_SCORE_H;
		$eleave_sick_number_score_m= @$query->ELEAVE_SICK_NUMBER_SCORE_M;
		
		$eleave_sick_number_score_1=$eleave_sick_number_score_d*8*60*60;
		$eleave_sick_number_score_2=$eleave_sick_number_score_h*60*60;
		$eleave_sick_number_score_3=$eleave_sick_number_score_m*60;
		$eleave_sick_number_score_all=$eleave_sick_number_score_1+$eleave_sick_number_score_2+$eleave_sick_number_score_3;
		//

		//ดึงเวลามาแตกจาก form_number_time_eleave
		$text_number =explode(" ",$form_number_time_eleave);
		/* echo print_f($text_number); */
		$day = $text_number[0];
		$test1 = $text_number[1];
		$hour = $text_number[2];
		$test3 = $text_number[3];
		$minute = $text_number[4];
		$test5 = $text_number[5];

		echo "<BR>";
		echo print_r($text_number);
		//คิด function ตัดวัน
		//คำนวณเอาวันแปลงเป็นวิ
		$day_to_s=$day*8*60*60;
		//เอาชั่วโมงแปลงเป็นวิ
		$hour_to_s=$hour*60*60;
		//เอานาทีแปลงเป็นวิ
		$minute_to_s=$minute*60;
		$alltimeinput=$day_to_s+$hour_to_s+$minute_to_s;
		//ดึงเวลาจากสกอมาคำนวณ
		/* $day_default="30";
		$day_to_s_default=$day_default*86400; */
		
		//ค่าต่อ 1 วัน 1 ชม และ 1 นาที 
		$day2 = 28800;
		$hour2 = 3600;
		$minute2 = 60;

		
		//สมการในการคำนวณหาวัน ชม นาที 
		$all=$eleave_sick_number_score_all-$alltimeinput;
		$day_aaa=floor(($all/$day2));
		$hoursout=floor(($all-$day_aaa*$day2)/$hour2);
		$minutesout=floor(($all-$day_aaa*$day2-$hoursout*$hour2)/$minute2);
		
		//แสดงผลเพื่อทดสอบ
		echo "<BR>";
		echo $day_aaa;
		echo "<BR>";
		echo $hoursout;
		echo "<BR>";
		echo $minutesout;

		$sql2 = "UPDATE ELEAVE_SICK_NUMBER_SCORE SET ELEAVE_SICK_NUMBER_SCORE_D ='$day_aaa', ELEAVE_SICK_NUMBER_SCORE_H ='$hoursout', ELEAVE_SICK_NUMBER_SCORE_M ='$minutesout' WHERE  ELEAVE_SICK_NUMBER_SCORE_EMP_ID='$form_eleave_emp' ";
		$query2 =$this->db->query($sql2);

		echo $query2;
	}
	//ลบเวลาของลากิจฉุกเฉิน
	function diffday_hour_minute_emergency($form_eleave_status_type,$form_eleave_id,$form_eleave_emp,$form_number_time_eleave){
		
		//บวกลบเวลาประเภทลากิจจากสกอ
		$sql = "SELECT ELEAVE_EMERGENCY_NUMBER_SCORE_ID,ELEAVE_EMERGENCY_NUMBER_SCORE_EMP_ID,ELEAVE_EMERGENCY_NUMBER_SCORE_D,ELEAVE_EMERGENCY_NUMBER_SCORE_H,ELEAVE_EMERGENCY_NUMBER_SCORE_M
		 FROM ELEAVE_EMERGENCY_NUMBER_SCORE WHERE ELEAVE_EMERGENCY_NUMBER_SCORE_EMP_ID ='$form_eleave_emp'";
		$query = $this->db->query($sql)->row();
		$eleave_emergency_number_score_id= @$query->ELEAVE_EMERGENCY_NUMBER_SCORE_ID;
		$eleave_emergency_number_score_emp_id= @$query->ELEAVE_EMERGENCY_NUMBER_SCORE_EMP_ID;
		$eleave_emergency_number_score_d= @$query->ELEAVE_EMERGENCY_NUMBER_SCORE_D;
		$eleave_emergency_number_score_h= @$query->ELEAVE_EMERGENCY_NUMBER_SCORE_H;
		$eleave_emergency_number_score_m= @$query->ELEAVE_EMERGENCY_NUMBER_SCORE_M;
		
		$eleave_emergency_number_score_1=$eleave_emergency_number_score_d*8*60*60;
		$eleave_emergency_number_score_2=$eleave_emergency_number_score_h*60*60;
		$eleave_emergency_number_score_3=$eleave_emergency_number_score_m*60;
		$eleave_emergency_number_score_all=$eleave_emergency_number_score_1+$eleave_emergency_number_score_2+$eleave_emergency_number_score_3;
		//

		//ดึงเวลามาแตกจาก form_number_time_eleave
		$text_number =explode(" ",$form_number_time_eleave);
		/* echo print_f($text_number); */
		$day = $text_number[0];
		$test1 = $text_number[1];
		$hour = $text_number[2];
		$test3 = $text_number[3];
		$minute = $text_number[4];
		$test5 = $text_number[5];

		echo "<BR>";
		echo print_r($text_number);
		//คิด function ตัดวัน
		//คำนวณเอาวันแปลงเป็นวิ
		$day_to_s=$day*8*60*60;
		//เอาชั่วโมงแปลงเป็นวิ
		$hour_to_s=$hour*60*60;
		//เอานาทีแปลงเป็นวิ
		$minute_to_s=$minute*60;
		$alltimeinput=$day_to_s+$hour_to_s+$minute_to_s;
		//ดึงเวลาจากสกอมาคำนวณ
		/* $day_default="30";
		$day_to_s_default=$day_default*86400; */
		
		//ค่าต่อ 1 วัน 1 ชม และ 1 นาที 
		$day2 = 28800;
		$hour2 = 3600;
		$minute2 = 60;

		
		//สมการในการคำนวณหาวัน ชม นาที 
		$all=$eleave_emergency_number_score_all-$alltimeinput;
		$day_aaa=floor(($all/$day2));
		$hoursout=floor(($all-$day_aaa*$day2)/$hour2);
		$minutesout=floor(($all-$day_aaa*$day2-$hoursout*$hour2)/$minute2);
		
		//แสดงผลเพื่อทดสอบ
		echo "<BR>";
		echo $day_aaa;
		echo "<BR>";
		echo $hoursout;
		echo "<BR>";
		echo $minutesout;
		echo "<BR>";
		echo$eleave_emergency_number_score_d;

		$sql2 = "UPDATE ELEAVE_EMERGENCY_NUMBER_SCORE SET ELEAVE_EMERGENCY_NUMBER_SCORE_D ='$day_aaa', ELEAVE_EMERGENCY_NUMBER_SCORE_H ='$hoursout', ELEAVE_EMERGENCY_NUMBER_SCORE_M ='$minutesout' WHERE  ELEAVE_EMERGENCY_NUMBER_SCORE_EMP_ID='$form_eleave_emp' ";
		$query2 =$this->db->query($sql2);

		echo $query2;
	}

	function eleave_delete_status($form_eleave_id){
		$sql= "DELETE FROM ELEAVE WHERE ELEAVE_ID='$form_eleave_id'" ;
		$query =$this->db->query($sql);
		echo print_r($query);
	}


	

	




}


    





  
