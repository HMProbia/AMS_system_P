
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ตรวจสอบข้อมูลเพื่อลบข้อมูลการลา</title>
</head>
<?php 
$user_id_session = $this->session->userdata("USER_ID");
$emp_id_session =$this->session->userdata("EMP_ID");


$sql="SELECT *FROM USER_INFO WHERE USER_ID='$user_id_session' AND EMP_ID='$emp_id_session' ";
$query = $this->db->query($sql)->row();
        $user_id= @$query->USER_ID;
        $user_emp_id  = @$query->EMP_ID;
        $user_name = @$query->NAME;
				$user_surname= @$query->SURNAME;
        $user_image_profile= @$query->IMAGE_PROFILE;
        $user_level =@$query-> USER_LEVEL;
        $user_birthday=@$query-> USER_BIRTHDAY;
        $user_gender =@$query-> USER_GENDER;
        $user_email=@$query-> EMAIL;
        $user_department=@$query-> DEPARTMENT;
        $user_job_prosition=@$query-> JOB_POSITION;
        $user_company_name=@$query-> COMPANY_NAME;
        $user_phone=@$query-> PHONE;
        $user_contact_address=@$query-> CONTACT_ADDRESS;
        $user_manager_approve=@$query-> MANAGER_APPROVE;
        $user_humane_resources_approve =@$query-> HUMANE_RESOURCES_APPOVE;
        $user_job_start_date=@$query-> JOB_START_DATE;
        $user_end_probatio=@$query->END_PROBATIO;

        $user_job_start_date2 =date("d-m-Y", strtotime($user_job_start_date));
        $user_end_probatio2 =date("d-m-Y", strtotime($user_end_probatio));
        $user_birthday2=date("d-m-Y", strtotime($user_birthday));
        
       
?>
<?php 



