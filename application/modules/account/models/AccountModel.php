<?php
class AccountModel extends CI_Model {

	function __construct() {
		parent::__construct();
		
	}

	function get_user_info(){

	
		 $sql = "SELECT * FROM USER_INFO WHERE USER_ID='" . $userID . "'";
		$query = $this->db->query($sql)->row();
		return @$query;	 
	}

      function ajax_account_content($postData=null){   
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
		$searchuser_status = $postData['searchuser_status'];
		$searchcompany_name = $postData['searchcompany_name'];
		$search_department = $postData['search_department'];
		$search_job_position= $postData['search_job_position'];
		$searchname = $postData['searchname'];
  
		## Search 
		$search_arr = array();
		$searchQuery = "";
		if($searchValue != ''){
			$search_arr[] = " (NAME like '%".$searchValue."%' or 
			USER_STATUS like'%".$searchValue."%'or
			DEPARTMENT like '%".$searchValue."%' or 
			COMPANY_NAME like'%".$searchValue."%'or
			JOB_POSITION like'%".$searchValue."%' ) ";
		}
		if($searchuser_status != ''){
			$search_arr[] = " USER_STATUS='".$searchuser_status."' ";
		}
		if($search_department != ''){
			$search_arr[] = " DEPARTMENT='".$search_department."' ";
		}
		if($searchcompany_name != ''){
			$search_arr[] = " COMPANY_NAME=  '".$searchcompany_name."' ";
		}
		if($search_job_position != ''){
			$search_arr[] = " JOB_POSITION = '".$search_job_position."' ";
		}
		if($searchname != ''){
			$search_arr[] = " NAME like '%".$searchname."%' ";
		}
		if(count($search_arr) > 0){
			$searchQuery = implode(" and ",$search_arr);
		}
		
		/* echo print_r($searchQuery); */
		## Total number of records without filtering
		$this->db->select('count(*) as allcount');
		$records = $this->db->get('USER_INFO')->result();
		$totalRecords = $records[0]->allcount;
		
		## Total number of record with filtering
		$this->db->select('count(*) as allcount');
		if($searchQuery != '')
		$this->db->where($searchQuery);
		$records = $this->db->get('USER_INFO')->result();
		$totalRecordwithFilter = $records[0]->allcount;
		/* echo print_r($records); */
		## Fetch records
		$this->db->select('*');
		if($searchQuery != '')
		$this->db->where($searchQuery);
		$this->db->order_by($columnName, $columnSortOrder);
		$this->db->limit($rowperpage, $start);
		$records = $this->db->get('USER_INFO')->result();
		
		$data = [];
	
			foreach($records as $record){
				$data[] = $record;
			}
		
