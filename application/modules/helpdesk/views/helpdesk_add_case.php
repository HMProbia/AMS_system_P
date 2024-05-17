
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add Case </title>
</head>
<?php 

$emp_id_session =$this->session->userdata("EMP_ID");


$sql="SELECT *FROM USER_INFO WHERE EMP_ID='$emp_id_session' ";
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
            <h1 class="m-0">กรุณากรอกข้อมูลเพื่อสร้างใบงาน</h1>
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
                <h4 class="card-title">ใบงาน </h4>
                
                  
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12 ">
                  <center> 
                   
                  
					  <div class=" card text-white border-dark col-md-12">
                    
                   
                                
                        <div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title" >ข้อมูลผู้สร้างใบงาน</h3>
                                
                                <div class="card-tools">
                                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                  </button>
                                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                  </button>
                                </div>
                            </div>
                          <div class="card-body p-0">
                            
                            <div align="center">
                    <form  method="post" enctype="multipart/form-data" >
                            <div class="row">
                            
                                
                              



                                <!--  -->
                                <div class="col-sm-2">
                                  <!-- text input -->
                                  <div class="form-group">
                                    <label>รหัสพนักงาน</label>
                                    <input type="text" class="form-control" id="form_emp_set1" name="form_emp_set1" style="text-align:center;" value="<?php echo $user_emp_id; ?>"disabled>
                                    
                                  </div>
                                </div>
                                
                                <!--  -->
                                <div class="col-sm-2">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>ชื่อ</label>
                                    <input type="text" class="form-control" name="form_name_set1" id="form_name_set1" style="text-align:center;"  value="<?php echo $user_name; ?>"disabled>
                                  
                                  </div>
                                </div>



                                <!--  -->
                                <div class="col-sm-2">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>นามสกุล</label>
                                    <input type="text" class="form-control" name="form_surname_set1" id="form_surname_set1" style="text-align:center;"  value="<?php echo $user_surname; ?>"disabled>
                                    
                                  </div>
                                </div>

                                        <!--  -->
                                <div class="col-sm-2">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>ฝ่าย</label>
                                    
                                    <input type="text" name="form_department_type_set1" id="form_department_type_set1" class="form-control" value="<?php echo $user_department; ?>"disabled>
                                  </div>
                                </div>

                                
                               
                                        <!--  -->
                                <div class="col-sm-2">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>สังกัด</label>
                                    
                                    <input type="text" name="form_company_set1" id="form_company_set1" class="form-control" value="<?php echo $user_company_name; ?>"disabled>
                                  
                                </select>
                                  </div>
                                </div>

                                        <!--  -->
                                <div class="col-sm-2">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>เบอร์โทร</label>
                                    <input type="text" name="form_phone_set1" id= "form_phone_set1" class="form-control" value="<?php echo $user_phone; ?>"disabled>
                                    
                                  </div>
                                </div>
                                
                                
       
                    </div>
							  
              </div>
              </div>
              </div>
              <?php //เปิดแท็ปใหม่  ?>            
							<div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title" >ส่งใบงานไปที่แผนก</h3>
                                
                                <div class="card-tools">
                                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                  </button>
                                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                  </button>
                                </div>
                            </div>
                          <div class="card-body p-0">
                            <div align="center">
                            <div class="row">
                            

                                        <!--  -->
                                <div class="col-sm-2">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>ฝ่าย</label>
                                    
                                    <select name="form_department_type_set2" id="form_department_type_set2" class="form-control" required >
                                <option readonly selected="selected"></option>
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
                                <div class="col-sm-2.5">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>สังกัด</label>
                                    
                                    <select name="form_company_set2" id="form_company_set2" class="form-control" required >
                                    <option readonly selected="selected"></option>
                               
                                    <option value="1" >Benz Talingchan Co., Ltd.</option>
                                    <option value="2" >ATTA Autohaus Co., Ltd.</option>
                                  
                                </select>
                                  </div>
                                </div>

                                

                                       
                                

              
                    </div>
							  
              </div>
              </div> 
              </div> 
              <?php //เปิดแท็ปใหม่  ?>  
              <div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title" >รายละเอียดใบงาน</h3>
                                
                                <div class="card-tools">
                                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                  </button>
                                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                  </button>
                                </div>
                            </div>
                          <div class="card-body p-0">
                            <div align="center">
                            <div class="row">
                            

                                        <!--  -->
                                <div class="col-sm-2">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>ประเภท</label>
                                    
                                    <select name="from_helpdesk_type_set3" id="from_helpdesk_type_set3" class="form-control" required >
                                <option readonly selected="selected"></option>
                                <?php 
                                
                                    $sql = "SELECT HELPDESK_TYPE_ID,HELPDESK_TYPE_NAME FROM  HELPDESK_TYPE_CASE WHERE HELPDESK_TYPE_IS_APPROVE='1'";
                                    $query = $this->db->query($sql)->result();
                                    foreach($query as $row){
                                        $helpdesk_id  = $row->HELPDESK_TYPE_ID;
                                        $helpdesk_name = $row->HELPDESK_TYPE_NAME;
                                ?>
                                    <option value="<?php echo $helpdesk_id; ?>" ><?php echo $helpdesk_name; ?></option>
                                <?php  } ?>
                                </select>
                                  </div>
                                </div>

                                
                               
                                        <!--  -->
                                <div class="col-sm-2" id="from_helpdesk_systems_type_set3">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>ระบบ</label>
                                    
                                    <select name="from_helpdesk_systems_type_set32" id="from_helpdesk_systems_type_set32" class="form-control" required >
                                <option readonly selected="selected"></option>
                                <?php 
                                
                                    $sql = "SELECT HELPDESK_SYSTEMS_TYPE_ID,HELPDESK_SYSTEMS_TYPE_NAME FROM  HELPDESK_SYSTEMS_TYPE WHERE HELPDESK_SYSTEMS_TYPE_IS_APPROVE='1'";
                                    $query = $this->db->query($sql)->result();
                                    foreach($query as $row){
                                        $helpdesk_systems_type_id  = $row->HELPDESK_SYSTEMS_TYPE_ID;
                                        $helpdesk_systems_type_name = $row->HELPDESK_SYSTEMS_TYPE_NAME;
                                ?>
                                    <option value="<?php echo $helpdesk_systems_type_id; ?>" ><?php echo $helpdesk_systems_type_name; ?></option>
                                <?php  } ?>
                                </select>
                                  </div>
                                </div>

                                <div class="col-sm-3">
                                    <!-- textarea -->
                                    <div class="form-group">
                                      <label>หัวข้อ</label>
                                      <input type="text" name="form_supjeck_set3" id="form_supjeck_set3" class="form-control" >
                                    </div>
                                </div>



                                <div class="col-sm-5">
                                    <!-- textarea -->
                                    <div class="form-group">
                                      <label>ระบุคำถาม/ระบุปัญหาโดยละเอียด</label>
                                      <textarea class="form-control" id="form_text_qa" name="form_text_qa" rows="3" placeholder="กรอกรายละเอียด ..."></textarea>
                                    </div>
                                </div>

                                       
                                

              
                    </div>
							  
              </div>
              </div> 
              </div> 
              <?php //เปิดแท็ปใหม่  ?>

                                
                        </form><BR>
                        <BR>
                        <BR>
                        
                            <div class="row">
                              
                                  <!--  -->
                              <div class="col-sm-6">
                                <!-- text input -->
                                  <div class="form-group">
                                  <button type="button" class="btn btn-block btn-danger"onclick="window.history.go(-1); return false;" >ย้อนกลับ</button>
                                  
                                  </div>
                                </div>
                                <!--  -->

                                
                                <!--  -->
                                <div class="col-sm-6">
                                <!-- text input -->
                                  <div class="form-group" align="right" >
                                  <button type="button" class="btn btn-block btn-success" id="btnSubmit"  onclick="check()">เพิ่มใบงาน</button>
                                  </div>
                                </div>
                                <!--  -->
                            </div>
                 
                   
                        </div></center>
                        </div>
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
<script>
  //สร้างเงื่อนไขเพิ่ม
                                      $(document).ready(function(){
                                        $('#from_helpdesk_type_set3').on('change',function(){
                                          
                                        if($(this).val() === "0"){
                                          $('#from_helpdesk_systems_type_set3').val('').hide();
                                         
                                          $('#from_helpdesk_systems_type_set3').val('').hide();
                                          
                                        }else{
                                     
                                          
                                          $('#fromfrom_helpdesk_systems_type_set3_test').show();
                                          $('#from_helpdesk_systems_type_set3').show();
                                          /* $('#from_helpdesk_systems_type_set32').reset(); */
                                           
                                        }
                                        });
                                      });
                                </script>





