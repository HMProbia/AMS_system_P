
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Export Eleave HR Approve </title>
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
            <h1 class="m-0">ฝ่ายบุคคลตรวจสอบข้อมูลรายการอนุมัติ</h1>
          
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
                  คลิกเลือกข้อมูลที่ต้องการค้นหา เพื่อทำการ Export ข้อมูล
                </h3>
              </div>
              
              <div class="card-body pad table-responsive">
              <form action="<?php echo base_url('index.php/eleave/export_excel_HR_approve_excel'); ?>" method="post" enctype="multipart/form-data" >
                <div class="row">
 
                              <!--  -->
                              <div class="col-sm-2">
                              <!-- text input -->
                                <div class="form-group">
                                  <label>วันที่อนุมัติ</label>
                                  <input type="date" name="form_date_approve" id="form_date_approve"class="form-control">
                                  
                                </div>
                              </div>
                              <!--  -->

                              <!--  -->
                              <div class="col-sm-2">
                              <!-- text input -->
                                <div class="form-group">
                                  <label>รหัสพนักงาน</label>
                                  <input type="text" name="form_emp_id" id="form_emp_id"class="form-control">
                                  
                                </div>
                              </div>
                              <!--  -->


                                                  
                                <!-- 3 -->
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>ค้นหาชื่อ</label>
                                    <input class="form-control" type="text" name="form_name" id="form_name"  placeholder="ชื่อ" />
                                    
                                </div>
                                    
                            </div>
                                    <!-- /3 -->

                        
                        
                      
                      </div>
                      <div class="row">
                          <div class="col-sm-3">
                                    <div class="form-group"><BR>
                                   <button class="form-control" type='submit' ><font color ="#FFFFFF"> Export Excel HR Oder</font></button>
                                        
                                    </div>
                                </div>

                                
                      </div>
                      </form>    
                      

                           

                            
                      
                      
                    
                    
                
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

 




 
