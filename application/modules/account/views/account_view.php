
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Profile HR</title>
</head>
<?php 
$user_id_session = $this->session->userdata("USER_ID");
$emp_id_session =$this->session->userdata("EMP_ID");


$sql="SELECT *FROM USER_INFO WHERE USER_ID='$user_id' ";
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
        $user_humane_resources_approve =@$query-> HUMANE_RESOURCES_APPROVE;
        $user_job_start_date=@$query-> JOB_START_DATE;
        $user_end_probatio=@$query->END_PROBATIO;
        $user_status=@$query->USER_STATUS;

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
            <h1 class="m-0">Edit Profile</h1>
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
                <h4 class="card-title">Edit </h4>
                
                  
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
                    <form action="<?=site_url('account/edit_data_user_all')?>" method="post" enctype="multipart/form-data" >
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
                            <div class="col-sm-2">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>ลำดับที่</label>
                                    <input type="text" name="form_user_id"class="form-control" value="<?php echo $user_id; ?>" readonly>
                                    
                                  </div>
                                </div>
                                          <!--  -->
                                <div class="col-sm-3">
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
                              <div class="col-sm-3">
                              <!-- text input -->
                                <div class="form-group">
                                  <label>วันผ่านการทดลองงาน </label>
                                  <input type="text" class="form-control"value="<?php echo $user_end_probatio2; ?>"disabled>
                                  
                                </div>
                              </div>

                               <!--  -->
                               <div class="col-sm-4">
                              <!-- text input -->
                                <div class="form-group">
                                  <label>ผ่านการทดลองงานแล้ว</label>
                                  <input type="text" class="form-control"value="<?php echo $user_day_probatio2.' '.'วัน'; ?>"disabled>
                                  
                                </div>
                              </div>
                                <!--  -->




                                <!--  -->
                                <div class="col-sm-6">
                                  <!-- text input -->
                                  <div class="form-group">
                                    <label>รหัสพนักงาน</label>
                                    <input type="text" class="form-control" name="from_emp" value="<?php echo $user_emp_id; ?>">
                                    
                                  </div>
                                </div>
                                
                                <!--  -->
                                <div class="col-sm-6">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>ชื่อ</label>
                                    <input type="text" class="form-control" name="from_name"value="<?php echo $user_name; ?>">
                                  
                                  </div>
                                </div>



                                <!--  -->
                                <div class="col-sm-6">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>นามสกุล</label>
                                    <input type="text" class="form-control" name="from_surname"value="<?php echo $user_surname; ?>">
                                    
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
                                   <!--  <input type="text" class="form-control" value="<?php echo $user_gender; ?>"> -->
                                    <select name="from_gender" class="form-control" required >
                                <option readonly selected="selected"><?php echo $user_gender; ?></option>
                                <!-- <?php 
                                
                                    $sql = "SELECT GENDER_ID,GENDER_NAME FROM USER_GENDER_TYPE WHERE IS_APPROVE='1'";
                                    $query = $this->db->query($sql)->result();
                                    foreach($query as $row){
                                        $gender_id  = $row->GENDER_ID;
                                        $gender_name_type = $row->GENDER_NAME;
                                ?> -->
                                    <option value="<?php echo $gender_name_type; ?>" ><?php echo $gender_name_type; ?></option>
                                <?php  } ?>
                                </select>
                                  </div>
                                </div>

                                        <!--  -->
                                <div class="col-sm-6">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>Email</label>
                                    <input type="text"  name="from_email"class="form-control" required value="<?php echo $user_email; ?> ">
                                    
                                  </div>
                                </div>

                                        <!--  -->
                                <div class="col-sm-6">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>ฝ่าย</label>
                                    <!-- <input type="text" class="form-control" value="<?php echo $user_department; ?>"> -->
                                    <select name="from_department" class="form-control" required >
                                <option readonly selected="selected"><?php echo $user_department; ?></option>
                                <?php 
                                
                                    $sql = "SELECT DEPARTMENT_ID,DEPARTMENT_NAME FROM  DEPARTMENT_TYPE WHERE IS_APPROVE='1'";
                                    $query = $this->db->query($sql)->result();
                                    foreach($query as $row){
                                        $department_id  = $row->DEPARTMENT_ID;
                                        $department_name = $row->DEPARTMENT_NAME;
                                ?>
                                    <option value="<?php echo $department_name; ?>" ><?php echo $department_name; ?></option>
                                <?php  } ?>
                                </select>
                                  </div>
                                </div>

                                        <!--  -->
                                <div class="col-sm-6">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>ตำแหน่ง</label>
                                    <!-- <input type="text" class="form-control" value="<?php echo $user_job_prosition; ?>"> -->
                                    <select name="from_job_position"class="form-control" required  >
                                    <option readonly selected="selected" ><?php echo $user_job_prosition; ?></option>
                                    <?php 
                                    $sql = "SELECT * FROM JOB_POSITION_TYPE";
                                    $query = $this->db->query($sql)->result();
                                    foreach($query as $row){
                                        $job_position_id  = $row->JOB_POSITION_ID;
                                        $job_position_name = $row->JOB_POSITION_NAME;
                                ?>
                                    <option value="<?php echo $job_position_name; ?>" ><?php echo $job_position_name; ?></option>
                                <?php  } ?>   
                                </select>
                                  </div>
                                </div>
                               
                                        <!--  -->
                                <div class="col-sm-6">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>สังกัด</label>
                                    <select name="from_company" class="form-control" required >
                                    <option readonly selected="selected"><?php echo $user_company_name; ?></option>
                               
                                    <option value="1" >Benz Talingchan Co., Ltd.</option>
                                    <option value="2" >ATTA Autohaus Co., Ltd.</option>
                            
                                </select>
                                  </div>
                                </div>

                                        <!--  -->
                                <div class="col-sm-6">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>เบอร์โทร</label>
                                    <input type="text" name="from_phone"class="form-control" value="<?php echo $user_phone; ?>">
                                    
                                  </div>
                                </div>


                                        <!--  -->
                                <div class="col-sm-12">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>ที่อยู่</label>
                                    <input type="text" name="from_address"class="form-control" value="<?php echo $user_contact_address; ?>">
                                    
                                  </div>
                                </div>

                                        <!--  -->
                                <div class="col-sm-6">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>ผู้จัดการที่ดูแล</label>
                                    <select name="from_manager_approve" class="form-control">
                                      <option value="<?php echo $user_manager_approve; ?>"><?php echo $user_manager_approve; ?></option>
                                      <?php 
                                            $sql = "SELECT MANAGER_ID,MANAGER_EMP_ID,MANAGER_NAME FROM MANAGER_TYPE WHERE IS_APPROVE ='1'   ";
                                            $query = $this->db->query($sql)->result();
                                            foreach($query as $row){
                                                $manager_id  = $row->MANAGER_ID;
                                                $manager_emp_id  = $row->MANAGER_EMP_ID;
                                                $manager_name = $row->MANAGER_NAME;
                                      ?>
                                            <option value="<?php echo $manager_emp_id; ?>" ><?php echo $manager_emp_id.":".$manager_name; ?></option>
                                      <?php  } ?>
                                    </select>
                                  </div>
                                </div>

                                          <!--  -->
                                <div class="col-sm-6">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>ฝ่ายบุคคลที่ดูแล</label>
                                    <!-- <input type="text" class="form-control" value="<?php echo $user_humane_resources_approve; ?>"> -->
                                    <select name="from_humane_resources_approve" class="form-control">
                                      <option value="<?php echo $user_humane_resources_approve; ?>"><?php echo $user_humane_resources_approve; ?></option>
                                      <?php 
                                            $sql = "SELECT HUMANE_RESOURCES_ID,HUMANE_RESOURCES_EMP_ID,HUMANE_RESOURCES_NAME FROM HUMANE_RESOURCES_TYPE WHERE IS_APPROVE ='1'";
                                            $query = $this->db->query($sql)->result();
                                            foreach($query as $row){
                                                $humane_resoures_id  = $row->HUMANE_RESOURCES_ID;
                                                $humane_resoures_emp_id  = $row->HUMANE_RESOURCES_EMP_ID;
                                                $humane_resoures_name = $row->HUMANE_RESOURCES_NAME;
                                      ?>
                                            <option value="<?php echo $humane_resoures_emp_id; ?>" ><?php echo $humane_resoures_emp_id.":".$humane_resoures_name; ?></option>
                                      <?php  } ?>
                                    </select>
                                  </div>
                                </div>

                               <!--  -->
                               <div class="col-sm-12">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>สถานะของพนักงาน</label>
                                    <?php 
                                          if($user_status = "0"){
                                            $user_status ='พ้นสภาพการเป็นพนักงาน';
                                          }else if($user_status = "1"){
                                            $user_status ='พนักงานปัจจุบัน';
                                          }
                                    ?>
                                    
                                    <select name="form_user_status" class="form-control">
                                      <option value="<?php echo $user_status; ?>"><?php echo $user_status; ?></option>
                                      <?php 
                                            $sql = "SELECT USER_STATUS_ID,USER_STATUS_NAME FROM USER_STATUS WHERE IS_APPROVE ='1'";
                                            $query = $this->db->query($sql)->result();
                                            foreach($query as $row){
                                                $user_status_id  = $row->USER_STATUS_ID;
                                                $user_status_name  = $row->USER_STATUS_NAME;
                                                
                                      ?>
                                            <option value="<?php echo $user_status_id; ?>" ><?php echo $user_status_name; ?></option>
                                      <?php  } ?>
                                    </select>
                                  </div>
                                </div>
                                          
                                
                                
                                
                                <div class="col-12">
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