<script>
    //เช็คเงื่อนไขจาก form 
function check() {
  Swal.fire({
  title: 'คุณแน่ใจใช่หรือไม่ ?',
  text: "เมื่อคุณยืนยันแล้วจะไม่สามารถเปลี่ยนแปลงได้แล้ว!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'ตกลง, ฉันยืนยันจะทำมัน !'
}).then((result) => {
  if (result.isConfirmed) {
    var pmeters = 'form_emp_set1=' + $("#form_emp_set1").val()+  '&form_name_set1=' + $("#form_name_set1").val()+ '&form_surname_set1=' + $("#form_surname_set1").val()+ '&form_department_type_set1=' + $("#form_department_type_set1").val()+ '&form_company_set1=' + $("#form_company_set1").val()+ '&form_phone_set1=' + $("#form_phone_set1").val()+ '&form_department_type_set2=' + $("#form_department_type_set2").val()+ '&form_company_set2=' + $("#form_company_set2").val()+ '&from_helpdesk_type_set3=' + $("#from_helpdesk_type_set3").val()+ '&from_helpdesk_systems_type_set32=' + $("#from_helpdesk_systems_type_set32").val()+ '&form_supjeck_set3=' + $("#form_supjeck_set3").val()+ '&form_text_qa=' + $("#form_text_qa").val();
		  	pmeters = pmeters.replace("undefined", "");
    ///
    $.ajax({
      type: "POST",
				url: "<?= site_url(); ?>/helpdesk/helpdesk_add_data_to_database/",
				data: pmeters,
				success: function(resPonse){
          Swal.fire(
          'ส่งใบงานสำเร็จ!',
          'คุณได้ทำการส่งใบงานแล้วโปรดรอเจ้าหน้าที่ติดต่อกลับ !',
          'success',
          /* location.reload(), */
         ).then(function(){ 
                    location.href = '<?= site_url(); ?>/helpdesk/helpdesk_check_case/'
                  });
        
         
				}

        
        

        
			});
     


    
    ///
  }
})

}

  </script>