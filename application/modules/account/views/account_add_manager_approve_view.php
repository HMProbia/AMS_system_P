
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
        
        
        
        $user_email=@$query-> EMAIL;
        $user_department=@$query-> DEPARTMENT;
       
        $user_company_name=@$query-> COMPANY_NAME;
        $user_phone=@$query-> PHONE;
        
    
        

        
        
       
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
                    <form action="<?=site_url('account/data_view_manager_add_approve_to_db')?>" method="post" enctype="multipart/form-data" >
                        <img src="<?php echo base_url('upload/profile'); ?>/<?php echo $user_image_profile; ?>"  width="250" high="150" alt="User Avatar" class="  rounded-circle"></div>
                         <BR>
                        
                        
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
                                <div class="col-sm-2">
                                  <!-- text input -->
                                  <div class="form-group">
                                    <label>รหัสพนักงาน</label>
                                    <input type="text" class="form-control" name="from_emp" value="<?php echo $user_emp_id; ?>">
                                    
                                  </div>
                                </div>
                                
                                <!--  -->
                                <div class="col-sm-4">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>ชื่อ</label>
                                    <input type="text" class="form-control" name="from_name"value="<?php echo $user_name; ?>">
                                  
                                  </div>
                                </div>



                                <!--  -->
                                <div class="col-sm-4">
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
                                    <label>Email</label>
                                    <input type="text"  name="from_email"class="form-control" required value="<?php echo $user_email; ?> ">
                                    
                                  </div>
                                </div>

                                        <!--  -->
                                <div class="col-sm-6">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>ฝ่าย</label>
                                    <input type="text" class="form-control" value="<?php echo $user_department; ?>">
                                  </div>
                                </div>

                                  
                               
                                        <!--  -->
                                <div class="col-sm-6">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>สังกัด</label>
                                    <input type="text" class="form-control" value="<?php echo $user_company_name; ?>">
                                    
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


                                      

                                     


                               
                                          
                                
                                <div class="col-6">
                                <button type="button" class="btn btn-block btn-danger"onclick="window.history.go(-1); return false;" >ย้อนกลับ</button>
                                </div>
                                
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary btn-block">เพิ่มข้อมูลผู้อนุมัติ</button>
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
