
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Profile USER</title>
</head>
<?php 

$emp_id_session =$this->session->userdata("EMP_ID");


$sql="SELECT *FROM USER_INFO WHERE EMP_ID = $emp_id_session ";
$query = $this->db->query($sql)->row();
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
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">View Profile</h1>
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
                <h4 class="card-title">Profile</h4>
                
                  
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12 ">
                  <center> 
                  <BR>  
                  
					  <div class=" card text-white border-dark col-md-10">
                    
                    <div align="center"><BR><BR>
                    <form action="<?=site_url('account/user_edit_password')?>" method="post" enctype="multipart/form-data" >
                        <img src="<?php echo base_url('upload/profile'); ?>/<?php echo $user_image_profile; ?>"  width="250" high="150" alt="User Avatar" class="  rounded-circle"></div>
                       <center> <BR>
                        <div class="col-sm-4">
                          <div class="custom-file">
                            <!-- <input type="file" name="file_upload_profile"class="custom-file-input" id="customFile"> -->
                            
                              <!-- <input type="file" name="file_upload"  id="file_upload" />  -->
                              <input type="file" name="file_upload">
                              <!-- <label class="custom-file-label" for="customFile">อัพโหลดรูปโปรไฟล์</label> -->
                            
                          </div>
                        </div>
                        </center>
                        
                        
                            <div class="row">
                                          <!--  -->
                                <div class="col-sm-4">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>วันเริ่มงาน</label>
                                    <input type="text" class="form-control" value="<?php echo $user_job_start_date2; ?>" disabled>
                                    
                                  </div>
                                </div>
                                <?php 
                                $datenow=date("Y-m-d");  
                                $sql2 ="SELECT DATEDIFF( '$datenow',END_PROBATIO ) AS 'DAY'FROM USER_INFO  WHERE EMP_ID = $user_emp_id";
                                $query2 = $this->db->query($sql2)->row();
                                /* return $this->db->query($sql)->row(); */
                                 $user_day_probatio2=@$query2->DAY;
                                 
                                ?>
                                      <!--  -->
                              <div class="col-sm-4">
                              <!-- text input -->
                                <div class="form-group">
                                  <label>วันผ่านการทดลองงาน</label>
                                  <input type="text" class="form-control"value="<?php echo $user_end_probatio2; ?>"disabled>
                                  
                                </div>
                              </div>

                                 <!--  -->
                                 <div class="col-sm-4">
                              <!-- text input -->
                                <div class="form-group">
                                  <label>ผ่านการทดลองงานแล้ว</label>
                                  <input type="text" class="form-control"value="<?php echo $user_day_probatio2.'วัน'; ?>"disabled>
                                  
                                </div>
                              </div>
                                <!--  -->



                                <!--  -->
                                <div class="col-sm-6">
                                  <!-- text input -->
                                  <div class="form-group">
                                    <label>รหัสพนักงาน</label>
                                    <input type="text" class="form-control" value="<?php echo $user_emp_id; ?>"disabled>
                                    
                                  </div>
                                </div>
                                
                                <!--  -->
                                <div class="col-sm-6">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>ชื่อ</label>
                                    <input type="text" class="form-control" value="<?php echo $user_name; ?>"disabled>
                                  
                                  </div>
                                </div>



                                <!--  -->
                                <div class="col-sm-6">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>นามสกุล</label>
                                    <input type="text" class="form-control" value="<?php echo $user_surname; ?>"disabled>
                                    
                                  </div>
                                </div>


                                <!--  -->
                                <div class="col-sm-6">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>วันเกิด</label>
                                    <input type="text" class="form-control" value="<?php echo $user_birthday2; ?>"disabled>
                                    
                                  </div>
                                </div>
								
                                
                                        <!--  -->
                                <div class="col-sm-6">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>เพศ</label>
                                    <input type="text" class="form-control" value="<?php echo $user_gender; ?>"disabled>
                                    
                                  </div>
                                </div>

                                        <!--  -->
                                <div class="col-sm-6">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" value="<?php echo $user_email; ?>"disabled>
                                    
                                  </div>
                                </div>

                                        <!--  -->
                                <div class="col-sm-6">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>ฝ่าย</label>
                                    <input type="text" class="form-control" value="<?php echo $user_department; ?>"disabled>
                                    
                                  </div>
                                </div>

                                        <!--  -->
                                <div class="col-sm-6">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>ตำแหน่ง</label>
                                    <input type="text" class="form-control" value="<?php echo $user_job_prosition; ?>"disabled>
                                    
                                  </div>
                                </div>

                                        <!--  -->
                                <div class="col-sm-6">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>สังกัด</label>
                                    <input type="text" class="form-control"value="<?php echo $user_company_name; ?>"disabled>
                                    
                                  </div>
                                </div>

                                        <!--  -->
                                <div class="col-sm-6">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>เบอร์โทร</label>
                                    <input type="text" class="form-control" value="<?php echo $user_phone; ?>"disabled>
                                    
                                  </div>
                                </div>


                                        <!--  -->
                                <div class="col-sm-12">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>ที่อยู่</label>
                                    <input type="text" class="form-control" value="<?php echo $user_contact_address; ?>"disabled>
                                    
                                  </div>
                                </div>

                                        <!--  -->
                                <div class="col-sm-6">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>ผู้จัดการที่ดูแล</label>
                                    <input type="text" class="form-control"value="<?php echo $user_manager_approve; ?>"disabled>
                                    
                                  </div>
                                </div>

                                          <!--  -->
                                <div class="col-sm-6">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>ฝ่ายบุคคลที่ดูแล</label>
                                    <input type="text" class="form-control" value="<?php echo $user_humane_resources_approve; ?>"disabled>
                                    
                                  </div>
                                </div>

                                <hr width="100%"   noshade="noshade" size="6" color="#FFFFFF"> <br><br><br><br>
                                
                                          <!--  -->
                                          <div class="col-sm-12">
                                          
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>เปลี่ยน Password </label>
                                    <input type="text" name="password_1"class="form-control" >
                                    
                                  </div>
                                </div>
                                          <!--  -->
                                          <div class="col-sm-12">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="text" name="password_2" class="form-control" >
                                    
                                  </div>
                                </div>
                                
                                <div class="col-6">
                                    <button type="" class="btn btn-primary btn-block"  onClick="window.location.href='account_list">ย้อนกลับ</button>
                                </div>
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary btn-block">แก้ไข</button>
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



  

  
</body>

</html>
