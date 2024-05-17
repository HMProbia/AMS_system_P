<?php
class RegistersModel extends CI_Model {

	function __construct() {
		parent::__construct();
		/* $this->load->library('session'); */
	}


    function insert_data_register_frist($first_name,$last_name,$emp_id,$password_emergency,$birthday,$gender,$email,$phone,$job_start_date,$end_probatio
	,$address,$department,$job_position,$company,$manager_approve,$humane_resoures_approve) {  
	 	 
	   
		/* $first_name //เช็คชื่อ
	   $last_name // เช็คนามสกุล
	   $emp_id //เช็ครหัสพนักงาน
	   $password_emergency
	   $birthday
	   $gender
	   $email //เช็คเมล
	   $phone  //เช็คเบอร์
	   $job_start_date
	   $end_probatio
	   $address
	   $department
	   $job_position
	   $company
	   $manager_approve
	   $humane_resoures_approve  */

		   //วนข้อมูลพนักงานเพื่อตรวจสอบว่ามีข้อมูลอะไรซ้ำกัน
		   $sql1="SELECT NAME,SURNAME,EMP_ID,EMAIL,PHONE FROM USER_INFO WHERE IS_APPROVE = '1'";
		   $query1=$this->db->query($sql1)->result();
		   foreach($query1 as $row){
			   $name_in_db  = $row->NAME;
			   $surname_in_db = $row->SURNAME;
			   $emp_id_in_db = $row->EMP_ID;
			   $mail_in_db = $row->EMAIL;
			   $phone_in_db =$row->PHONE;
			   
		   
		   }

		   if($first_name ==  $name_in_db AND  $last_name ==$last_name ){
			echo "<script>alert('นำข้อมูลเข้าไม่สำเร็จเนื่องจาก ชื่อ-นามสกุลซ้ำกัน');</script>";
			echo "<script> window.location.href='register' </script>";
		}if($emp_id_in_db == $emp_id){
			echo "<script>alert('นำข้อมูลเข้าไม่สำเร็จเนื่องจาก รหัสพนักงานซ้ำกัน');</script>";
			echo "<script> window.location.href='register' </script>";
		}if($mail_in_db== $email){
			echo "<script>alert('นำข้อมูลเข้าไม่สำเร็จเนื่องจาก Emailซ้ำกัน');</script>";
			echo "<script> window.location.href='register' </script>";
		}if($phone_in_db ==$phone){
			echo "<script>alert('นำข้อมูลเข้าไม่สำเร็จเนื่องจาก เบอร์โทรศัพท์ซ้ำกัน');</script>";
			echo "<script> window.location.href='register' </script>";
		}

	   if($company =='1'){
		   $company_name="Benz Talingchan Co., Ltd.";
		   $password = "Taling1234";
		   $is_approve ="1";
		   $user_active ="1";
	   }
	   elseif($company =='2'){
		   $company_name="ATTA Autohaus Co., Ltd.";
		   $password = "Atta1234";
		   $is_approve ="1";
		   $user_active="1";
	   }
	    
	   
		$job_start_date=date("Y-m-d", strtotime($job_start_date)); 
		$end_probatio=date("Y-m-d", strtotime($end_probatio)); 
		$birthday = date("Y-m-d", strtotime($birthday));


		

	   /* $birthday1= date_format($birthday,"Y-m-d "); */
	   
	   //   start insert data user_info
	   $sql ="INSERT INTO USER_INFO (EMP_ID, PASSWORD, NAME,SURNAME,USER_BIRTHDAY,USER_GENDER,EMAIL,DEPARTMENT,JOB_POSITION,COMPANY_ID,COMPANY_NAME,USER_ACTIVE,PASSWORD_EMERGENCY,PHONE,CONTACT_ADDRESS,MANAGER_APPROVE,HUMANE_RESOURCES_APPOVE,JOB_START_DATE,END_PROBATIO,IS_APPROVE)
	   VALUES ('$emp_id ','$password','$first_name','$last_name ','$birthday','$gender','$email',
	   '$department','$job_position','$company','$company_name','$user_active','$password_emergency','$phone','$address','$manager_approve','$humane_resoures_approve','$job_start_date','$end_probatio','$is_approve')";
	   $query = $this->db->query($sql);

	   echo "<script>alert('ลงทะเบียนสำเร็จ');</script>";
	   /* echo "<script> window.location='account/account_add_data_emp' </script>"; */
	   echo "<script> window.location.pathname ='/ams.attaautohaus.com/index.php/account/account_add_data_emp' </script>";
	}

	//set default time
	/* function set_number_eleave_frist($emp_id,$day,$hour,$minute){
		
	} */

   







}








  
