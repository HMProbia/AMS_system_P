
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>View Eleave HR Approve </title>
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
            <h1 class="m-0">View Eleave HR Approve   </h1>
          
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
                  ฝ่ายบุคคลโปรดตรวจสอบข้อมูลการลาเพื่ออนุมัติการลางาน
                </h3>
              </div>
              
              <div class="card-body pad table-responsive">
              <form action="<?php echo base_url('index.php/eleave/export_eleave_data_excel'); ?>" method="post" enctype="multipart/form-data" >
                <div class="row">
                    <!-- 1 -->
                    <div class="col-sm-2">
                    <div class="form-group">
                        <label>ประเภทการลา</label>
                        <select class="form-control select2bs4"  name ="form_eleave_type" id="form_eleave_type" style="width: 100%;">
                            <option selected="selected" value=""></option>
                            <?php 
                               
                                    $sql = "SELECT ELEAVE_TYPE_ID,ELEAVE_TYPE_NAME FROM ELEAVE_TYPE WHERE IS_APPROVE='1'";
                                    $query = $this->db->query($sql)->result();
                                    foreach($query as $row){
                                        $eleave_id  = $row->ELEAVE_TYPE_ID;
                                        $eleave_name = $row->ELEAVE_TYPE_NAME;
                                ?>
                                    <option value="<?php echo $eleave_id; ?>" ><?php echo $eleave_name; ?></option>
                                <?php  } ?>
                        </select>
                        </div>

                        
                    </div>
                    <!-- /1 -->
<?php 
$user_level =$this->session->userdata("USER_LEVEL");

