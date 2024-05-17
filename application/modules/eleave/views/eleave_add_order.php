
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add Eleave Data</title>
</head>
<?php 

$emp_id_session =$this->session->userdata("EMP_ID");


$sql="SELECT *FROM USER_INFO WHERE  EMP_ID='$emp_id_session' ";
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
            <h1 class="m-0">Add Eleave Data</h1>
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
                <h4 class="card-title">Add Eleave Data </h4>
                
                  
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
                    <form action="<?=site_url('eleave/eleave_add_data_send')?>" method="post" enctype="multipart/form-data" >
                        <img src="<?php echo base_url('upload/profile'); ?>/<?php echo $user_image_profile; ?>"  width="250" high="150" alt="User Avatar" class="  img-thumbnail"></div>
                      
                        <BR>
                        
                            <div class="row">
                            <!--  -->
                            <div class="col-sm-2">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>ลำดับที่</label>
                                    <input type="text" id="form_user_id"name="form_user_id"class="form-control" value="<?php echo $user_id; ?>" readonly>
                                    
                                  </div>
                                </div>
                                          <!--  -->
                                



                                <!--  -->
                                <div class="col-sm-2">
                                  <!-- text input -->
                                  <div class="form-group">
                                    <label>รหัสพนักงาน</label>
                                    <input type="text" id="form_emp" class="form-control" name="form_emp" value="<?php echo $user_emp_id; ?>"readonly>
                                    
                                  </div>
                                </div>
                                
                                <!--  -->
                                <div class="col-sm-4">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>ชื่อ</label>
                                    <input type="text" id="form_name"class="form-control" name="form_name"value="<?php echo $user_name; ?>"readonly>
                                  
                                  </div>
                                </div>



                                <!--  -->
                                <div class="col-sm-4">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>นามสกุล</label>
                                    <input type="text" id="form_surname"class="form-control" name="form_surname"value="<?php echo $user_surname; ?>"readonly>
                                    
                                  </div>
                                </div>


                                        <!--  -->
                                <div class="col-sm-6">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>Email</label>
                                    <input type="text"  id="form_email"name="form_email"class="form-control" required value="<?php echo $user_email; ?> "readonly>
                                    
                                  </div>
                                </div>

                                     <!--  -->
                                     <div class="col-sm-6">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>สังกัด</label>
                                    <input type="text"  id="form_company_name"name="form_company_name"class="form-control" required value="<?php echo $user_company_name; ?> "readonly>
                                    
                                  </div>
                                </div>

                                        <!--  -->
                                <div class="col-sm-6">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>ฝ่าย</label>
                                    <input type="text" id="form_department" name="form_department" class=" form-control" value="<?php echo $user_department; ?>"readonly>
                                   
                                  </div>
                                </div>

                                        <!--  -->
                                <div class="col-sm-6">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>ตำแหน่ง</label>
                                    <input type="text" id="form_job_position"name="form_job_position" class="form-control" value="<?php echo $user_job_prosition; ?>"readonly>
                                   
                                  </div>
                                </div>
                               
                                       

                                        <!--  -->
                                <div class="col-sm-12">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>เบอร์โทร</label>
                                    <input type="text" id="form_phone" name="form_phone"class="form-control" value="<?php echo $user_phone; ?>"readonly>
                                    
                                  </div>
                                </div>
                                <hr width="100%"   noshade="noshade" size="6" color="#FFFFFF"> <br><br>
                                       <!--  -->
                                       <div class="col-sm-12">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>ประเภทการลา</label>
                                    <select  id="form_eleave_type" name="form_eleave_type"class="form-control" required onchange="senddate()" >
                                    <option  readonly value="">--เลือกประเภทการลา--</option>
                                    <option value="0" >ลากิจ</option>
                                    <option value="1" >ลาป่วย</option>
                                    <option value="2" >ลากิจฉุกเฉิน</option>
                                 
                                </select>
                                    
                                  </div>
                                </div>

                                    <!--  -->
                                    <div class="col-sm-12">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>ช่วงเวลาที่ต้องการลา</label>
                                    <select  id="form_range_time" name="form_range_time"class="form-control" required onchange="senddate()" >
                                    <option  readonly value=" ">--เลือกช่วงเวลาที่ลา--</option>
                                    <option value="1" >ช่วงเช้า</option>
                                    <option value="2" >ช่วงบ่าย</option>
                                    <option value="3" >เต็มวัน</option>
                                 
                                </select>
                                    
                                  </div>
                                </div>

                                
                                <!--  -->

                                        <!--  -->
                                        <div class="col-sm-6">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>วันที่เริ่มลา</label>
                                    <input type="date"id="form_date_start" name="form_date_start"class="form-control"onchange="senddate()">
                                    
                                  </div>
                                </div>

                                    <!--  -->
                                    <div class="col-sm-6">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label id="lable_time_start">เวลาที่เริ่มลา</label>
                                    <input type="time" id="form_time_start" name="form_time_start"class="form-control"onchange="senddate()">
                                    
                                  </div>
                                </div>



                                   
                                       <!--  -->
                                
                                <div class="col-sm-6">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>วันที่จบการลา</label>
                                    <input type="date" id="form_date_end"  name="form_date_end"class="form-control"onchange="senddate()">
                                    
                                  </div>
                                </div>

                              

                                 <!--  -->
                                 <div class="col-sm-6">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label id="lable_time_end">เวลาที่จบการลา</label>
                                    <input type="time" id="form_time_end" name="form_time_end"class="form-control"onchange="senddate()">
                                    
                                  </div>
                                </div>


                                 <!--  -->
                                 <div class="col-sm-12">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>จำนวนวันที่ลา</label>
                                    <input type="text" id="form_number_time_eleave" name="form_number_time_eleave"class="form-control"value=""readonly>
                                    <p id="number"></p>
                                  </div>
                                </div>
                                            <!--  -->
                                    <div class="col-sm-12">
                                      <div class="form-group">
                                          <label>สาเหตุที่ลา</label>
                                              <textarea id="form_cause" name="form_cause" class="form-control" rows="3" placeholder="กรุณากรอกเหตุผลที่ลา"></textarea>
                                      </div>
                                    </div>

                                        <!--  -->
                                <div class="col-sm-12">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>ที่อยู่ที่สามารถติดต่อได้</label>
                                    <input type="text" id="form_address_eleave" name="form_address_eleave"class="form-control" value="<?php echo $user_contact_address; ?>">
                                    
                                  </div>
                                </div>

                                        <!--  -->
                                <div class="col-sm-6">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>ผู้จัดการที่ดูแล</label>
                                    <input type="text" id="form_manager_approve" name="form_manager_approve"class="form-control" value="<?php echo $user_manager_approve; ?>"readonly>
                                    
                                  </div>
                                </div>

                                          <!--  -->
                                <div class="col-sm-6">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>ฝ่ายบุคคลที่ดูแล</label>
                                    <input type="text" id="form_humane_resources_approve"name="form_humane_resources_approve"class="form-control" name="from_humane_resources_approve" value="<?php echo $user_humane_resources_approve; ?>"readonly>
                                    
                                  </div>
                                </div>

                                <!--  -->
                                <div class="col-sm-12">
                                <!-- text input -->
                                <div class="form-group">
                                  
                                    <input type="file" id="file_upload" name="file_upload" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                          
                                    </div>
                                </div>
                                          
                                
                                
                                
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-block">ส่งคำขอการลา</button>
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
<script>
                                      $(document).ready(function(){
                                        $('#form_range_time').on('change',function(){
                                          
                                        if($(this).val() === "3"){
                                          $('#form_time_start').val('').hide();
                                          $('#form_time_end').val('').hide();
                                          $('#lable_time_start').val('').hide();
                                          $('#lable_time_end').val('').hide();
                                        }else{
                                     
                                          $('#form_time_start').show();
                                          $('#form_time_end').show();
                                          $('#lable_time_start').show();
                                          $('#lable_time_end').show();
                                        }
                                        });
                                      });
