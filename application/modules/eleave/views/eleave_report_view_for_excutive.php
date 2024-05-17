
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Report Data </title>
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
            <h1 class="m-0">รวม Report ทุกประเภท   </h1>
          
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
                                        กรุณากรอกข้อมูลเพื่อทำการโหลดข้อมูล Report 
                            </h3>
                        </div>
                                            <div class="card-body pad table-responsive">
                                                        <div class="container-fluid">
                                                            <div class="card card-default">
                                                                <div class="card-header">
                                                                    <h3 class="card-title">1. report สถานะการลางาน</h3>

                                                                    <div class="card-tools">
                                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                                        <i class="fas fa-minus"></i>
                                                                    </button>
                                                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                                        <i class="fas fa-times"></i>
                                                                    </button>
                                                                    </div>
                                                                </div>
                                                                    
                                                                <!-- /.card-header -->
                                                                    
                                                                    <div class="card-body">
                                                                    <form action="<?=base_url('index.php/eleave/export_excel_eleave_status_all')?>" method="post" enctype="multipart/form-data" >
                                                                        <div class="row">
                                                                        
                                                                        <div class="col-sm-3">
                                                                            <div class="form-group">
                                                                            <label>กรุณากรอกรหัสพนักงาน</label>
                                                                            <input type="text" id="form_emp_id"name="form_emp_id"class="form-control" >
                                                                            </div>
                                                                            <!-- /.form-group -->
                                                                            
                                                                        </div>
                                                                        <!-- /.col -->
                             
                                                                        <div class="col-sm-3">
                                                                            <div class="form-group">
                                                                            <label>สถานะการลางาน</label>
                                                                            
                                                                            <select class="form-control select2bs4" id="form_eleave_status"name="form_eleave_status" style="width: 100%;">
                                                                                <option selected="selected" value=""></option>
                                                                                    <?php 
                                                                                        
                                                                                            $sql = "SELECT ELEAVE_STATUS_ID,ELEAVE_STATUS_NAME FROM  ELEAVE_STATUS_TYPE WHERE IS_APPROVE='1'";
                                                                                            $query = $this->db->query($sql)->result();
                                                                                            foreach($query as $row){
                                                                                                $eleave_status_id  = $row->ELEAVE_STATUS_ID;
                                                                                                $eleave_status_name = $row->ELEAVE_STATUS_NAME;
                                                                                        ?>
                                                                                            <option value="<?php echo $eleave_status_id; ?>" ><?php echo $eleave_status_name; ?></option>
                                                                                        <?php  } ?>
                                                                                    
                                                                                </select>
                                                                            </div>
                                                                            <!-- /.form-group -->
                                                                            
                                                                        </div>
                                                                        <!-- /.col -->


                                                                        <div class="col-sm-3">
                                                                            <div class="form-group">
                                                                            <label>วันที่ส่งคำขอการลา</label>
                                                                            <input type="date" id="form_send_date_eleave"name="form_send_date_eleave"class="form-control" >
                                                                            </div>
                                                                            <!-- /.form-group -->
                                                                            
                                                                        </div>
                                                                        <!-- /.col -->

                                                                        <!-- <div class="col-sm-3">
                                                                            <div class="form-group">
                                                                            <label>วันจบการลา</label>
                                                                            <input type="date" id="form_end_eleave"name="form_end_eleave"class="form-control" >
                                                                            </div>
                                                                            
                                                                            
                                                                        </div> -->
                                                                        <!-- /.col -->


                                                                        
                                                                        </div>
                                                                        <!-- /.row -->

                                                                        <div class="col-sm-2">
                                                                            <div class="form-group">
                                                                            <button type="submit" class="btn btn-primary btn-block">ตกลง</button>
                                                                            </div>
                                                                        </div>
                                                                        </form> 
                                                                        
                                                                       
                                                            </div>
                                                                    
                                                                    
                                                            
                                                            


                                                            <div class="card card-default">
                                                                <div class="card-header">
                                                                    <h3 class="card-title">2. report สิทธิการลาที่เหลือ</h3>

                                                                    <div class="card-tools">
                                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                                        <i class="fas fa-minus"></i>
                                                                    </button>
                                                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                                        <i class="fas fa-times"></i>
                                                                    </button>
                                                                    </div>
                                                                </div>
                                                                <div class="card-body">
                                                                    <form action="<?=base_url('index.php/eleave/export_excel_eleave_number_score_all')?>" method="post" enctype="multipart/form-data" >
                                                                        <div class="row">
                                                                        <div class="col-sm-3">
                                                                            <div class="form-group">
                                                                            <label>กรุณากรอกรหัสพนักงาน</label>
                                                                            <input type="text" id="form_emp_id"name="form_emp_id"class="form-control" >
                                                                            </div>
                                                                            <!-- /.form-group -->
                                                                            
                                                                        </div>
                                                                        <!-- /.col -->

                                                                        


                                                                       

                        
                                                                        </div>
                                                                        <!-- /.row -->

                                                                        <div class="col-sm-2">
                                                                            <div class="form-group">
                                                                            <button type="submit" class="btn btn-primary btn-block">ตกลง</button>
                                                                            </div>
                                                                        </div>
                                                                        </form> 
                                                            </div>




                                                            <div class="card card-default">
                                                                <div class="card-header">
                                                                    <h3 class="card-title">3. report รายการที่ผู้บังคับบัญชาอนุมัติ
                                                                    </h3>

                                                                    <div class="card-tools">
                                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                                        <i class="fas fa-minus"></i>
                                                                    </button>
                                                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                                        <i class="fas fa-times"></i>
                                                                    </button>
                                                                    </div>
                                                                </div>
                                                                <div class="card-body">
                                                                    <form action="<?=base_url('index.php/eleave/report_manager_approve')?>" method="post" enctype="multipart/form-data" >
                                                                        <div class="row">
                                                                        <div class="col-sm-3">
                                                                            <div class="form-group">
                                                                            <label>กรุณากรอกรหัสพนักงาน</label>
                                                                            <input type="text" id="form_emp_id"name="form_emp_id"class="form-control" >
                                                                            </div>
                                                                            <!-- /.form-group -->
                                                                            
                                                                        </div>
                                                                        <!-- /.col -->
                                      
                                                                        


                                                                        <div class="col-sm-3">
                                                                            <div class="form-group">
                                                                            <label>วันที่อนุมัติการลา</label>
                                                                            <input type="date" id="form_date_approve"name="form_date_approve"class="form-control" >
                                                                            </div>
                                                                            <!-- /.form-group -->
                                                                            
                                                                        </div>
                                                                        <!-- /.col -->

                                                                       


                                                                        
                                                                        </div>
                                                                        <!-- /.row -->

                                                                        <div class="col-sm-2">
                                                                            <div class="form-group">
                                                                            <button type="submit" class="btn btn-primary btn-block">ตกลง</button>
                                                                            </div>
                                                                        </div>
                                                                        </form> 
                                                            </div>




                                                            <div class="card card-default">
                                                                <div class="card-header">
                                                                    <h3 class="card-title">4. report รายการที่ฝ่ายบุคคลอนุมัติ
                                                                    </h3>

                                                                    <div class="card-tools">
                                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                                        <i class="fas fa-minus"></i>
                                                                    </button>
                                                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                                        <i class="fas fa-times"></i>
                                                                    </button>
                                                                    </div>
                                                                </div>
                                                                <div class="card-body">
                                                                    <form action="<?=base_url('index.php/eleave/report_hr_approve')?>" method="post" enctype="multipart/form-data" >
                                                                        <div class="row">
                                                                        <div class="col-sm-3">
                                                                            <div class="form-group">
                                                                            <label>กรุณากรอกรหัสพนักงาน</label>
                                                                            <input type="text" id="form_emp_id"name="form_emp_id"class="form-control" >
                                                                            </div>
                                                                            <!-- /.form-group -->
                                                                            
                                                                        </div>
                                                                        <!-- /.col -->

                                                                        


                                                                        <div class="col-sm-3">
                                                                            <div class="form-group">
                                                                            <label>วันที่อนุมัติการลา</label>
                                                                            <input type="date" id="form_date_approve"name="form_date_approve"class="form-control" >
                                                                            </div>
                                                                            <!-- /.form-group -->
                                                                            
                                                                        </div>
                                                                        <!-- /.col -->

                                                                        


                                                                        
                                                                        </div>
                                                                        <!-- /.row -->

                                                                        <div class="col-sm-2">
                                                                            <div class="form-group">
                                                                            <button type="submit" class="btn btn-primary btn-block">ตกลง</button>
                                                                            </div>
                                                                        </div>
                                                                        </form>     
                                                            </div>



                                                            <div class="card card-default">
                                                                <div class="card-header">
                                                                    <h3 class="card-title">5. report รายการที่ผู้บริหารอนุมัติ
                                                                    </h3>

                                                                    <div class="card-tools">
                                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                                        <i class="fas fa-minus"></i>
                                                                    </button>
                                                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                                        <i class="fas fa-times"></i>
                                                                    </button>
                                                                    </div>
                                                                </div>
                                                                <div class="card-body">
                                                                    <form action="<?=base_url('index.php/eleave/report_executive_approve')?>" method="post" enctype="multipart/form-data" >
                                                                <div class="row">
                                                                        <div class="col-sm-3">
                                                                            <div class="form-group">
                                                                            <label>กรุณากรอกรหัสพนักงาน</label>
                                                                            <input type="text" id="form_emp_id"name="form_emp_id"class="form-control" >
                                                                            </div>
                                                                            <!-- /.form-group -->
                                                                            
                                                                        </div>
                                                                        <!-- /.col -->
 
                                                                    

                                                                        <div class="col-sm-3">
                                                                            <div class="form-group">
                                                                            <label>วันที่อนุมัติการลา</label>
                                                                            <input type="date" id="form_date_approve"name="form_date_approve"class="form-control" >
                                                                            </div>
                                                                            <!-- /.form-group -->
                                                                            
                                                                        </div>
                                                                        <!-- /.col -->


                                                                        
                                                                        </div>
                                                                        <!-- /.row -->

                                                                        <div class="col-sm-2">
                                                                            <div class="form-group">
                                                                            <button type="submit" class="btn btn-primary btn-block">ตกลง</button>
                                                                            </div>
                                                                        </div>
                                                                        </form>
                                                            </div>





                                                        </div>  
                                                     
                                                    
                                            </div>
                   
                     



                            
                          

                            
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

  
 <style>
  .red {
  background-color: #0C090A !important;
}

</style>



 