		/* foreach($records as $row ){
		   
			$data[] = array( 
				"USER_ID"=>$row->user_id,
				"EMP_ID"=>$row->emp_id,
				"USERNAME"=>$row->username,
				"PASSWORD"=>$row->password,
				"NAME"=>$row->name,
				"SURNAME"=>$row->surname,
				"USER_BIRTHDAY"=>$row->user_birthday,
				"USER_GENDER"=>$row->user_gender,
				"EMAIL"=>$row->email,
				"DEPARTMENT"=>$row->department,
				"JOB_POSITION"=>$row->job_postiton,
				"COMPANY_ID"=>$row->company_id,
				"COMPANY_NAME"=>$row->company_name,
				"USER_LEVEL"=>$row->user_level,
				"USER_ACTIVE"=>$row->user_active,
				"IMAGE_PROFILE"=>$row->image_profile,
				"PASSWORD_EMERGENCY"=>$rrowecord->password_emergency,
				"PHONE"=>$row->phone,
				"CONTACT_ADDRESS"=>$row->contact_address,
				"MANAGER_APPROVE"=>$row->manager_approve,
				"HUMANE_RESOURCES_APPROVE"=>$row->humane_resources_appove,
				"JOB_START_DATE"=>$row->job_start_date,
				"END_PROBATIO"=>$row->end_probatio,
				"IS_APPROVE"=>$row->is_approve
				
				
			); 
			
		} */
		/* echo print_r($data); */
		## Response
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data
		);
  
		return $response; 
	}




    function change_password_account_model($emp_id,$change_password_02) {  
         $sql = "UPDATE  USER_INFO SET PASSWORD ='$change_password_02'  WHERE EMP_ID ='$emp_id'";
		 $query =$this->db->query($sql);
		
		 
          
     }   


	function user_edit_password_model($emp_id_session,$password_2) {  
		$sql = "UPDATE  USER_INFO SET PASSWORD ='$password_2'  WHERE EMP_ID ='$emp_id_session'";
		$query =$this->db->query($sql);
	   
		
		 
	}
	
	
	function upload_file($attach_name,$user_id,$emp_id_session){

		$sql= "UPDATE  USER_INFO SET IMAGE_PROFILE ='$attach_name'  WHERE EMP_ID ='$emp_id_session' AND USER_ID='$user_id' AND IS_APPROVE='1'" ;
		$query =$this->db->query($sql);
		
		

	}
	function upload_file2($attach_name,$user_id,$from_emp){

		$sql= "UPDATE  USER_INFO SET IMAGE_PROFILE ='$attach_name'  WHERE EMP_ID ='$from_emp' AND USER_ID='$user_id' AND IS_APPROVE='1'" ;
		$query =$this->db->query($sql);
		
		

	}


	
	function user_delete($data){

		$sql= "DELETE FROM USER_INFO WHERE USER_ID='$data'" ;
		$query =$this->db->query($sql);
		
		
	}


	 function hr_edit_profile_user($from_emp,$from_name,$from_surname,$from_gender,$from_email,$from_department,
	 $from_job_position,$from_company,$from_phone,$from_address,$from_manager_approve,$from_humane_resources_approve,$user_id){
		
		
	   if($from_company ="Benz Talingchan Co., Ltd."){
		   $company_id ="1";
		   
	   }
	   elseif($from_company ="ATTA Autohaus Co., Ltd."){
		   $company_id ="2";
		   
	   }


		$sql= "UPDATE  USER_INFO SET EMP_ID='$from_emp',NAME='$from_name',
		SURNAME	='$from_surname',USER_GENDER='$from_gender',EMAIL='$from_email',DEPARTMENT='$from_department',
		JOB_POSITION='$from_job_position',COMPANY_ID='$company_id',
		COMPANY_NAME='$from_company',PHONE='$from_phone',CONTACT_ADDRESS	='$from_address',MANAGER_APPROVE	='$from_manager_approve',
		HUMANE_RESOURCES_APPROVE='$from_humane_resources_approve',USER_STATUS='$user_status'
		WHERE EMP_ID ='$from_emp' AND USER_ID='$user_id' AND IS_APPROVE='1'" ;
		$query =$this->db->query($sql);

	   
	} 

	
	function update_user_import_log($user_id,$attach_name,$type,$attach_file,$date_action,$status){
		if($status=="IMPORT:SUCCESS"){
			$status="IMPORT:SUCCESS";
		}elseif($status=="IMPORT:FALI"){
			$status="IMPORT:FALI";
		}
		$sql= "INSERT INTO USER_UPLOAD_FILE_LOG (UPLOAD_USER_ID,UPLOAD_NAME_FILE,UPLOAD_TYPE_FILE,UPLOAD_PART_FILE,UPLOAD_DATE,UPLOAD_STATUS) VALUES ('$user_id','$attach_name','$type','$attach_file','$date_action','$status')";
		$query =$this->db->query($sql);
		
		
	}

	function ajax_search_data_permission($postData=null){
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
		
		$searchcompany_name = $postData['searchcompany_name'];
		$searchname = $postData['searchname'];
  
		## Search 
		$search_arr = array();
		$searchQuery = "";
		if($searchValue != ''){
			$search_arr[] = " (NAME like '%".$searchValue."%' or 
			COMPANY_NAME like'%".$searchValue."%' ) ";
		}
		if($searchcompany_name != ''){
			$search_arr[] = " COMPANY_NAME='".$searchcompany_name."' ";
		}
	
		if($searchname != ''){
			$search_arr[] = " NAME like '%".$searchname."%' ";
		}
		if(count($search_arr) > 0){
			$searchQuery = implode(" and ",$search_arr);
		}
		
		
		## Total number of records without filtering
		$this->db->select('count(*) as allcount');
		$records = $this->db->get('USER_INFO')->result();
		$totalRecords = $records[0]->allcount;
		
		## Total number of record with filtering
		$this->db->select('count(*) as allcount');
		if($searchQuery != '')
		$this->db->where($searchQuery);
		$records = $this->db->get('USER_INFO')->result();
		$totalRecordwithFilter = $records[0]->allcount;
		/* echo print_r($records); */
		## Fetch records
		$this->db->select('*');
		if($searchQuery != '')
		$this->db->where($searchQuery);
		$this->db->order_by($columnName, $columnSortOrder);
		$this->db->limit($rowperpage, $start);
		$records = $this->db->get('USER_INFO')->result();
		
		$data = [];
	
			foreach($records as $record){
				$data[] = $record;
			}
		
		/* foreach($records as $row ){
		   
			$data[] = array( 
				"USER_ID"=>$row->user_id,
				"EMP_ID"=>$row->emp_id,
				"USERNAME"=>$row->username,
				"PASSWORD"=>$row->password,
				"NAME"=>$row->name,
				"SURNAME"=>$row->surname,
				"USER_BIRTHDAY"=>$row->user_birthday,
				"USER_GENDER"=>$row->user_gender,
				"EMAIL"=>$row->email,
				"DEPARTMENT"=>$row->department,
				"JOB_POSITION"=>$row->job_postiton,
				"COMPANY_ID"=>$row->company_id,
				"COMPANY_NAME"=>$row->company_name,
				"USER_LEVEL"=>$row->user_level,
				"USER_ACTIVE"=>$row->user_active,
				"IMAGE_PROFILE"=>$row->image_profile,
				"PASSWORD_EMERGENCY"=>$rrowecord->password_emergency,
				"PHONE"=>$row->phone,
				"CONTACT_ADDRESS"=>$row->contact_address,
				"MANAGER_APPROVE"=>$row->manager_approve,
				"HUMANE_RESOURCES_APPROVE"=>$row->humane_resources_appove,
				"JOB_START_DATE"=>$row->job_start_date,
				"END_PROBATIO"=>$row->end_probatio,
				"IS_APPROVE"=>$row->is_approve
				
				
			); 
			
		} */
		/* echo print_r($data); */
		## Response
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data
		);
  
		return $response; 
		
	}


	function update_user_edit_permission($main_menu1,$sub_menu2,$emp_id){
		$sql= "UPDATE USER_PERMISSTION_MENU_MAIN SET PERMISSTION_M_ID='$main_menu1',PERMISSTION_S_ID='$sub_menu2' WHERE EMP_ID_PERMISSTION='$emp_id' AND IS_APPROVE='1'" ;
		$query =$this->db->query($sql);
	}

	function ajax__load_view_add_manager_content($postData=null){   
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
		/* $searchuser_status = $postData['searchuser_status']; */
		$searchcompany_name = $postData['searchcompany_name'];
		$search_department = $postData['search_department'];
		/* $search_job_position= $postData['search_job_position']; */
		$searchname = $postData['searchname'];
		//เงื่อนไข

		if($search_department == '02Management'){
			$search_department = '02Management';
		}elseif ($search_department == '22Executive'){
			$search_department = '22Executive';
		}else{
			$search_department = '';
		}
		## Search 
		$search_arr = array();
		$searchQuery = "";
		if($searchValue != ''){
			$search_arr[] = " (NAME like '%".$searchValue."%' or 
			
			DEPARTMENT like '%".$searchValue."%' or 
			COMPANY_NAME like'%".$searchValue."%'
			 ) ";
		}
		/* if($searchuser_status != ''){
			$search_arr[] = " USER_STATUS='".$searchuser_status."' ";
		} */
		if($search_department != ''){
			$search_arr[] = " DEPARTMENT='".$search_department."' ";
		}
		if($searchcompany_name != ''){
			$search_arr[] = " COMPANY_NAME=  '".$searchcompany_name."' ";
		}
		/* if($search_job_position != ''){
			$search_arr[] = " JOB_POSITION = '".$search_job_position."' ";
		} */
		if($searchname != ''){
			$search_arr[] = " NAME like '%".$searchname."%' ";
		}
		if(count($search_arr) > 0){
			$searchQuery = implode(" and ",$search_arr);
		}
		
		/* echo print_r($searchQuery); */
		## Total number of records without filtering
		$this->db->select('count(*) as allcount');
		$records = $this->db->get('USER_INFO')->result();
		$totalRecords = $records[0]->allcount;
		
		## Total number of record with filtering
		$this->db->select('count(*) as allcount');
		if($searchQuery != '')
		$this->db->where($searchQuery);
		$records = $this->db->get('USER_INFO')->result();
		$totalRecordwithFilter = $records[0]->allcount;
		/* echo print_r($records); */
		## Fetch records
		$this->db->select('*');
		if($searchQuery != '')
		$this->db->where($searchQuery);
		$this->db->order_by($columnName, $columnSortOrder);
		$this->db->limit($rowperpage, $start);
		$records = $this->db->get('USER_INFO')->result();
		
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
	}




	function insert_add_manager_approve($emp_id,$user_name,$user_surname){
		$datenow=date("Y-m-d h:i:s");
		$sql="INSERT  INTO  MANAGER_TYPE (MANAGER_EMP_ID,MANAGER_NAME,MANAGER_SURNAME,DATE_TIME_ADD,IS_APPROVE)  VALUES ('$emp_id','$user_name','$datenow','$user_surname','1') ";
		$query =$this->db->query($sql);


	}

	function ajax__load_view_add_hr_content($postData=null){   
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
		/* $searchuser_status = $postData['searchuser_status']; */
		$searchcompany_name = $postData['searchcompany_name'];
		$search_department = $postData['search_department'];
		/* $search_job_position= $postData['search_job_position']; */
		$searchname = $postData['searchname'];
		//เงื่อนไข

		if($search_department == '03Human Resources'){
			$search_department = '03Human Resources';
		}else{
			$search_department = '';
		}
		## Search 
		$search_arr = array();
		$searchQuery = "";
		if($searchValue != ''){
			$search_arr[] = " (NAME like '%".$searchValue."%' or 
			
			DEPARTMENT like '%".$searchValue."%' or 
			COMPANY_NAME like'%".$searchValue."%'
			 ) ";
		}
		/* if($searchuser_status != ''){
			$search_arr[] = " USER_STATUS='".$searchuser_status."' ";
		} */
		if($search_department != ''){
			$search_arr[] = " DEPARTMENT='".$search_department."' ";
		}
		if($searchcompany_name != ''){
			$search_arr[] = " COMPANY_NAME=  '".$searchcompany_name."' ";
		}
		/* if($search_job_position != ''){
			$search_arr[] = " JOB_POSITION = '".$search_job_position."' ";
		} */
		if($searchname != ''){
			$search_arr[] = " NAME like '%".$searchname."%' ";
		}
		if(count($search_arr) > 0){
			$searchQuery = implode(" and ",$search_arr);
		}
		
		/* echo print_r($searchQuery); */
		## Total number of records without filtering
		$this->db->select('count(*) as allcount');
		$records = $this->db->get('USER_INFO')->result();
		$totalRecords = $records[0]->allcount;
		
		## Total number of record with filtering
		$this->db->select('count(*) as allcount');
		if($searchQuery != '')
		$this->db->where($searchQuery);
		$records = $this->db->get('USER_INFO')->result();
		$totalRecordwithFilter = $records[0]->allcount;
		/* echo print_r($records); */
		## Fetch records
		$this->db->select('*');
		if($searchQuery != '')
		$this->db->where($searchQuery);
		$this->db->order_by($columnName, $columnSortOrder);
		$this->db->limit($rowperpage, $start);
		$records = $this->db->get('USER_INFO')->result();
		
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
	}

	function insert_add_hr_approve($emp_id,$user_name,$user_surname){
		$datenow=date("Y-m-d h:i:s");
		$sql="INSERT  INTO  HUMANE_RESOURCES_TYPE (HUMANE_RESOURCES_EMP_ID,HUMANE_RESOURCES_NAME,HUMANE_RESOURCES_SURNAME,DATE_TIME_ADD,IS_APPROVE)  VALUES ('$emp_id','$user_name','$user_surname','$datenow','1') ";
		$query =$this->db->query($sql);

	}


}



  
