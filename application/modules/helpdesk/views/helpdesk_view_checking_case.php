
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>View Helpdesk Data Status checking </title>
</head>
<?php 
echo $helpdesk_s_id;
$emp_id_session =$this->session->userdata("EMP_ID");


$sql="SELECT HELPDESK_S_ID,HELPDESK_NAME,HELPDESK_SURNAME,HELPDESK_EMP_ID_INFORMANT,HELPDESK_COMPANY_INFORMANT,HELPDESK_PHONE,HELPDESK_DEPARTMENT_RECIPIENT,HELPDESK_COMPANY_RECIPIENT,HELPDESK_SUPJECK,HELPDESK_DETAILS,HELPDESK_TYPE_ID,HELPDESK_TYPE_SYSTEMS_ID,HELPDESK_USER_GET_A_JOB_NAME,HELPDESK_USER_GET_A_JOB_SURNAME,HELPDESK_CASE_STATUS_CANCLE,HELPDESK_CASE_STATUS_REQUEST_SENT,HELPDESK_CASE_STATUS_IS_PROGRESS,HELPDESK_CASE_STATUS_FORWARD,HELPDESK_CASE_STATUS_FINISHED,HELPDESK_CASE_DATE_TO_SEND,HELPDESK_CASE_FORWARD_TO FROM HELPDESK_CASE WHERE HELPDESK_S_ID = '$helpdesk_s_id' AND HELPDESK_IS_APPROVE = '1'";
$query = $this->db->query($sql)->row();

      $helpdesk_s_id= @$query->HELPDESK_S_ID;
      $helpdesk_name= @$query->HELPDESK_NAME;
      $helpdesk_surname= @$query->HELPDESK_SURNAME;
      $helpdesk_emp_id_informant= @$query-> HELPDESK_EMP_ID_INFORMANT;
      $helpdesk_company_informant= @$query->HELPDESK_COMPANY_INFORMANT;
      $helpdesk_phone= @$query->HELPDESK_PHONE;
      $helpdesk_department_recipient= @$query->HELPDESK_DEPARTMENT_RECIPIENT;
      $helpdesk_company_recipient= @$query->HELPDESK_COMPANY_RECIPIENT;
      $helpdesk_supjeck= @$query->HELPDESK_SUPJECK;
      $helpdesk_details= @$query->HELPDESK_DETAILS;
      $helpdesk_type_id= @$query->HELPDESK_TYPE_ID;
      $helpdesk_type_systems_id= @$query->HELPDESK_TYPE_SYSTEMS_ID;
      $helpdesk_user_get_a_job_name= @$query->HELPDESK_USER_GET_A_JOB_NAME;
      $helpdesk_user_get_a_job_surname= @$query->HELPDESK_USER_GET_A_JOB_SURNAME;
      $helpdesk_case_status_cancle= @$query->HELPDESK_CASE_STATUS_CANCLE;
      $helpdesk_case_status_request_sent= @$query->HELPDESK_CASE_STATUS_REQUEST_SENT;
      $helpdesk_case_status_is_progress= @$query->HELPDESK_CASE_STATUS_IS_PROGRESS;
      $helpdesk_case_status_forward= @$query->HELPDESK_CASE_STATUS_FORWARD;
      $helpdesk_case_status_finished= @$query->HELPDESK_CASE_STATUS_FINISHED;
      
      $helpdesk_case_date_to_send= @$query->HELPDESK_CASE_DATE_TO_SEND;
      $helpdesk_case_forward_to =@$query->HELPDESK_CASE_FORWARD_TO;


        
        

        /* $user_job_start_date2 =date("d-m-Y", strtotime($user_job_start_date));
        $user_end_probatio2 =date("d-m-Y", strtotime($user_end_probatio));
        $user_birthday2=date("d-m-Y", strtotime($user_birthday)); */
        
       
