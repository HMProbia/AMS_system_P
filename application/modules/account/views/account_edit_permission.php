
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
            <h1 class="m-0">EDIT PERMISSION ACCOUNT   </h1>
          
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
                  กรุณาเลือกค้นหาพนักงานเพื่อตรวจสอบสิทธิและแก้ไข
                </h3>
              </div>
              
              <div class="card-body pad table-responsive">
                <div class="row">
                    

                    <!-- 2 -->
                    <div class="col-sm-2">
                    <div class="form-group">
                        <label>บริษัท</label>
                        <select class="form-control select2bs4"  name ="company_name"id="company_name" style="width: 100%;">
                            <option selected="selected"></option>
                            <option value="Benz Talingchan Co., Ltd.">Benz Talingchan Co., Ltd.</option>
                            <option value="ATTA Autohaus Co., Ltd.">ATTA Autohaus Co., Ltd.</option>
                            
                        </select>
                        
                        </div>
                        
                    </div>
              <!-- /2 -->

                      <!-- 3 -->
                      <div class="col-sm-2">
                            <div class="form-group">
                                <label>ค้นหาชื่อ</label>
                                <input class="form-control" type="text" name="name" id="name"  placeholder="ชื่อ" />
                                
                              </div>
                                
                      </div>
                      <!-- /3 -->
                      <div class="col-sm-1">
                            <div class="form-group"><BR>
                     <!--  <button class="form-control"name="btnSearch" id="btnSearch" value="ค้นหา"  onclick="onSearch()">ค้นหา</button> -->
                      
                      </div>
                                
                      </div>
                      
                      </div>
                      <div class="card text-white bg-warning ">
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
                              <th bgcolor="#000000"width="130" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF">บริษัท</font></th>
                              <th bgcolor="#000000"width="80" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF">แก้ไขสิทธิ</font></th>
                            </tr>
                            
                              
                            

                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                                    </div>
                      
                    
               
               <?php /* $useragent=$_SERVER['HTTP_USER_AGENT'];
               echo $useragent; */

               echo "PHP_SELF : " . $_SERVER['PHP_SELF'] . "<br />"; 
echo "GATEWAY_INTERFACE : " . $_SERVER['GATEWAY_INTERFACE'] . "<br />"; 
echo "SERVER_ADDR : " . $_SERVER['SERVER_ADDR'] . "<br />"; 
echo "SERVER_NAME : " . $_SERVER['SERVER_NAME'] . "<br />"; 
echo "SERVER_SOFTWARE : " . $_SERVER['SERVER_SOFTWARE'] . "<br />"; 
echo "SERVER_PROTOCOL : " . $_SERVER['SERVER_PROTOCOL'] . "<br />"; 
echo "REQUEST_METHOD : " . $_SERVER['REQUEST_METHOD'] . "<br />"; 
echo "REQUEST_TIME : " . $_SERVER['REQUEST_TIME'] . "<br />"; 
echo "REQUEST_TIME_FLOAT : " . $_SERVER['REQUEST_TIME_FLOAT'] . "<br />"; 
echo "QUERY_STRING : " . $_SERVER['QUERY_STRING'] . "<br />"; 
echo "DOCUMENT_ROOT : " . $_SERVER['DOCUMENT_ROOT'] . "<br />"; 
echo "HTTP_ACCEPT : " . $_SERVER['HTTP_ACCEPT'] . "<br />"; 
echo "HTTP_ACCEPT_ENCODING : " . $_SERVER['HTTP_ACCEPT_ENCODING'] . "<br />"; 
echo "HTTP_ACCEPT_LANGUAGE : " . $_SERVER['HTTP_ACCEPT_LANGUAGE'] . "<br />"; 
echo "HTTP_CONNECTION : " . $_SERVER['HTTP_CONNECTION'] . "<br />"; 
echo "HTTP_HOST : " . $_SERVER['HTTP_HOST'] . "<br />"; 
echo "HTTP_REFERER : " . $_SERVER['HTTP_REFERER'] . "<br />"; 
echo "HTTP_USER_AGENT : " . $_SERVER['HTTP_USER_AGENT'] . "<br />"; 
echo "REMOTE_ADDR : " . $_SERVER['REMOTE_ADDR'] . "<br />"; 
echo "REMOTE_PORT : " . $_SERVER['REMOTE_PORT'] . "<br />"; 
echo "SCRIPT_FILENAME : " . $_SERVER['SCRIPT_FILENAME'] . "<br />"; 
echo "SERVER_ADMIN : " . $_SERVER['SERVER_ADMIN'] . "<br />"; 
echo "SERVER_PORT : " . $_SERVER['SERVER_PORT'] . "<br />"; 
echo "SERVER_SIGNATURE : " . $_SERVER['SERVER_SIGNATURE'] . "<br />"; 
echo "PATH_TRANSLATED : " . $_SERVER['PATH_TRANSLATED'] . "<br />"; 
echo "SCRIPT_NAME : " . $_SERVER['SCRIPT_NAME'] . "<br />"; 
echo "REQUEST_URI : " . $_SERVER['REQUEST_URI'] . "<br />"; 
echo "PATH_INFO : " . $_SERVER['PATH_INFO'] . "<br />"; 

               ?> 
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
	          url:'<?php echo site_url('account/account_edit_permission_content'); ?>',
	          data: function(data){
	          		
	          		data.searchcompany_name = $('#company_name').val();
	          		data.searchname = $('#name').val();
	          }
	      	},
	      	'columns': [
	         	{ data: 'USER_ID',
                          render: function (data,type,row){
                         var user_id = '<center><font color ="#ffffff">' + data + '</font> </center>';
                                 return user_id;
                               } },
	         	{ data: 'IMAGE_PROFILE',render: function (data,type,row){
                            var img = '<img src="<?php echo base_url('upload/profile'); ?>/' + data + '" width="80" height="60">';
                                    return img;
                                  } },
	         	{ data: 'EMP_ID',
                          render: function (data,type,row){
                         var emp_id = '<center><font color ="#ffffff">' + data + '</font> </center>';
                                 return emp_id;
                               } },
	         	{ data: 'DEPARTMENT',
                          render: function (data,type,row){
                         var department = '<center><font color ="#ffffff">' + data + '</font> </center>';
                                 return department;
                               } },
	         	{ data: 'JOB_POSITION',
                       
                       render: function (data,type,row){
                         var job_position = '<center><font color ="#ffffff">' + data + '</font> </center>';
                                 return job_position;
                               } },
            { data: 'NAME',
                       
                       render: function (data,type,row){
                         var name = '<center><font color ="#ffffff">' + data + '</font> </center>';
                                 return name;
                               }
                         },
            { data: 'SURNAME',
                       
                       render: function (data,type,row){
                         var surname = '<center><font color ="#ffffff">' + data + '</font> </center>';
                                 return surname;
                               } },
            { data: 'COMPANY_NAME',
                          render: function (data,type,row){
                            var company_name = '<center><font color ="#ffffff">' + data + '</font> </center>';
                                    return company_name;
                                  } },
            
            { data: 'USER_ID',
                          render: function (data,type,row){
                            var view = '<a href="<?php echo site_url() ?>/account/account_edit_permission_edituser/' + data + '" ><center><img src="<?php echo base_url('img') ?>/Allimg/icon_check.png" > </center></a>';
                                    return view;
                                  } },

          
	      	]
	   	});

	   	$('#company_name').change(function(){
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


 