?>
                   <!--  <?php 
                    if($user_level = "0" OR $user_level ="1" OR $user_level ="2" OR $user_level ="3"){
                    
                        ?> -->
                    
                    
                    
                    
                
                    <!-- 2 -->
                    <div class="col-sm-2">
                    <div class="form-group">
                    
                        <label>บริษัท</label>
                        <select class="form-control select2bs4"  name ="form_company_name"id="form_company_name" style="width: 100%;">
                            <option selected="selected"></option>
                            <option value="Benz Talingchan Co., Ltd.">Benz Talingchan Co., Ltd.</option>
                            <option value="ATTA Autohaus Co., Ltd.">ATTA Autohaus Co., Ltd.</option>
                            
                        </select>
                        
                        </div>
                        
                    </div>
                    <!-- /2 -->
                     <!-- <?php }?> -->
                              <!--  -->
                              <div class="col-sm-2">
                              <!-- text input -->
                                <div class="form-group">
                                  <label>วันที่เริ่ม</label>
                                  <input type="date" name="form_date_start" id="form_date_start"class="form-control">
                                  
                                </div>
                              </div>

                              <!--  -->
                              <div class="col-sm-2">
                              <!-- text input -->
                                <div class="form-group">
                                  <label>วันที่จบ</label>
                                  <input type="date" name="form_date_end" id="form_date_end"class="form-control">
                                  
                                </div>
                              </div>

                              <!-- 3 -->
                              <div class="col-sm-2">
                                <div class="form-group">
                                    <label>รหัสลางาน</label>
                                    <input class="form-control" type="text" name="form_eleave_id" id="form_eleave_id"  placeholder="กรอก id ลางาน" />
                                    
                                </div>
                                    
                            </div>

  
                                <!-- 3 -->
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>ค้นหาชื่อ</label>
                                    <input class="form-control" type="text" name="name" id="name"  placeholder="ชื่อ" />
                                    
                                </div>
                                    
                            </div>
                                    <!-- /3 -->

                        
                        
                      
                      </div>

                      </form>    
                      <div class="row">
                          <div class="col-sm-3">
                                    <div class="form-group"><BR>
                                    <a href="<?= site_url(); ?>/eleave/eleave_load_view_export_hr_excel"><button class="form-control" type='submit' ><font color ="#FFFFFF">Export Excel HR Oder</font></button></a>
                                        
                                    </div>
                                </div>

                                <!-- <div class="col-sm-2">
                                    <div class="form-group"><BR>
                                        <button class="form-control" type='submit' ><font color ="#FFFFFF">Export Excel</font></button>
                                        
                                    </div>
                                </div> -->
                      </div>
                      <div class="card text-white bg-warning ">
                      <table id="eleave_status_list" class=" table   table-bordered    " width ="100%" >
                 
                        <thead>
                            <tr>
                              <th bgcolor="#000000" width="10" style="margin: 3px; padding: 3px; text-align: center" ><font color ="#FFFFFF">ลำดับ</font></th>
                              <th bgcolor="#000000"width="90" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF">ชื่อ</font></th>
                              <th bgcolor="#000000"width="90" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF">นามสกุล</font></th>
                              <th bgcolor="#000000"width="80" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF">รหัสพนักงาน</font></th>
                              <th bgcolor="#000000"width="100" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF">ประเภทการลา</font></th>
                              <th bgcolor="#000000"width="80" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF">วันเริ่มลา</font></th>
                              <th bgcolor="#000000"width="80" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF">วันจบลา</font></th>
                              <th bgcolor="#000000"width="80" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF">ช่วงเวลาที่ลา</font></th>
                              <th bgcolor="#000000"width="80" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF">จำนวนวันที่ลา</font></th>
                              <th bgcolor="#000000"width="80" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF">สถานะ</font></th>
                              <th bgcolor="#000000"width="130" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF">เปลี่ยนสถานะอนุมัติ</font></th>
                              
                            </tr>
                            
                              
                            

                        </thead>
                        <tbody>
                        </tbody>
                    </table>
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

  <script type="text/javascript"> 
    //
    $(document).ready(function(){
	   	var userDataTable = $('#eleave_status_list').DataTable({
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
	      	//'searching': false, // Remove default Search Control
          "createdRow": function( row, data, dataIndex ) {
                    $(row).addClass('red');
                  },
	      	ajax: {
	          url:'<?php echo site_url('eleave/eleave_hr_approve_load_data_content'); ?>',
	          data: function(data){
	          		data.search_eleave_type = $('#form_eleave_type').val();
	          		data.searchcompany_name = $('#form_company_name').val();
	          		data.searchname = $('#name').val();
                data.searchudate_start = $('#form_date_start').val();
	          		data.searchdate_end = $('#form_date_end').val();
	          		data.searcheleave_id = $('#form_eleave_id').val();
            
	          }
	      	},
	      	'columns': [
	         	{ data: 'ELEAVE_ID',
                          render: function (data,type,row){
                         var eleave_id = '<center><font color ="#ffffff">' + data + '</font> </center>';
                                 return eleave_id;
                               } },
	         	{ data: 'ELEAVE_NAME',
                          render: function (data,type,row){
                         var eleave_name = '<center><font color ="#ffffff">' + data + '</font> </center>';
                                 return eleave_name;
                               }},
                { data: 'ELEAVE_SURNAME',
                          render: function (data,type,row){
                         var eleave_surname = '<center><font color ="#ffffff">' + data + '</font> </center>';
                                 return eleave_surname;
                               }},
	         	{ data: 'ELEAVE_EMP_ID',
                          render: function (data,type,row){
                         var eleave_imp_id = '<center><font color ="#ffffff">' + data + '</font> </center>';
                                 return eleave_imp_id;
                               } },
	         	{ data: 'ELEAVE_TYPE_NAME',
                          render: function (data,type,row){
                         var eleave_type_name = '<center><font color ="#ffffff">' + data + '</font> </center>';
                                 return eleave_type_name;
                               } },
	         	{ data: 'ELEAVE_DATE_START',
                          render: function (data,type,row){
                         var eleave_date_start = '<center><font color ="#ffffff">' + data + '</font> </center>';
                                 return eleave_date_start;
                               }},
                { data: 'ELEAVE_DATE_END',
                          render: function (data,type,row){
                         var eleave_date_end = '<center><font color ="#ffffff">' + data + '</font> </center>';
                                 return eleave_date_end;
                               }},
                { data: 'ELEAVE_RANGE_TIME',
                    render: function (data,type,row){
                       /* var eleave_number = '<center><font color ="#ffffff">' + data + '</font> </center>'; */
                            var morning = '<center><font color ="#ffffff">ช่วงเช้า</font> </center>';
                            var afternoon = '<center><font color ="#ffffff">ช่วงบ่าย</font> </center>';
                            var fullday = '<center><font color ="#ffffff">เต็มวัน</font> </center>';
                            var nan='<center><font color ="#ffffff">ไม่ได้ระบุ</font> </center>';
                                                    if (row.ELEAVE_RANGE_TIME == 1) {
                                                        return morning;
                                                        }
                                                    else if (row.ELEAVE_RANGE_TIME == 2) {
                                                        return afternoon;
                                                        }
                                                    else if (row.ELEAVE_RANGE_TIME == 3) {
                                                        return fullday;
                                                        }
                                                    else return nan;
                               } },
            { data: 'ELEAVE_NUMBER',
                          render: function (data,type,row){
                            var eleave_munber = '<center><font color ="#ffffff">' + data + '</font> </center>';
                                    return eleave_munber;
                                  }},
            { data: 'ELEAVE_STATUS',
                    render: function (data,type,row){
                       /* var eleave_number = '<center><font color ="#ffffff">' + data + '</font> </center>'; */
                            var send_request = '<center><font color ="#ffffff">ส่งคำร้องแล้ว</font> </center>';
                            var managerapp = '<center><font color ="#ffffff">ผู้จัดการอนุมัติแล้ว</font> </center>';
                            var hrapp = '<center><font color ="#ffffff">ฝ่ายบุคคลอนุมัติแล้ว</font> </center>';
                            var request_sussess='<center><font color ="#ffffff">คำขออนุมัติแล้ว</font> </center>';
                            var return0 ='<center><font color ="#ffffff">ไม่อนุมัติ</font> </center>';
                            var nan='<center><font color ="#ffffff">ไม่ระบุ</font> </center>';
                                                    if (row.ELEAVE_STATUS == 0) {
                                                        return send_request;
                                                        }
                                                    else if (row.ELEAVE_STATUS == 1) {
                                                        return managerapp;
                                                        }
                                                    else if (row.ELEAVE_STATUS == 2) {
                                                        return hrapp;
                                                        }
                                                    else if (row.ELEAVE_STATUS == 3) {
                                                        return request_sussess;
                                                        }
                                                    else if (row.ELEAVE_STATUS == 4) {
                                                        return return0;
                                                        }
                                                     return nan;
                                                  }},
            { data: 'ELEAVE_ID',
                          render: function (data,type,row){
                            var view = '<a href="<?php echo site_url() ?>/eleave/eleave_view_edit_status_hr_approve/' + data + '" ><center><img src="<?php echo base_url('img') ?>/Allimg/icon_check.png" > </center></a>';
                                    return view;
                                  } },
            

          
	      	]
	   	});
       
	   	$('#form_eleave_type,#form_company_name,#form_date_start,#form_date_end,#form_eleave_id').change(function(){
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


 
