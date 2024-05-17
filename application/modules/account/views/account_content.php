
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>permission_account</title>
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
            <h1 class="m-0">User list   </h1>
          
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
                  -ข้อมูลพนักงานทั้งหมด
                </h3>
              </div>
              
              <div class="card-body pad table-responsive">
                <div class="row">
                   <!-- 1 -->
                   <div class="col-sm-2">
                    <div class="form-group">
                        <label>บริษัท</label>
                        <select class="form-control select2bs4"  name ="form_company_name" id="form_company_name" style="width: 100%;">
                            
                            <option selected="selected"></option>
                            <option value="Benz Talingchan Co., Ltd.">Benz Talingchan Co., Ltd.</option>
                            <option value="ATTA Autohaus Co., Ltd.">ATTA Autohaus Co., Ltd.</option>
                        </select>
                        </div>

                        
                    </div>
                    <!-- /1 -->
                     <!-- 1 -->
                     <div class="col-sm-2">
                    <div class="form-group">
                        <label>สถานะ</label>
                        <select class="form-control select2bs4"  name ="form_user_status" id="form_user_status" style="width: 100%;">
                            <option selected="selected" value=""></option>
                            <?php 
                                
                                    $sql = "SELECT USER_STATUS_ID,USER_STATUS_NAME FROM  USER_STATUS WHERE IS_APPROVE='1'";
                                    $query = $this->db->query($sql)->result();
                                    foreach($query as $row){
                                        $user_status_id  = $row->USER_STATUS_ID;
                                        $user_status_name = $row->USER_STATUS_NAME;
                                ?>
                                    <option value="<?php echo $user_status_id; ?>" ><?php echo $user_status_name; ?></option>
                                <?php  } ?>
                        </select>
                        </div>

                        
                    </div>
                    <!-- /1 -->
                     <!-- 1 -->
                     <div class="col-sm-2">
                    <div class="form-group">
                        <label>ฝ่าย</label>
                        <select class="form-control select2bs4"  name ="user_department" id="user_department" style="width: 100%;">
                            <option selected="selected" value=""></option>
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
                    <!-- /1 -->
                     <!-- 1 -->
                     <div class="col-sm-2">
                    <div class="form-group">
                        <label>ตำแหน่ง</label>
                        <select class="form-control select2bs4"  name ="user_job_position" id="user_job_position" style="width: 100%;">
                            <option selected="selected" value=""></option>
                            <?php 
                                
                                    $sql = "SELECT JOB_POSITION_ID,JOB_POSITION_NAME FROM  JOB_POSITION_TYPE ";
                                    $query = $this->db->query($sql)->result();
                                    foreach($query as $row){
                                        $job_position_id  = $row->JOB_POSITION_ID;
                                        $job_position_name = $row->JOB_POSITION_NAME;
                                ?>
                                    <option value="<?php echo $job_position_name; ?>" ><?php echo $job_position_name; ?></option>
                                <?php  } ?>
                        </select>
                        </div>

                        
                    </div>
                    <!-- /1 -->
                    <!-- 3 -->
                    <div class="col-sm-2">
                            <div class="form-group">
                                <label>ค้นหาชื่อ</label>
                                <input class="form-control" type="text" name="name" id="name"  placeholder="ชื่อ" />
                                
                              </div>
                                
                      </div>
                      <!-- /3 -->
                  <div class="col-md-12">
                        <div class="card text-white bg-warning ">
                    <!-- ใส่เข้อมูล -->

                    <table id="account_list" class=" table   table-bordered    " width ="100%" >
                 
                        <thead>
                            <tr>
                              <th bgcolor="#000000" width="10" style="margin: 3px; padding: 3px; text-align: center" ><font color ="#FFFFFF">ลำดับ</font></th>
                              <th bgcolor="#000000"width="100" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF">รูปภาพ</font></th>
                              <th bgcolor="#000000"width="20" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF">รหัส</font></th>
                              <th bgcolor="#000000"width="80" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF">ฝ่าย</font></th>
                              <th bgcolor="#000000"width="80" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF">ตำแหน่ง</font></th>
                              <th bgcolor="#000000"width="80" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF">ชื่อ</font></th>
                              <th bgcolor="#000000"width="120" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF">นามสกุล</font></th>
                              <th bgcolor="#000000"width="170" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF">บริษัท</font></th>
                              <th bgcolor="#000000"width="60" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF">แก้ไข</font></th>
                              <th bgcolor="#000000"width="80" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF">ลบข้อมูล</font></th>
                              <th bgcolor="#000000"width="100" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF">แก้ไขรหัสผ่าน</font></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
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


        <script type="text/javascript"> 
    //
    $(document).ready(function(){
	   	var userDataTable = $('#account_list').DataTable({
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
	      	//'searching': false, // Remove default Search Control
          "createdRow": function( row, data, dataIndex ) {
                    $(row).addClass('red');
                  },
	      	ajax: {
	          url:'<?php echo site_url('account/account_content'); ?>',
	          data: function(data){
	                    data.searchuser_status = $('#form_user_status').val();
                      data.searchcompany_name = $('#form_company_name').val();
                      data.search_department = $('#user_department').val();
                      data.search_job_position = $('#user_job_position').val();
                      data.searchname = $('#name').val();
	          }
	      	},
	      	'columns': [
	         	{
                          data:'USER_ID',render: function (data,type,row){
                         var user_id = '<center><font color ="#ffffff">' + data + '</font> </center>';
                                 return user_id;
                               }
                        },
                        {
                          data:'IMAGE_PROFILE',render: function (data,type,row){
                            var img = '<img src="<?php echo base_url('upload/profile'); ?>/' + data + '" width="80" height="60">';
                                    return img;
                                  }
                        },

                        {
                          data:'EMP_ID',render: function (data,type,row){
                         var emp_id = '<center><font color ="#ffffff">' + data + '</font> </center>';
                                 return emp_id;
                               }
                        },

                        {
                          data:'DEPARTMENT',render: function (data,type,row){
                         var department = '<center><font color ="#ffffff">' + data + '</font> </center>';
                                 return department;
                               }
                        },

                        {
                          data:'JOB_POSITION',
                       
                       render: function (data,type,row){
                         var job_position = '<center><font color ="#ffffff">' + data + '</font> </center>';
                                 return job_position;
                               }
                        },

                        {
                          data:'NAME',
                       
                       render: function (data,type,row){
                         var name = '<center><font color ="#ffffff">' + data + '</font> </center>';
                                 return name;
                               }
                        
                        },

                        {
                          data:'SURNAME',
                       
                          render: function (data,type,row){
                            var surname = '<center><font color ="#ffffff">' + data + '</font> </center>';
                                    return surname;
                                  }
                        
                        },

                        {
                          data:'COMPANY_NAME',
                          render: function (data,type,row){
                            var company_name = '<center><font color ="#ffffff">' + data + '</font> </center>';
                                    return company_name;
                                  }
                        },



                        {
                          data:'USER_ID',
                          render: function (data,type,row){
                            var view = '<a href="<?php echo site_url() ?>/account/account_view/' + data + '" ><center><img src="<?php echo base_url('img') ?>/Allimg/icon_check.png" > </center></a>';
                                    return view;
                                  }

                        },
                        


                        


                        {
                          data:'USER_ID',
                          render: function (data,type,row){
                            var delete_user = '<a href="<?php echo site_url() ?>/account/account_delete/' + data + '" ><center><img src="<?php echo base_url('img') ?>/Allimg/icon_delete.png" > </center></a>';
                                    return delete_user;
                                  }

                        },


                        {
                          data:'USER_ID',
                          render: function (data,type,row){
                            var edit_password = '<a href="<?php echo site_url() ?>/account/account_edit_password/' + data + '" ><center><img src="<?php echo base_url('img') ?>/Allimg/lock.png" > </center></a>';
                                    return edit_password;
                                  }
                                  
                        },

          
	      	]
	   	});

	   	$('#form_user_status,#form_company_name,#user_department,#user_job_position').change(function(){
	   		userDataTable.draw();
	   	});
	   	$('#name').keyup(function(){
	   		userDataTable.draw();
	   	});
	});
  </script>
 <style>
  .red {
  background-color: #0C090A !important;
}

</style>






<style>
  .red {
  background-color: #0C090A !important;
}

</style>



</html>