</script>


<script type="text/javascript">
           


          function senddate() {
            var date_start =document.getElementById("form_date_start").value;
            var date_end =document.getElementById("form_date_end").value;
            var eleave_type =document.getElementById("form_eleave_type").value;
            /* var range_time =document.getElementById("form_range_time").value; */
            
              //เวลา
            var time_start =document.getElementById("form_time_start").value;
            var time_end =document.getElementById("form_time_end").value;
            var fulldate1=date_start+':'+time_start;
            var fulldate2=date_end+':'+time_end;
            /* window.write(fulldate1); */

            //วันที่ ที่รวมเวลา
            //
            date1 = new Date(fulldate1);
            date2 = new Date(fulldate2);
           

            //วันที่อย่างเดียว
            date_small1 = new Date(date_start);
            date_small2 = new Date(date_end);
            //วันที่ปัจจุบัน
            
            date_now_new_old = new Date();
            
            //คิดวัน
            var day="วัน";
            var one_day = 1000*60*60*24;
            var diffDate = (date_small2.getTime() - date_small1.getTime()) / one_day
            
            //คิดชั่วโมง
            var hour="ชั่วโมง";
            var onehour= 1000*60*60;
            var diffhour = (date2.getHours() - date1.getHours()) /* / onehour */

            //คิดนาที
            var minuter="นาที";
            var oneminuter= 1000*60;
            var diffminuter = Math.floor((date2.getMinutes() - date1.getMinutes()) /* /oneminuter */) /* / oneminuter */


            ///ฟังชั่น Formatdate
            function formatDate(date) {
              var d = new Date(date),
                  month = '' + (d.getMonth() + 1),
                  day = '' + d.getDate(),
                  year = d.getFullYear();

              if (month.length < 2) month = '0' + month;
              if (day.length < 2) day = '0' + day;

              return [year, month, day].join('-');
            }
            //เปลี่ยนFormetdate ของวันที่ปัจจุบัน
            date_now_new=formatDate(date_now_new_old) ;
            date_now_new_now = new Date(date_now_new);
            //นำวันที่ปัจจุบัน-วันที่เริ่มลา
            var defDate_number_inform = (date_small1.getTime() - date_now_new_now.getTime()) / one_day
            //นำวันที่ปัจจุบัน-วันที่ลาจบ
            var defDate_end_eleave_finish = (date_small2.getTime() - date_now_new_now.getTime()) / one_day
            //เงือนไขคำนวณประเภทการลา
            if(eleave_type =="0" && defDate_number_inform <"2" ){//เช็คประเภทการลา และ วันที่เริ่มลา
              alert("ลากิจต้องลาล่วงหน้าอย่างน้อย 3 วัน วันที่แจ้งของคุณที่เลือก"+defDate_number_inform+"วัน"); //หลังจากเข้าเงื่อนไขให้ Alert ออกมา
                window.location.reload();//และหลังจากแจ้งเตือนแล้วทำการโหลดหน้าเพจใหม่
              
              
            }
            else if(eleave_type =="1" && defDate_end_eleave_finish >"1" ){//เช็คประเภทการลา และ วันที่เริ่มลา
              alert("ลาป่วยต้องลาหลังจากจบการลาแล้ว 1 วัน วันที่แจ้งของคุณที่เลือก"+defDate_end_eleave_finish+"วัน"); //หลังจากเข้าเงื่อนไขให้ Alert ออกมา
                window.location.reload();//และหลังจากแจ้งเตือนแล้วทำการโหลดหน้าเพจใหม่
              
              
            } //ต่อเงือนไขถัดไปตรงนี้ รอให้นิ่งก่อนค่อยต่อเงื่อนไข
            var separator=' ';
            //รวมแสดงใน TEXT.BOX
            document.getElementById("form_number_time_eleave").value =diffDate+separator+day+separator+diffhour+separator+hour+separator+diffminuter+separator+minuter;
            //Style ใส่สีให้กับTEXTในกล่องที่แสดงผล
            document.getElementById("form_number_time_eleave").style.color = "#FF0000";
            
             
}
        </script>
</html>
