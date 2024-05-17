
<?php
// load excel library
$this->load->library('Excel');
/* session_start(); */
/* require_once APPPATH."/third_party/PHPExcel.php"; */
/* ini_set("memory_limit", "-1");
set_time_limit(0); */
// We'll be outputting an excel file
/* header('Content-type: application/vnd.ms-excel'); */

// It will be called file.xls
/* header('Content-Disposition: attachment; filename="data_eleave_user_' . date("YmdHis") . '.xlsx"'); */
/* include ('assets/excel/PHPExcel.php'); */

$objPHPExcel = new PHPExcel();
$objPHPExcel->createSheet(0);
$objPHPExcel->setActiveSheetIndex(0);
$activeSheet = $objPHPExcel->getActiveSheet();
$activeSheet->setTitle('สรุป');





// column width
$activeSheet->getColumnDimension('A')->setWidth(20);
$activeSheet->getColumnDimension('B')->setWidth(10);
$activeSheet->getColumnDimension('C')->setWidth(15);
$activeSheet->getColumnDimension('D')->setWidth(15);
$activeSheet->getColumnDimension('E')->setWidth(15);
$activeSheet->getColumnDimension('F')->setWidth(15);
$activeSheet->getColumnDimension('G')->setWidth(15);
$activeSheet->getColumnDimension('H')->setWidth(15);
$activeSheet->getColumnDimension('I')->setWidth(15);


//ตัวหนา
$objPHPExcel->getActiveSheet()->getStyle("A1")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("B1")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("C1")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("D1")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("E1")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("F1")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("G1")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("H1")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("I1")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("J1")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("K1")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("L1")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("M1")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("N1")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("O1")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("P1")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("Q1")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("R1")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("S1")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("T1")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("U1")->getFont()->setBold(true);

//ชื่อคอลัมน์
$activeSheet->SetCellValue('A1', "รหัสของการลา");
$activeSheet->SetCellValue('B1', "ประเภทการลา");
$activeSheet->SetCellValue('C1', "ชื่อ");
$activeSheet->SetCellValue('D1', "นามสกุล");
$activeSheet->SetCellValue('E1', "บริษัท");
$activeSheet->SetCellValue('F1', "ฝ่าย");
$activeSheet->SetCellValue('G1', "ตำแหน่ง");
$activeSheet->SetCellValue('H1', "เบอร์โทร");
$activeSheet->SetCellValue('I1', "วันที่เริ่มลางาน");
$activeSheet->SetCellValue('J1', "วันที่สิ้นสุดการลางาน");
$activeSheet->SetCellValue('K1', "ช่วงเวลา");
$activeSheet->SetCellValue('L1', "เวลาเริ่มลางาน");
$activeSheet->SetCellValue('M1', "เวลาสิ้นสุดการลางาน");
$activeSheet->SetCellValue('N1', "จำนวนวันลางาน");
$activeSheet->SetCellValue('O1', "ที่อยู่ที่ติดต่อได้");
$activeSheet->SetCellValue('P1', "สาเหตุของการลา");
$activeSheet->SetCellValue('Q1', "วันที่ส่งคำขอการลา");
$activeSheet->SetCellValue('R1', "วันที่สิ้นสุดกระบวนการ");
$activeSheet->SetCellValue('S1', "สถานะของคำขอการลางาน");



$emp_id =$this->session->userdata("EMP_ID");
$search_arr = array();
/* $con = "";
$con2 = "";
$con3 = "";
$con4 = "";
$con5 = "";
$con6 = ""; */
/* if($searchValue != ''){
    $search_arr[] = " (ELEAVE_NAME like '%".$name."%' or 
    ELEAVE_TYPE_ID like '%".$eleave_type."%' or 
    ELEAVE_COMPANY_NAME like'%".$company_name."%'  or
    ELEAVE_DATE_START like'%".$date_start."%' or
    ELEAVE_DATE_END like'%".$date_end."%'or
    ELEAVE_STATUS like'%".$eleave_status."%' or
    ELEAVE_EMP_ID like'%".$emp_id."%'
    ) ";
} */
/*  echo "<pre>";
echo print_r($date_start);
echo "</pre>";  */
/* echo "<pre>";
echo $date_start;
echo "</pre>"; */
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


/* echo print_r($searchQuery); */