?>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">ตรวจสอบข้อมูลใบงาน</h1>
          </div><!-- /.col -->
         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">ใบงาน </h4>
                
                  
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12 ">
                  <center> 
                   
                  
					  <div class=" card text-white border-dark col-md-12">
                    
                   
                                
                        <div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title" >ข้อมูลผู้สร้างใบงาน</h3>
                                
                                <div class="card-tools">
                                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                  </button>
                                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                  </button>
                                </div>
                            </div>
                          <div class="card-body p-0">
                            
                            <div align="center">
                    <form  method="post" enctype="multipart/form-data" >
                            <div class="row">
                            
                                
                              



                                <!--  -->
                                <div class="col-sm-2">
                                  <!-- text input -->
                                  <div class="form-group">
                                    <label>รหัสพนักงาน</label>
                                    <input type="text" class="form-control" id="form_emp_set1" name="form_emp_set1" style="text-align:center;" value="<?php echo $helpdesk_emp_id_informant; ?>"disabled>
                                    
                                  </div>
                                </div>
                                
                                <!--  -->
                                <div class="col-sm-2">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>ชื่อ</label>
                                    <input type="text" class="form-control" name="form_name_set1" id="form_name_set1" style="text-align:center;"  value="<?php echo $helpdesk_name; ?>"disabled>
                                  
                                  </div>
                                </div>



                                <!--  -->
                                <div class="col-sm-2">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>นามสกุล</label>
                                    <input type="text" class="form-control" name="form_surname_set1" id="form_surname_set1" style="text-align:center;"  value="<?php echo $helpdesk_surname; ?>"disabled>
                                    
                                  </div>
                                </div>

                                        <!--  -->
                                <div class="col-sm-2">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>ฝ่าย</label>
                                    
                                    <input type="text" name="form_department_type_set1" id="form_department_type_set1" class="form-control" value="<?php echo $helpdesk_department_recipient; ?>"disabled>
                                  </div>
                                </div>

                                
                               
                                        <!--  -->
                                <div class="col-sm-2">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>สังกัด</label>
                                    
                                    <input type="text" name="form_company_set1" id="form_company_set1" class="form-control" value="<?php 
                                    $sqlcom = "SELECT COMPANY_ID,COMPANY_NAME FROM COMPANY_CATEGORY WHERE COMPANY_ID ='$helpdesk_company_recipient' AND IS_APPROVE='1'";
                                    $querycom = $this->db->query($sqlcom)->row();
                                    $companyname= @$querycom->COMPANY_NAME;
                                    echo $companyname;
                                    ?>"disabled>
                                  
                                </select>
                                  </div>
                                </div>

                                        <!--  -->
                                <div class="col-sm-2">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>เบอร์โทร</label>
                                    <input type="text" name="form_phone_set1" id= "form_phone_set1" class="form-control" value="<?php echo $helpdesk_phone; ?>"disabled>
                                    
                                  </div>
                                </div>
                                
                                
       
                    </div>
							  
              </div>
              </div>
              </div>
              <?php //เปิดแท็ปใหม่  ?>            
							<div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title" >ส่งใบงานไปที่แผนก</h3>
                                
                                <div class="card-tools">
                                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                  </button>
                                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                  </button>
                                </div>
                            </div>
                          <div class="card-body p-0">
                            <div align="center">
                            <div class="row">
                            

                                        <!--  -->
                                <div class="col-sm-2">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>ฝ่าย</label>
                                    <input type="text" name="form_department_type_set2" id="form_department_type_set2" class="form-control" value="<?php echo $helpdesk_department_recipient; ?>"disabled>
                                    
                                  </div>
                                </div>

                                
                               
                                        <!--  -->
                                <div class="col-sm-2.5">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>สังกัด</label>
                                    <input type="text" name="form_company_set2" id="form_company_set2" class="form-control" value="<?php 
                                    $sqlcom = "SELECT COMPANY_ID,COMPANY_NAME FROM COMPANY_CATEGORY WHERE COMPANY_ID ='$helpdesk_company_recipient' AND IS_APPROVE='1'";
                                    $querycom = $this->db->query($sqlcom)->row();
                                    $companyname= @$querycom->COMPANY_NAME;
                                    echo $companyname;
                                    ?>"disabled>
                                    
                                    
                                    
                                  </div>
                                </div>


                                 <!--  -->
                                 <div class="col-sm-3">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>ผู้รับเคส</label>
                                    <input type="text" name="form_company_set2" id="form_company_set2" class="form-control" value="<?php echo $helpdesk_user_get_a_job_name.' '.$helpdesk_user_get_a_job_surname ; ?>"disabled>
                                    
                                    
                                    
                                  </div>
                                </div>

                                

                                       
                                

              
                    </div>
							  
              </div>
              </div> 
              </div> 
              <?php //เปิดแท็ปใหม่  ?>  
              <div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title" >รายละเอียดใบงาน</h3>
                                
                                <div class="card-tools">
                                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                  </button>
                                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                  </button>
                                </div>
                            </div>
                          <div class="card-body p-0">
                            <div align="center">
                            <div class="row">


                            
                                        <!--  -->
                                        <div class="col-sm-2">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>รหัสเคส</label>
                                    <input type="text" name="from_helpdesk_type_set3" id="from_helpdesk_type_set3" class="form-control" value="<?php echo $helpdesk_s_id ; ?>">
                                  
                                  </div>
                                </div>
                            

                                        <!--  -->
                                <div class="col-sm-2">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>ประเภท</label>
                                    <input type="text" name="from_helpdesk_type_set3" id="from_helpdesk_type_set3" class="form-control" value="<?php 
                                    $sqlhelpdesktype = "SELECT HELPDESK_TYPE_ID,HELPDESK_TYPE_NAME FROM HELPDESK_TYPE_CASE WHERE HELPDESK_TYPE_ID ='$helpdesk_type_id  ' AND HELPDESK_TYPE_IS_APPROVE='1'";
                                    $queryhelpdesktype = $this->db->query($sqlhelpdesktype)->row();
                                    $helpdesktype= @$queryhelpdesktype->HELPDESK_TYPE_NAME;
                                    echo $helpdesktype;
                                    ?>
                                    
                                    ">
                                  
                                  </div>
                                </div>

                                
                               
                                        <!--  -->
                                <div class="col-sm-2" id="from_helpdesk_systems_type_set3">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>ระบบ</label>
                                    <input type="text" name="from_helpdesk_systems_type_set32" id="from_helpdesk_systems_type_set32" class="form-control" value="<?php 
                                    $sqlhelpdesksystemstype = "SELECT HELPDESK_SYSTEMS_TYPE_ID,HELPDESK_SYSTEMS_TYPE_NAME FROM HELPDESK_SYSTEMS_TYPE WHERE HELPDESK_SYSTEMS_TYPE_ID ='$helpdesk_type_systems_id  ' AND HELPDESK_SYSTEMS_TYPE_IS_APPROVE='1'";
                                    $queryhelpdesksystemstype = $this->db->query($sqlhelpdesksystemstype)->row();
                                    $helpdesksystemstype= @$queryhelpdesksystemstype->HELPDESK_SYSTEMS_TYPE_NAME;
                                    echo $helpdesksystemstype;
                                    ?>
                                    
                                    <?php echo $helpdesk_type_systems_id ; ?>">
                                   
                                  </div>
                                </div>

                                <div class="col-sm-3">
                                    <!-- textarea -->
                                    <div class="form-group">
                                      <label>หัวข้อ</label>
                                      <input type="text" name="form_supjeck_set3" id="form_supjeck_set3" class="form-control" value="<?php echo $helpdesk_supjeck ; ?>">
                                    </div>
                                </div>



                                <div class="col-sm-5">
                                    <!-- textarea -->
                                    <div class="form-group">
                                      <label>ระบุคำถาม/ระบุปัญหาโดยละเอียด</label>
                                      <textarea class="form-control" id="form_text_qa" name="form_text_qa" rows="3" disabled><?php echo $helpdesk_details; ?></textarea>
                                    </div>
                                </div>

                                       
                                <!--  -->
                                <div class="col-sm-2" >
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>สถานะของใบงาน</label>
                                    
                                    <?php if($helpdesk_case_status_request_sent == "1" AND $helpdesk_case_status_is_progress == 0 )  { ?>
                                        <input type="text"  class="form-control is-valid" value="ส่งข้อมูลใบงานแล้ว">
                                    <?php  } elseif($helpdesk_case_status_request_sent == "1" AND $helpdesk_case_status_is_progress == "1" AND $helpdesk_case_status_forward == 0 AND $helpdesk_case_status_finished == 0)  { ?>
                                        <input type="text"  class="form-control is-warning" value="กำลังดำเนินการ...">
                                    <?php  } elseif($helpdesk_case_status_request_sent == "1" AND $helpdesk_case_status_is_progress == "1" AND $helpdesk_case_status_forward == "1")  { ?>
                                        <input type="text"  class="form-control is-warning" value="มีการส่งเรื่องต่อ"> 
                                    <?php  } elseif($helpdesk_case_status_request_sent == "1" AND $helpdesk_case_status_is_progress == "1" AND $helpdesk_case_status_forward == "1" AND $helpdesk_case_status_finished == "1")  { ?>
                                        <input type="text"  class="form-control is-valid" value="เสร็จสิ้น">
                                    <?php  } elseif($helpdesk_case_status_request_sent == "1" AND $helpdesk_case_status_is_progress == "1" AND $helpdesk_case_status_finished == "1" ) { ?>
                                        <input type="text"  class="form-control is-valid" value="เสร็จสิ้น">
                                    <?php  } elseif($helpdesk_case_status_cancle == "1" )  { ?>
                                          <input type="text"  class="form-control is-invalid" value="ใบงานถูกยกเลิก">
                                    <?php  } else echo "เกิดความผิดพลาด"; ?>

                                    
                                  </div>
                                </div>
                                <?php if($helpdesk_case_forward_to != null AND $helpdesk_case_status_request_sent == "1" AND $helpdesk_case_status_is_progress == "1" AND $helpdesk_case_status_forward == 0){ ?>

                                
                                  <div class="col-sm-3" name="openfoward1" id="openfoward1">
                                      <!-- textarea -->
                                      <div class="form-group">
                                        <label>ส่งเรื่องไปที่</label>
                                        <input type="text" name="form_case_forward_to" id="form_case_forward_to" class="form-control" style="text-align:center;"  value="<?php echo $helpdesk_case_forward_to ; ?>">
                                      </div>
                                  </div>
                                  <?php } elseif($helpdesk_case_forward_to != null AND $helpdesk_case_status_request_sent == "1" AND $helpdesk_case_status_is_progress == "1" AND $helpdesk_case_status_forward == 0 AND $helpdesk_case_status_finished == 0){ ?>
                                    <div class="col-sm-3" name="openfoward1" id="openfoward1">
                                      <!-- textarea -->
                                      <div class="form-group">
                                        <label>ส่งเรื่อง</label>
                                        <input type="text"   class="form-control" style="text-align:center;"  value="<?php echo $helpdesk_case_forward_to ; ?>">
                                      </div>
                                  </div>
                                  <?php } elseif($helpdesk_case_forward_to != null AND $helpdesk_case_status_request_sent == "1" AND $helpdesk_case_status_is_progress == "1" AND $helpdesk_case_status_forward == "1" AND $helpdesk_case_status_finished == 0){ ?>
                                    <div class="col-sm-3" name="openfoward1" id="openfoward1">
                                      <!-- textarea -->
                                      <div class="form-group">
                                        <label>ส่งเรื่อง</label>
                                        <input type="text"   class="form-control" style="text-align:center;"  value="<?php echo $helpdesk_case_forward_to ; ?>">
                                      </div>
                                  </div>
                                  <?php  } ?>




              
                    </div>
							  
              </div>
              </div> 
              </div> 
              <?php //เปิดแท็ปใหม่  ?> 
              
              

                                
                        </form><BR>
                        <BR>
                        <BR>
                        
                            <div class="row">
                              
                                  <!--  -->
                              <div class="col-sm-12">
                                <!-- text input -->
                                  <div class="form-group">
                                  <button type="button" class="btn btn-block btn-danger"onclick="window.history.go(-1); return false;" >ย้อนกลับ</button>
                                  
                                  </div>
                                </div>
                                <!--  -->

                                
                                
                            </div>
                 
                   
                        </div></center>
                        </div>
                  </div>
                  
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
              
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        
              

           
        </ul>
              </div>
              <!-- /.card-body -->
              
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  

  
</body>

</html>
  