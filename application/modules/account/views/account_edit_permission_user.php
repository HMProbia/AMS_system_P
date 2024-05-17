
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Permission User</title>
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
            <h1 class="m-0">Edit Profile Permission User</h1>
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
                    <form action="<?=site_url('account/account_edit_permission_edit_user_level')?>" method="post" enctype="multipart/form-data" >
                        <img src="<?php echo base_url('upload/profile'); ?>/<?php echo $user_image_profile; ?>"  width="250" high="150" alt="User Avatar" class="  rounded-circle"></div>
                       
                        
                        <BR>
                            <div class="row">
                            <!--  -->
                            <div class="col-sm-2">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>ลำดับที่</label>
                                    <input type="text" name="form_user_id"class="form-control"  style="text-align:center;" value="<?php echo $user_id; ?>"readonly >
                                    
                                  </div>
                                </div>
                                
                              



                                <!--  -->
                                <div class="col-sm-3">
                                  <!-- text input -->
                                  <div class="form-group">
                                    <label>รหัสพนักงาน</label>
                                    <input type="text" class="form-control" id="from_emp" name="from_emp" style="text-align:center;" value="<?php echo $user_emp_id; ?>"disabled>
                                    
                                  </div>
                                </div>
                                
                                <!--  -->
                                <div class="col-sm-3">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>ชื่อ</label>
                                    <input type="text" class="form-control" name="from_name" style="text-align:center;"  value="<?php echo $user_name; ?>"disabled>
                                  
                                  </div>
                                </div>



                                <!--  -->
                                <div class="col-sm-4">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>นามสกุล</label>
                                    <input type="text" class="form-control" name="from_surname" style="text-align:center;"  value="<?php echo $user_surname; ?>"disabled>
                                    
                                  </div>
                                </div>

                                        <!--  -->
                                <div class="col-sm-6">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>ฝ่าย</label>
                                    
                                    <input type="text" name="from_phone"class="form-control" value="<?php echo $user_department; ?>"disabled>
                                  </div>
                                </div>

                                        <!--  -->
                                <div class="col-sm-6">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>ตำแหน่ง</label>
                                    <input type="text" name="from_phone"class="form-control" value="<?php echo $user_job_prosition; ?>"disabled>
                                    
                                  
                                  </div>
                                </div>
                               
                                        <!--  -->
                                <div class="col-sm-6">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>สังกัด</label>
                                    
                                    <input type="text" name="from_phone"class="form-control" value="<?php echo $user_company_name; ?>"disabled>
                                  
                                </select>
                                  </div>
                                </div>

                                        <!--  -->
                                <div class="col-sm-6">
                                <!-- text input -->
                                  <div class="form-group">
                                    <label>เบอร์โทร</label>
                                    <input type="text" name="from_phone"class="form-control" value="<?php echo $user_phone; ?>"disabled>
                                    
                                  </div>
                                </div>
                                </div>
                        <div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title" >สิทธิเข้าใช้งานเมนู</h3>
                                
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
                            <div class="table-responsive">
                      <table id="permisstion_list_menu" class=" table   table-bordered    " width ="100%" >
                      <tr>
                              <th bgcolor="#0000FF" width="10" style="margin: 3px; padding: 3px; text-align: center" ><font color ="#FFFFFF">ลำดับหลัก/รอง</font></th>
                              <th bgcolor="#0000CD"width="60" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF">ชื่อเมนูหลัก</font></th>
                              <th bgcolor="#0000CD"width="20" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF">ชื่อเมนูรอง</font></th>
                              <th bgcolor="#0000FF"width="50" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF">อนุญาติให้ใช้งาน</font></th>
                              
                            </tr>
                      
                        <?php //ไว้ทำไดนามิกเมนู 
                                $sql1="SELECT *FROM MODULES_MAIN_MENU WHERE IS_APPROVE = '1' ";
                                $query1 = $this->db->query($sql1)->result();
                                                          foreach($query1 as $row){
                                                              $main_menu_id  = $row->M_ID;
                                                              $main_menu_name = $row->MENU_NAME;
                                                              
                                
                        ?>
                              
                              <?php
                              //สิทธิเมนู
                                $sql3="SELECT PERMISSTION_M_ID FROM USER_PERMISSTION_MENU_MAIN WHERE EMP_ID_PERMISSTION ='$user_emp_id' ";
                                $query3 = $this->db->query($sql3)->row();  
                                $permisstion_m_id = @$query3->PERMISSTION_M_ID;;
                               $permisstion_m_id_sheck = explode(",", $permisstion_m_id);
             
                                ?> 
                      

                        <tr>                              
                          <td bgcolor="#000000"width="20" style="margin: 3px; padding: 3px; text-align: center">&nbsp;&nbsp;<font color ="#FFFFFF"><?php echo  $main_menu_id ?></font>  </td>
                          <td bgcolor="#000000"width="20" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF"><?php echo  $main_menu_name ?></font>  </td>
                          <td bgcolor="#000000"width="20" style="margin: 3px; padding: 3px; text-align: center"> </td> 
                          <td  bgcolor="#000000"width="20" style="margin: 3px; padding: 3px; text-align: center"><input  class="form-check-input" type="checkbox"id ="items1[]"name="items1[]" value="<?php echo $main_menu_id; ?>"<?php 
                            
                              if(in_array($main_menu_id, $permisstion_m_id_sheck)){
                                $explode_mainmenu = explode(",", $main_menu_id);
                                $check = "checked";
                                echo  $check;
                              ?>> อนุญาติ </td> 
                          <?php } ?>
                        </tr>
                        <?php
                              $sql2="SELECT *FROM MODULES_MAIN_SUBMENU WHERE IS_APPROVE = '1' ";
                              $query2 = $this->db->query($sql2)->result();
                                    foreach($query2 as $row){
                                    $main_submenu_main_in_sub_id  = $row->M_ID;
                                    $main_submenu_sub_id  = $row->SUB_ID;
                                    $main_submenu_name = $row->MENU_NAME;
                                    
                                                          
                                    
                              ?>
                              
                              
                              <?php if($main_menu_id == $main_submenu_main_in_sub_id){?>
                                
                                
                        <tr>                              
                                <td align="left" style="margin: 3px; padding: 3px; background-color: #000000;" colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color ="#FFFFFF"><?php echo  $main_menu_id ?>,<?php echo  $main_submenu_sub_id ?></font>  </td>
                                <td bgcolor="#000000"width="20" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF"><?php echo  $main_submenu_name ?></font>  </td>
                               
                            
                              <?php
                               
                               $sql3="SELECT PERMISSTION_M_ID,PERMISSTION_S_ID FROM USER_PERMISSTION_MENU_MAIN WHERE EMP_ID_PERMISSTION ='$user_emp_id' ";
                               $query3 = $this->db->query($sql3)->row();  
                               $permisstion_s_id = @$query3->PERMISSTION_S_ID;
                               $permisstion_s_id_sheck = explode(",", $permisstion_s_id);
             
                                ?> 
                                
                                <td  bgcolor="#000000"width="20" style="margin: 3px; padding: 3px; text-align: center"><input  class="form-check-input" type="checkbox" id ="items2[]"name="items2[]" value="<?php echo $main_submenu_sub_id;?>"<?php
                               
                                if(in_array($main_submenu_sub_id, $permisstion_s_id_sheck)){
                               $explode_submenu = explode(",", $main_submenu_sub_id);
                               $check2 = "checked";
                               echo  $check2;
                                  
                                
                                ?> > อนุญาติ </td>
                                 <?php } ?> 
                              
                                 
                        </tr> 
                        
                         
                      

                         
                        
                        
                        
                      <?php } ?>
                   <?php } ?>
                <?php } ?>   
                    </table>
                                    
                                  
                    </div>
							  </div>
              </div>
                                
							
							




                                
                        </form>
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
                                  <button type="button" class="btn btn-block btn-success"  onclick="onSave()">เปลี่ยนแปลงสิทธิ</button>
                                  </div>
                                </div>
                                <!--  -->
                            </div>
                 
                   
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
<script>
function onSave(){
     var items1_send = [];
     var items2_send = [];
     
     
     
	 $("input[name='items1[]']:checked").each(function() {
    items1_send.push($(this).val());
	 });
	 
	 $("input[name='items2[]']:checked").each(function() {
    items2_send.push($(this).val());
	 });
   
 	var pmeters = 'items1_send='+items1_send+'&items2_send='+items2_send+'&from_emp=' + $("#from_emp").val();
  /*  var pmeters = 'item_r='+item_r+'&item_rw='+item_rw+'&temp_name='+temp_name; */
	pmeters = pmeters.replace("undefined", ""); 
	
  	$.ajax({
		type: "POST",
		url: "<?php echo site_url('account/account_edit_permisstion_pro_sent_to_db'); ?>",
		data: pmeters,
		success: function(resPonse){
			alert("บันทึกข้อมูลเรียบร้อยแล้ว");
			window.location = "<?php echo site_url('account/account_edit_permission'); ?>";
		}
	});
}
</script>