$sql = "SELECT ELEAVE_ID,ELEAVE_EMP_ID,ELEAVE_TYPE_NAME,ELEAVE_NAME,ELEAVE_SURNAME,ELEAVE_EMAIL,ELEAVE_COMPANY_NAME,ELEAVE_DEPARTMENT,ELEAVE_JOB_POSITION,ELEAVE_PHONE,ELEAVE_DATE_START,ELEAVE_DATE_END,ELEAVE_RANGE_TIME,ELEAVE_RANGE_TIME_NAME,ELEAVE_TIME_START,ELEAVE_TIME_END,ELEAVE_NUMBER,ELEAVE_ADDRESS_ELEAVE,ELEAVE_CAUSE,ELEAVE_DATE_SEND_DATA,ELEAVE_DATE_END_COMPLETE,ELEAVE_STATUS FROM ELEAVE WHERE $searchQuery";
$data_list = $this->db->query($sql)->result();
$row = 2;
$i = 1;
foreach ($data_list as $rw) {
    $eleave_id = $rw->ELEAVE_ID;
    $eleave_emp_id = $rw->ELEAVE_EMP_ID;
    $eleave_type_name = $rw->ELEAVE_TYPE_NAME;
    $eleave_name = $rw->ELEAVE_NAME;
    $eleave_surname = $rw->ELEAVE_SURNAME;
    $eleave_email = $rw->ELEAVE_EMAIL;
    $eleave_company_name = $rw->ELEAVE_COMPANY_NAME;
    $eleave_department = $rw->ELEAVE_DEPARTMENT;
    $eleave_job_position = $rw->ELEAVE_JOB_POSITION;
    $eleave_phone = $rw->ELEAVE_PHONE;
    $eleave_date_start = $rw->ELEAVE_DATE_START;
    $eleave_date_end = $rw->ELEAVE_DATE_END;
    $eleave_range_time = $rw->ELEAVE_RANGE_TIME;
    $eleave_range_time_name = $rw->ELEAVE_RANGE_TIME_NAME;
    $eleave_time_start = $rw->ELEAVE_TIME_START;
    $eleave_time_end = $rw->ELEAVE_TIME_END;
    $eleave_number = $rw->ELEAVE_NUMBER;
    $eleave_address = $rw->ELEAVE_ADDRESS_ELEAVE;
    $eleave_cause = $rw->ELEAVE_CAUSE;
    $eleave_date_send_data = $rw->ELEAVE_DATE_SEND_DATA;
    $eleave_date_end_complete = $rw->ELEAVE_DATE_END_COMPLETE;
    $eleave_status = $rw->ELEAVE_STATUS;
    ///
$activeSheet->SetCellValue('A' . $row, '' . $eleave_id . '');
$activeSheet->SetCellValue('B' . $row, '' . $eleave_type_name . '');
$activeSheet->SetCellValue('C' . $row, '' . $eleave_name . '');
$activeSheet->SetCellValue('D' . $row, '' . $eleave_surname . '');
$activeSheet->SetCellValue('E' . $row, '' . $eleave_company_name . '');
$activeSheet->SetCellValue('F' . $row, '' . $eleave_department . '');
$activeSheet->SetCellValue('G' . $row, '' . $eleave_job_position . '');
$activeSheet->SetCellValue('H' . $row, '' . $eleave_phone . '');
$activeSheet->SetCellValue('I' . $row, '' . $eleave_date_start . '');
$activeSheet->SetCellValue('J' . $row, '' . $eleave_date_end . '');
$activeSheet->SetCellValue('K' . $row, '' . $eleave_range_time_name . '');
$activeSheet->SetCellValue('L' . $row, '' . $eleave_time_start . '');
$activeSheet->SetCellValue('M' . $row, '' . $eleave_time_end . '');
$activeSheet->SetCellValue('N' . $row, '' . $eleave_number . '');
$activeSheet->SetCellValue('O' . $row, '' . $eleave_address . '');
$activeSheet->SetCellValue('P' . $row, '' . $eleave_cause . '');
$activeSheet->SetCellValue('Q' . $row, '' . $eleave_date_send_data . '');
$activeSheet->SetCellValue('R' . $row, '' . $eleave_date_end_complete . '');
$activeSheet->SetCellValue('S' . $row, '' . $eleave_status . '');



$row++;
	
}




/* $filename = 'export/excel/data_eleave_user_' . date("YmdHis") . '.xlsx'; */


/* header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="data_eleave_user_' . date("YmdHis") . '.xlsx"');

header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
header('Cache-Control: cache, must-revalidate');
header('Pragma: public'); */
/* $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->setPreCalculateFormulas(false); */
/* $objWriter->save('php://output'); */



/* header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"'); */

/* $objWriter->save($filename);

dl_export("$filename");
 */

/* $objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->removeSheetByIndex(1); */

/* header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="data_eleave_user_' . date("YmdHis") . '.xlsx"'); */

/* header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); */
/* header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); */
/* header('Cache-Control: cache, must-revalidate'); */
/* header('Pragma: public');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output'); */

/* header('Content-type: application/vnd.ms-excel'); */


 header('Content-Disposition: attachment; filename="data_eleave_user_' . date("YmdHis") . '.xlsx"');

header('Content-Type: application/vnd.ms-excel'); 

header('Cache-Control: max-age=0');

 $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

 $objWriter->save('php://output');
exit ;
?>