$sql2="SELECT *FROM ELEAVE WHERE ELEAVE_ID='$eleave_id'";
$query2 = $this->db->query($sql2)->row();
    $eleave_id= @$query2->ELEAVE_ID;
    $eleave_user_id= @$query2->ELEAVE_USER_ID;
    $eleave_emp_id= @$query2->ELEAVE_EMP_ID;
    $eleave_type_id= @$query2->ELEAVE_TYPE_ID;
    $eleave_type_name= @$query2->ELEAVE_TYPE_NAME;
    $eleave_name= @$query2-> ELEAVE_NAME;
    $eleave_surname= @$query2->ELEAVE_SURNAME;
    $eleave_mail= @$query2->ELEAVE_EMAIL;
    $eleave_company_name= @$query2->ELEAVE_COMPANY_NAME;
    $eleave_department= @$query2->ELEAVE_DEPARTMENT;
    $eleave_job_position= @$query2->ELEAVE_JOB_POSITION;
    $eleave_phone= @$query2->ELEAVE_PHONE;
    $eleave_date_start= @$query2->ELEAVE_DATE_START;
    $eleave_date_end= @$query2->ELEAVE_DATE_END;
    $eleave_range_time= @$query2->ELEAVE_RANGE_TIME;
    $eleave_range_time_name= @$query2->ELEAVE_RANGE_TIME_NAME;
    $eleave_time_start= @$query2->ELEAVE_TIME_START;
    $eleave_time_end= @$query2->ELEAVE_TIME_END;
    $eleave_number= @$query2->ELEAVE_NUMBER;
    $eleave_address_eleave= @$query2-> ELEAVE_ADDRESS_ELEAVE;
    $eleave_cause= @$query2->ELEAVE_CAUSE;
    $eleave_manager_approve_id_default= @$query2->ELEAVE_MANAGER_APPROVE_ID_DEFAILT;
    $eleave_humane_resources_id_default= @$query2->ELEAVE_HUMANE_RESOURCES_ID_DEFAULT;
    $eleave_date_send_data= @$query2->ELEAVE_DATE_SEND_DATA;
    $eleave_date_end_complete= @$query2->ELEAVE_DATE_END_COMPLETE;
    $eleave_status= @$query2->ELEAVE_STATUS;
    $eleave_name_file= @$query2->ELEAVE_NAME_FILE;


 

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
            <h1 class="m-0">Eleave Data</h1>
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
              <!-- <div class="card-header">
                <h4 class="card-title">ตรวจสอบข้อมูลเพื่อทำการลบข้อมูลการลา </h4>
                
                  
                </div> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12 ">
                  <center> 
                  <BR>  
                  
					  <div class=" card text-white border-dark col-md-10">
                    
                    <div align="center"><BR><BR>
                    <form action="<?=site_url('eleave/eleave_delete_status')?>" method="post" enctype="multipart/form-data" >
                        <img src="<?php echo base_url('upload/profile'); ?>/<?php echo $user_image_profile; ?>"  width="250" high="150" alt="User Avatar" class="  img-thumbnail"></div>
                      
                        <BR>
                        
                            <div class="row">
                            <!--  -->
                            <div class="col-sm-1">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>รหัสลา</label>
                                    <input type="text" id="form_eleave_id"name="form_eleave_id"class="form-control" value="<?php echo $eleave_id; ?>" readonly>
                                    
                                  </div>
                                </div>
                                          <!--  -->
                                



                                <!--  -->
                                <div class="col-sm-2">
                                  <!-- text input -->
                                  <div class="form-group">
                                    <label>รหัสพนักงาน</label>
                                    <input type="text" id="form_eleave_emp" class="form-control" name="form_emp" value="<?php echo $eleave_emp_id; ?>"readonly>
                                    
                                  </div>
                                </div>
                                
                                <!--  -->
                                <div class="col-sm-3">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>ชื่อ</label>
                                    <input type="text" id="form_eleave_name"class="form-control" name="form_name"value="<?php echo $eleave_name; ?>"readonly>
                                  
                                  </div>
                                </div>
                                


                                <!--  -->
                                <div class="col-sm-3">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>นามสกุล</label>
                                    <input type="text" id="form_eleave_surname"class="form-control" name="form_surname"value="<?php echo $eleave_surname; ?>"readonly>
                                    
                                  </div>
                                </div>


                                

                                     <!--  -->
                                     <div class="col-sm-3">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>สังกัด</label>
                                    <input type="text"  id="form_eleave_company_name"name="form_company_name"class="form-control" required value="<?php echo $eleave_company_name; ?> "readonly>
                                    
                                  </div>
                                </div>

                                
                               
                                       

                                 
                                <hr width="100%"   noshade="noshade" size="6" color="#FFFFFF"> <br><br>
                                       <!--  -->
                                       <div class="col-sm-12">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>ประเภทการลา</label>
                                    <input type="text" id="form_eleave_type" name="form_eleave_type"class="form-control" value="<?php echo $eleave_type_name; ?>"readonly>
                                    
                                  </div>
                                </div>


                                      <!--  -->
                                      <div class="col-sm-12">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>ช่วงเวลาที่ต้องการลา</label>
                                    <input type="text" id="form_eleave_range_time" name="form_range_time"class="form-control"value="<?php echo $eleave_range_time_name ; ?>"readonly>
                            
                                    
                                  </div>
                                </div>

                                
                                <!--  -->


                                        <!--  -->
                                        <div class="col-sm-6">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>วันที่เริ่มลา</label>
                                    <input type="date"id="form_eleave_date_start" name="form_date_start"class="form-control"value="<?php echo $eleave_date_start; ?>"readonly>
                                    
                                  </div>
                                </div>

                                    <!--  -->
                                    <div class="col-sm-6">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label id="lable_time_start">เวลาที่เริ่มลา</label>
                                    <input type="time" id="form_eleave_time_start" name="form_time_start"class="form-control"value="<?php echo $eleave_time_start; ?>"readonly>
                                    
                                  </div>
                                </div>



                                   
                                      

                                
                                <!--  -->
                                <div class="col-sm-6">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>วันที่จบการลา</label>
                                    <input type="date" id="form_eleave_date_end"  name="form_date_end"class="form-control"value="<?php echo $eleave_date_end ; ?>"readonly>
                                    
                                  </div>
                                </div>

                              

                                 <!--  -->
                                 <div class="col-sm-6">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label id="lable_time_end">เวลาที่จบการลา</label>
                                    <input type="time" id="form_eleave_time_end" name="form_time_end"class="form-control"value="<?php echo $eleave_time_end ; ?>"readonly>
                                    
                                  </div>
                                </div>


                                 <!--  -->
                                 <div class="col-sm-12">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>จำนวนวันที่ลา</label>
                                    <input type="text" id="form_eleave_number_time_eleave" name="form_number_time_eleave"class="form-control"value="<?php echo $eleave_number ; ?>"readonly>
                                    <p id="number"></p>
                                  </div>
                                </div>
                                            <!--  -->
                                    <div class="col-sm-12">
                                      <div class="form-group">
                                          <label>สาเหตุที่ลา</label>
                                              <textarea id="form_eleave_cause" name="form_cause" class="form-control" rows="3"placeholder="กรุณากรอกเหตุผลที่ลา"readonly><?php echo $eleave_cause ; ?></textarea>
                                      </div>
                                    </div>

                                        <!--  -->
                                <div class="col-sm-12">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>ที่อยู่ที่สามารถติดต่อได้</label>
                                    <input type="text" id="form_eleave_address_eleave" name="form_address_eleave"class="form-control" value="<?php echo $eleave_address_eleave; ?>">
                                    
                                  </div>
                                </div>

                                        <!--  -->
                                <div class="col-sm-6">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>ผู้จัดการที่ดูแล</label>
                                    <input type="text" id="form_eleave_manager_approve" name="form_manager_approve"class="form-control" value="<?php echo $eleave_manager_approve_id_default; ?>"readonly>
                                    
                                  </div>
                                </div>

                                          <!--  -->
                                <div class="col-sm-6">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>ฝ่ายบุคคลที่ดูแล</label>
                                    <input type="text" id="form_eleave_humane_resources_approve"name="form_humane_resources_approve"class="form-control" name="from_humane_resources_approve" value="<?php echo $eleave_humane_resources_id_default; ?>"readonly>
                                    
                                  </div>
                                </div>


                                <hr width="100%"   noshade="noshade" size="6" color="#FF0000"> <br><br>
                                <!-- 2 -->
                    <div class="col-sm-12">
                                <div class="form-group">
                                        <label>คุณต้องการจะลบคำขอการลานี้หรือไม่</label>
                                            <select class="form-control select2bs4"  name ="form_eleave_delete_status"id="form_eleave_delete_status" style="width: 100%;">
                                                 <option selected="selected" value=""></option>
                                                     <option value="0" >เก็บไว้</option>
                                                     <option value="1" >ยืนยันลบ</option>
                                                    
                            
                                                </select>
                        
                                 </div>
                        
                    </div>
                                          
                                
                                
                                
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-block">ยืนยัน</button>
                                </div>
                                
                          

							</div>

							
							




                                
                        </form>

                       
                 
                   
                        </div></center>
                    
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
