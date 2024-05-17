<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
require_once "assets/excel/PHPExcel/IOFactory.php";

$objPHPExcel = PHPExcel_IOFactory::load("$attach_file");

$arrItem = array();
$objWorksheet = $objPHPExcel->getActiveSheet();

$i = 0;

// ดึงเอาข้อมูลลงใน array
foreach ($objWorksheet->getRowIterator() as $row) {
	$cellIterator = $row->getCellIterator();
	$cellIterator->setIterateOnlyExistingCells(false);

	foreach ($cellIterator as $cell) {
		if ($i >= 1) {
			$arrItem[$i][] = trim($cell->getValue());
		}
	}

	$i++;
}


	
foreach ($arrItem as $key => $val) {
	$emp_id= @$val[0];
	 $username= ""; 
	  $password= "";
	$first_name= @$val[1];
	$last_name= @$val[2];
	$birthday= @convertSerialDateNoTime(@$val[3]);
	$gender= @$val[4];
	$email= @$val[5];
	$department= @$val[6];
	$job_position= @$val[7];
	$company_id= "";
	$company_name= @$val[8];
	 $user_level= ""; 
	 $user_active= ""; 
	 $image_profile= ""; 
	 $password_emergency= ""; 
	$phone= @$val[10];
	$address= @$val[11];///
	$manager_approve= @$val[12];
	$humane_resoures_approve= @$val[13];
	$job_start_date= @convertSerialDateNoTime(@$val[14]);
	$end_probatio=@convertSerialDateNoTime(@$val[15]);
	$is_approve= @$val[16];

	
///เงื่อนไข และ การเก็บข้อมูลเข้า DB
	
if($company_name=="Benz Talingchan Co., Ltd."){
	$company_id ='1';
	$password = "Taling1234";
	$is_approve ="1";
	$user_active ="1";
	$user_level ="1";
	$password_emergency ="Wyteb0ard";
	
	if($gender =="Male"){
		$image_profile="avatar-men.jpg";
	}else $image_profile="avatar-woman.png";
}
elseif($company_name=="ATTA Autohaus Co., Ltd."){
	$company_id ='2';
	$password = "Atta1234";
	$is_approve ="1";
	$user_active="1";
	$user_level="1";
	$password_emergency ="Wyteb0ard";
	$image_profile="";
	if($gender =="Male"){
		$image_profile="avatar-men.jpg";
	}else $image_profile="avatar-woman.png";
}


		
		
	if (!empty($emp_id)) {
		$arrList[] = "('" . $emp_id . "','" . $password . "', '" . $first_name . "', '" . $last_name . "', '" . $birthday . "',
		'" . $gender . "',  '" . $email . "', '" . $department . "', '" . $job_position . "', '" . $company_id . "', 
		'" . $company_name . "', '" . $user_level . "', '" . $user_active . "','" . $image_profile . "','" . $password_emergency . "',
		'" . $phone . "','" . $address . "','" . $manager_approve . "','" . $humane_resoures_approve . "','" . $job_start_date . "',
		'" . $end_probatio . "','" . $is_approve . "')";
	}
	
}



$arrItem = @array_chunk($arrList, 4000);

for ($i = 0; $i < count($arrItem); $i++) {
	$this->db->reconnect();
	
	$data_insert = @implode(",", $arrItem[$i]);

	$sql = "INSERT INTO USER_INFO (EMP_ID,PASSWORD,NAME,SURNAME,
	USER_BIRTHDAY,USER_GENDER,EMAIL,DEPARTMENT,JOB_POSITION,COMPANY_ID,
	COMPANY_NAME,USER_LEVEL,USER_ACTIVE,IMAGE_PROFILE,PASSWORD_EMERGENCY,
	PHONE,CONTACT_ADDRESS,MANAGER_APPROVE,HUMANE_RESOURCES_APPROVE,JOB_START_DATE,
	END_PROBATIO,IS_APPROVE) VALUES $data_insert";
	echo $sql;
	$this->db->query($sql);
	$this->db->close();
 	$this->db->initialize();

}


echo "- end -";

echo "<script>alert('เพิ่มข้อมูลทั้งหมดสำเร็จ');</script>";
 echo "<script> window.location.href='import_user_all' </script>"; 
?>