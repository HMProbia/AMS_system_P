
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add Data Use</title>
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
            <h1 class="m-0">Add  User  Data   </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url()."assets/"; ?>#">Home</a></li>
              <li class="breadcrumb-item active">Add  User  Data   </li>
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
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-edit"></i>
                  กรุณาเลือกเมนูการเพิ่มข้อมูลพนักงานที่ท่านต้องการ
                </h3>
              </div>
              <div class="card-body pad table-responsive">
                <p>โปรตรวจสอบสิทธิการเข้าถึงเมนูดังกล่าว <code>เนื่องจากมีการตรวจสอบการเข้าถึง</code></p>
                <table class="table table-bordered text-center">
                  <tr>
                    <th>สำหรับพนักงานเพียง 1 คน</th>
                    <th>สำหรับพนักงาน 2 คนขึ้นไป <code>.btn-lg</code></th>
                    
                   
                  </tr>
                  <tr>
                    <td>
                          <a class="btn btn-app bg-success" href="<?= site_url(); ?>/register">
                              <span class="badge bg-purple">1 คน</span>
                                <i class="fas fa-users"></i> Add One Users 
                          </a>
                    </td>
                    <td>
                            <a class="btn btn-app bg-info"href="<?= site_url(); ?>/account/import_user_all">
                              <span class="badge bg-danger">2 คนขึ้นไป</span>
                                <i class="fas fa-users"></i> Add One Users
                            </a>
                    </td>
                
                  </tr>

                  <tr>
                        <th>
                            เพิ่มผู้อนุมัติของผู้บังคับบัญชา <code>มีการตรวจสอบการเข้าถึง</code>
                        </th>

                        <th>
                            เพิ่มผู้อนุมัติของฝ่ายบุคคล <code>มีการตรวจสอบการเข้าถึง</code>
                        </th>


                  </tr>
                  

                  <tr>
                        <td>
                        <a class="btn btn-app bg-info"href="<?= site_url(); ?>/account/load_view_add_manager">
                              <span class="badge bg-danger">เพิ่มข้อมูล</span>
                                <i class="fas fa-user-plus"></i> Add Manager approve Users
                            </a>
                        </td>

                        <td>
                        <a class="btn btn-app bg-info"href="<?= site_url(); ?>/account/load_view_add_hr">
                              <span class="badge bg-danger">เพิ่มข้อมูล</span>
                                <i class="fas fa-user-plus"></i> Add HR approve Users
                            </a>
                        </td>

                  </tr>
                  
                  
                </table>
              </div>
              <!-- /.card -->
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- ./row -->

     
        </div>
</section>

</div>
<!-- ./wrapper -->



</body>



</html>
