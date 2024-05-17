
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
          <div class="col-md-10">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-edit"></i>
                  นำเข้าข้อมูลไฟล์
                </h3>
              </div>
              <div class="card-body pad table-responsive">
                <p>สามารถนำเข้าไฟล์ข้อมูลได้เฉพาะ <code>.xls,.xlsx</code> เท่านั้น</p>
                <table class="table table-bordered text-center">
                  <tr>
                    <th>นำเข้าไฟล์เข้ามูลพนักงาน</th>
                    
                    
                   
                  </tr>
                  <tr>
                    
                    <td>
                    <div class="custom-file">
                      <form action="<?=site_url('account/import_file_user_all')?>" method="post" enctype="multipart/form-data" >
                          <input type="file" name="file_upload" class="custom-file-input" id="bsCustomFileInput">
                          <label class="custom-file-label" for="bsCustomFileInput">Choose file</label>
                          <button type="submit" class="btn btn-primary btn-block">นำเข้าข้อมูล</button>
                              
                      </form>
                      </div>
                      
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


<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>




</html>
