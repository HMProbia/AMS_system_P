
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard 2</title>

</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Change password</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url()."assets/"; ?>#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
            </ol>
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
                <h4 class="card-title">Change password</h4>
              
                  
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12 ">
                  <center> <div class=" card text-white border-dark col-md-6">
                    <?php
                            $sql = "SELECT USER_ID,EMP_ID ,NAME,SURNAME,IMAGE_PROFILE FROM USER_INFO WHERE USER_ID=$user_id";
                            $query = $this->db->query($sql)->row();
                            $emp_id =@$query->EMP_ID;
                            $name = @$query->NAME;
				                    $surname= @$query->SURNAME;
                            $allname= $name." ".$surname;
                            $image_profile= @$query->IMAGE_PROFILE;

                            
                            /* print_r($user_id); */
                    ?>
                    <BR>
                    <div align="center"><img src="<?php echo base_url('upload/profile'); ?>/<?php echo $image_profile; ?>"  width="150" high="150" alt="User Avatar" class="  img-circle"></div>
                    <!-- ใส่เข้อมูล -->
                    <p class="login-box-msg">คุณต้องการเปลี่ยน Password ของคุณ <?php echo $allname; ?></p>
                    <p class="login-box-msg"><font color ="red">กรุณากรอก Password ด้านล่างทั้ง 2 ช่องให้เหมือนกัน</font></p>
                            <form action="<?=site_url('account/account_change_password')?>" method="post">
                            <p> รหัสพนักงาน</p>
                            <input type="id" class="form-control input-sm" name ="emp_id"  value  ="<?php echo $emp_id; ?>"  readonly> <BR>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control input-sm" name ="change_password_01" placeholder="Password"  required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                </div>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control input-sm" name ="change_password_02"placeholder="Confirm Password" required>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-block">Change password</button>
                                </div>
                                <!-- /.col -->
                                </div>
                            </form>

                        <p class="mt-3 mb-1">
                            <a href="login.html">Login</a>
                        </p>
                 
                   
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



  <!-- Main Footer -->

</div>
<!-- ./wrapper -->

  
</body>

</html>
