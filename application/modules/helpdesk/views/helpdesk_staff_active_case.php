
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>View Helpdesk Data Status Staff</title>
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
            <h1 class="m-0">View Helpdesk Data Status Staff</h1>
          
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
                  เจ้าหน้าที่ตรวจสอบใบงาน
                </h3>
              </div>
              
              <div class="card-body pad table-responsive">
              <form action="<?php echo base_url('index.php/eleave/export_eleave_data_excel'); ?>" method="post" enctype="multipart/form-data" >
                <div class="row">
                
                    
                <!-- 3 -->
                <div class="col-sm-2">
                                <div class="form-group">
                                    <label>รหัสใบงาน</label>
                                    <input class="form-control" type="text" name="form_helpdesk_s_id" id="form_helpdesk_s_id"  placeholder="กรอก id ใบงาน" />
                                    
                                </div>
                                    
                            </div>
                                    <!-- /3 -->

                    <!-- 1 -->
                    <div class="col-sm-2">
                    <div class="form-group">
                        <label>หมวดใบงาน</label>
                        <select class="form-control select2bs4"  name ="form_helpdesk_type_id" id="form_helpdesk_type_id" style="width: 100%;">
                            <option selected="selected" value=""></option>
                            <?php 
                               
                                    $sql = "SELECT HELPDESK_TYPE_ID,HELPDESK_TYPE_NAME FROM HELPDESK_TYPE_CASE WHERE HELPDESK_TYPE_IS_APPROVE='1'";
                                    $query = $this->db->query($sql)->result();
                                    foreach($query as $row){
                                        $helpdesk_type_id  = $row->HELPDESK_TYPE_ID;
                                        $helpdesk_type_name = $row->HELPDESK_TYPE_NAME;
                                ?>
                                    <option value="<?php echo $helpdesk_type_id; ?>" ><?php echo $helpdesk_type_name; ?></option>
                                <?php  } ?>
                        </select>
                        </div>

                        
                    </div>
                    <!-- /1 -->

                  
                    
                    
                    
                    
                
                    <!-- 2 -->
                    <div class="col-sm-2">
                    <div class="form-group">
                    
                        <label>บริษัท</label>
                        <select class="form-control select2bs4"  name ="form_company_name"id="form_company_name" style="width: 100%;">
                            <option selected="selected"></option>
                            <option value="1">Benz Talingchan Co., Ltd.</option>
                            <option value="2">ATTA Autohaus Co., Ltd.</option>
                            
                        </select>
                        
                        </div>
                        
                    </div>
                    <!-- /2 -->
                    
                              <!--  -->
                              <div class="col-sm-2">
                              <!-- text input -->
                                <div class="form-group">
                                  <label>วันที่ส่งเคส</label>
                                  <input type="date" name="form_date_to_send" id="form_date_to_send"class="form-control">
                                </div>
                              </div>


                              <!-- 2 -->
                    <div class="col-sm-2">
                    <div class="form-group">
                    
                        <label>สถานะใบงาน</label>
                        <select class="form-control select2bs4"  name ="form_helpdesk_status"id="form_helpdesk_status" style="width: 100%;">
                            <option value=" "selected="selected"></option>
                            <option value="0">ใบงานถูกยกเลิก</option>
                            <option value="1">ส่งข้อมูลใบงานแล้ว</option>
                            <option value="2">กำลังดำเนินการ...</option>
                            <option value="3">มีการส่งเรื่องต่อ</option>
                            <option value="4">เสร็จสิ้น</option>
                            
                        </select>
                        
                        </div>
                        
                    </div>
                    <!-- /2 -->

                                

                                    

                        
                        </form>
                        

                            
                            
                      
                      </div>
                      
                      
                      <div class="card text-white bg-warning ">
                      <table id="helpdesk_status_list" class=" table   table-bordered    " width ="100%" >
                 
                        <thead>
                            <tr>
                            
                              <th bgcolor="#000000" width="10" style="margin: 3px; padding: 3px; text-align: center" ><font color ="#FFFFFF">รหัสใบงาน</font></th>
                              <th bgcolor="#000000"width="90" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF">ประเภท</font></th>
                              <th bgcolor="#000000"width="80" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF">วันที่ส่งคำขอ</font></th>
                              <th bgcolor="#000000"width="80" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF">ชื่อผู้ส่ง</font></th>
                              <th bgcolor="#000000"width="80" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF">นามสกุลผู้ส่ง</font></th>
                              <th bgcolor="#000000"width="150" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF">หัวข้อ</font></th>
                              <th bgcolor="#000000"width="80" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF">ผู้รับงาน</font></th>
                              <th bgcolor="#000000"width="80" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF">ตรวจสอบข้อมูล</font></th>
                              <th bgcolor="#000000"width="110" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF">สถานะใบงาน</font></th>
                              


                             
                              
                            </tr>
                            
                              
                            

                        </thead>
                        <tbody>
                        </tbody>
                        <tr>
                         
                         <!--  <td bgcolor="#000000"width="150" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF"><?php echo "ลากิจ"; ?></font></td>
                          <td bgcolor="#000000"width="200" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF"><?php echo $all_eleave_conem_number_score; ?></font></td>
                          <td bgcolor="#000000"width="150" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF"><?php echo "ลากิจ"; ?></font></td>
                          <td bgcolor="#000000"width="200" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF"><?php echo $all_eleave_conem_number_score; ?></font></td>
                          <td bgcolor="#000000"width="150" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF"><?php echo "ลากิจ"; ?></font></td>
                          <td bgcolor="#000000"width="200" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF"><?php echo $all_eleave_conem_number_score; ?></font></td>
                          <td bgcolor="#000000"width="150" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF"><?php echo "ลากิจ"; ?></font></td>
                          <td bgcolor="#000000"width="200" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF"><?php echo $all_eleave_conem_number_score; ?></font></td>
                          <td bgcolor="#000000"width="150" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF"><?php echo "ลากิจ"; ?></font></td>
                          <td bgcolor="#000000"width="200" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF"><?php echo $all_eleave_conem_number_score; ?></font></td>
                          <td bgcolor="#000000"width="150" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF"><?php echo "ลากิจ"; ?></font></td> -->
                          

                      </tr>
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
	   	var userDataTable = $('#helpdesk_status_list').DataTable({
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
	      	//'searching': false, // Remove default Search Control
          "createdRow": function( row, data, dataIndex ) {
                    $(row).addClass('red');
                  },
	      	ajax: {
	          url:'<?php echo site_url('helpdesk/ajax_search_data_staff_approve_status_cases'); ?>',
	          data: function(data){
	          		data.search_helpdesk_s_id = $('#form_helpdesk_s_id').val();
	          		data.search_helpdesk_type_id = $('#form_helpdesk_type_id').val();
	          		data.search_company_name = $('#form_company_name').val();
                data.search_date_to_send = $('#form_date_to_send').val();
                data.searchhelpdesk_status = $('#form_helpdesk_status').val();
                
                
                
	          }
	      	},
	      	'columns': [
	         	  
                
              { data: 'HELPDESK_S_ID',
                          render: function (data,type,row){
                         var helpdesk_s_id = '<center><font color ="#ffffff">' + data + '</font> </center>';
                                 return helpdesk_s_id;
                               } },
	         	  { data: 'HELPDESK_TYPE_ID',
                          render: function (data,type,row){
                         var question = '<center><font color ="#ffffff">สอบถาม/ตอบ</font> </center>';
                         var system_problem = '<center><font color ="#ffffff">แจ้งปัญหาระบบ</font> </center>';
                         var adjust_rights = '<center><font color ="#ffffff">แจ้งปรับสิทธิ</font> </center>';
                         var wrong = '<center><font color ="#ffffff">ผิดพลาด</font> </center>';

                                                        if (row.HELPDESK_TYPE_ID == 0) {
                                                        return question;
                                                        } else if (row.HELPDESK_TYPE_ID == 1) {
                                                        return system_problem;
                                                        } else if (row.HELPDESK_TYPE_ID == 2) {
                                                        return adjust_rights;
                                                        }
                                                        else return wrong;

                                 
                               } },
	         	  { data: 'HELPDESK_CASE_DATE_TO_SEND',
                          render: function (data,type,row){
                         var help_date_to_send = '<center><font color ="#ffffff">' + data + '</font> </center>';
                         var wrong = '<center><span class="badge badge-danger">ผิดพลาด</span></center>';
                                                        if (row.HELPDESK_CASE_DATE_TO_SEND == null) {
                                                        return wrong;
                                                        }
                                                        else return help_date_to_send;
                                 
                               }},
	         	  
	         	  { data: 'HELPDESK_NAME',
                          render: function (data,type,row){
                         var helpdesk_name = '<center><font color ="#ffffff">' + data + '</font> </center>';
                                 return helpdesk_name;
                               }},
              { data: 'HELPDESK_SURNAME' ,
                          render: function (data,type,row){
                         var helpdesk_surname = '<center><font color ="#ffffff">' + data + '</font> </center>';
                                 return helpdesk_surname;
                               }},
              { data: 'HELPDESK_SUPJECK',
                          render: function (data,type,row){
                         var helpdesk_supjeck = '<center><font color ="#ffffff">' + data + '</font> </center>';
                                 return helpdesk_supjeck;
                               }},
              { data: 'HELPDESK_USER_EMP_EMP_ID',
                          render: function (data,type,row){
                            var wait='<center><span class="badge badge-warning">โปรดรอเจ้าหน้าที่รับเคส</span></center>';
                            var separator=' ';
                            var data_helodesk_supjeck_test ='<center><span class="badge badge-success">'+row.HELPDESK_USER_GET_A_JOB_NAME+separator+row.HELPDESK_USER_GET_A_JOB_SURNAME+'</span></center>'
                            var helpdesk_supjeck = '<center><font color ="#ffffff">' + data + '</font> </center>';
                                
                                                                  if(row.HELPDESK_USER_EMP_EMP_ID == null){
                                                                    
                                                                    if(row.HELPDESK_USER_GET_A_JOB_NAME == null){
                                                                      if(row.HELPDESK_USER_GET_A_JOB_SURNAME == null){
                                                                        return wait;
                                                                      }
                                                                    }else  return data_helodesk_supjeck_test;
                                                                  }
                                                               
                               }},
                               
              { data: 'HELPDESK_S_ID',
                          render: function (data,type,row){
                         var helpdesk_case_status_cancle = '<center><span class="badge badge-danger">ใบงานถูกยกเลิก</span></center>';
                         var helpdesk_case_status_request_sent = '<center><span class="badge badge-primary">ส่งข้อมูลใบงานแล้ว</span></center>';
                         var helpdesk_case_status_is_progress = '<center><span class="badge badge-warning">In progress...</span></center>';
                         var helpdesk_case_status_forward = '<center><span class="badge badge-warning">มีการส่งเรื่องต่อ</span></center>';
                         var helpdesk_case_status_finshed = '<center><span class="badge badge-success">เสร็จสิ้น</span></center>';
                         var wrong = '<center><span class="badge badge-danger">ผิดพลาด</span></center>';

                        if(row.HELPDESK_CASE_STATUS_REQUEST_SENT == 1 && row.HELPDESK_CASE_STATUS_IS_PROGRESS == 0 )  { 
                        return helpdesk_case_status_request_sent;
                        } else if(row.HELPDESK_CASE_STATUS_REQUEST_SENTt == 1 && row.HELPDESK_CASE_STATUS_IS_PROGRESS == 1 && row.HELPDESK_CASE_STATUS_FORWARD == 0)  { 
                        return helpdesk_case_status_is_progress;
                        } else if(row.HELPDESK_CASE_STATUS_REQUEST_SENT == 1 && row.HELPDESK_CASE_STATUS_IS_PROGRESS == 1 && row.HELPDESK_CASE_STATUS_FORWARD == 0 && row.HELPDESK_CASE_STATUS_FINISHED == 0)  { 
                        return helpdesk_case_status_is_progress;
                        } else if(row.HELPDESK_CASE_STATUS_REQUEST_SENT == 1 && row.HELPDESK_CASE_STATUS_IS_PROGRESS == 1 && row.HELPDESK_CASE_STATUS_FORWARD == 1 && row.HELPDESK_CASE_STATUS_FINISHED == 0)  { 
                        return helpdesk_case_status_forward;
                        } else if(row.HELPDESK_CASE_STATUS_REQUEST_SENT == 1 && row.HELPDESK_CASE_STATUS_IS_PROGRESS == 1 && row.HELPDESK_CASE_STATUS_FORWARD == 0 || row.HELPDESK_CASE_STATUS_FORWARD == 1 && row.HELPDESK_CASE_STATUS_FINISHED == 1) {
                        return helpdesk_case_status_finshed;
                        }else if(row.HELPDESK_CASE_STATUS_CANCLE == 1) {
                        return helpdesk_case_status_cancle;
                        }else	return wrong;
                                                        
                                                        
                                 
                               }},
              { data: 'HELPDESK_S_ID',
                          render: function (data,type,row){
                            var view = '<a href="<?php echo site_url() ?>/helpdesk/helpdesk_staff_active_case_approve/' + data + '" ><center><img src="<?php echo base_url('img') ?>/Allimg/icon_check.png" > </center></a>';
                                    return view;
                                  }},

          
	      	]
	   	});

	   	$('#form_helpdesk_s_id,#form_helpdesk_type_id,#form_date_to_send,#form_company_name,#form_helpdesk_status   ').change(function(){
	   		userDataTable.draw();
	   	});
	   	$('#form_company_name').keyup(function(){
	   		userDataTable.draw();
	   	});
	});
  </script>
 <style>
  .red {
  background-color: #0C090A !important;
}

</style>

<script>
 
 $(document).on('click', '#button', function(){ 
    /* $("#button").data("sample-id"); */
    
    alert($("#button").data("sample-id"));
    
    console.log($("#button").data("sample-id"));
});

</script>


<!-- <script>




function sweet()
{ 
  
          let data=  $("#test").data("sample-id");
          
            console.log(data);
           
              //
             
          
          swal.fire({
                  title: "แจ้งเตือน !!",
                  
                  text: "คุณต้องการจะลบคำขอการลาลำดับที่ ",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "ตกลง, ฉันต้องการลบ !",
                  cancelButtonColor: "#3085d6",
                  cancelButtonText: 'ไม่, ฉันจะเก็บมันไว้ก่อน !',
                  closeOnConfirm: false }).then((result) => {
                if (result.isConfirmed) {
                 
                   $.ajax({
                    type: "POST",
                    url: "<?= base_url(); ?>index.php/eleave/eleave_delete/"+data,
                    data: data,
                    
                  });
                  //
                  Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                  )
                }
              })
}

 </script> -->

 
