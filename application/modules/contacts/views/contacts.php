
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add Eleave Data</title>
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
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Contacts to Staff</h1>
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
                <h4 class="card-title">ติดต่อผู้ดูแล </h4>
                
                  
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12 ">
                  <center> 
                  <BR>  
                  <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row">
          <?php
            $sql="SELECT NAME,SURNAME,EMAIL,PHONE,DEPARTMENT,JOB_POSITION,COMPANY_NAME,IMAGE_PROFILE FROM USER_INFO WHERE JOB_POSITION='IT_SUPPORT' OR JOB_POSITION='Human Resources'";
            $query = $this->db->query($sql)->result();
            foreach($query as $row){
                $user_name  = $row->NAME;
                $user_surname  = $row->SURNAME;
                $user_email = $row->EMAIL;
                $user_phone = $row->PHONE;
                $user_company_name = $row->COMPANY_NAME;
                $user_department = $row->DEPARTMENT;
                $user_job_postiton = $row->JOB_POSITION;
                $user_image_profile = $row->IMAGE_PROFILE;
            
            ?>
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                <?php echo $user_job_postiton?>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b><?php echo $user_name.' '.$user_surname ; ?></b></h2>
                      <p class="text-muted text-sm"><b>About: </b><?php echo $user_department.'/'.$user_job_postiton ; ?></p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>Company:<?php echo $user_company_name?></li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: <?php echo $user_phone?></li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="<?php echo base_url('upload/profile'); ?>/<?php echo $user_image_profile; ?>" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="#" class="btn btn-sm bg-teal">
                      <i class="fas fa-comments"></i>
                    </a>
                    <?php echo $user_email; ?>
                    
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>
        
            
            
          </div>
        </div>
        
      </div>
      <!-- /.card -->

        
              

           
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
