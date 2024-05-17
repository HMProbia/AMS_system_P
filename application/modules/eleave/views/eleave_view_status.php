
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>View Eleave Data Status</title>
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
            <h1 class="m-0">View Eleave Data Status   </h1>
          
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
                  กรุณาเลือกค้นหาพนักงานเพื่อตรวจสอบสถานะการลา
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
                                    <!-- /3 -->

                                    <!-- 3 -->
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>ชื่อ</label>
                                    <input class="form-control" type="text" name="name" id="name"  placeholder="ชื่อ" />
                                    
                                </div>
                                    
                            </div>
                                    <!-- /3 -->

                        
                        </form>
                        

                            <div class="col-sm-2">
                                <div class="form-group"><BR>
                                    <button class="form-control" type='submit' ><font color ="#FFFFFF">Export Excel</font></button>
                                    
                                </div>
                            </div>
                            
                      
                      </div>
                      <div class="col-sm-2">
                                <div class="form-group"><BR>
                                <button class="form-control"><a href="<?= site_url(); ?>/eleave/eleave_add_data" ><font color ="#FFFFFF">เพิ่มข้อมูล</font></a></button>
                                    
                                </div>
                        </div>
                      
                      <div class="card text-white bg-warning ">
                      <table id="eleave_status_list" class=" table   table-bordered    " width ="100%" >
                 
                        <thead>
                            <tr>
                              <th bgcolor="#000000" width="10" style="margin: 3px; padding: 3px; text-align: center" ><font color ="#FFFFFF">ลำดับ</font></th>
                              <th bgcolor="#000000"width="60" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF">ประเภท</font></th>
                              <th bgcolor="#000000"width="80" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF">วันที่ส่งคำขอ</font></th>
                              <th bgcolor="#000000"width="80" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF">วันที่เริ่มลา</font></th>
                              <th bgcolor="#000000"width="80" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF">วันจบลา</font></th>
                              <th bgcolor="#000000"width="80" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF">ช่วงเวลา</font></th>
                              <th bgcolor="#000000"width="80" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF">จำนวนวันลา</font></th>
                              <th bgcolor="#000000"width="80" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF">ผู้จัดการอนุมัติ</font></th>
                              <th bgcolor="#000000"width="80" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF">ฝ่ายบุคคลอนุมัติ</font></th>
                              <th bgcolor="#000000"width="80" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF">ผู้บริหารอนุมัติ</font></th>
                              <th bgcolor="#000000"width="70" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF">แก้ไข</font></th>
                              <th bgcolor="#000000"width="70" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF">ลบข้อมูล</font></th>
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
	   	var userDataTable = $('#eleave_status_list').DataTable({
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
	      	//'searching': false, // Remove default Search Control
          "createdRow": function( row, data, dataIndex ) {
                    $(row).addClass('red');
                  },
	      	ajax: {
	          url:'<?php echo site_url('eleave/eleave_status_load_data_content'); ?>',
	          data: function(data){
	          		data.search_eleave_type = $('#form_eleave_type').val();
	          		data.searchcompany_name = $('#form_company_name').val();
	          		data.searcheleaveid = $('#form_eleave_id').val();
                data.searchname = $('#name').val();
                data.searchudate_start = $('#form_date_start').val();
	          		data.searchdate_end = $('#form_date_end').val();
	          		data.searcheleave_status = $('#form_eleave_status').val();
            
	          }
	      	},
	      	'columns': [
	         	{ data: 'ELEAVE_ID',
                          render: function (data,type,row){
                         var eleave_id = '<center><font color ="#ffffff">' + data + '</font> </center>';
                                 return eleave_id;
                               } },
	         	{ data: 'ELEAVE_TYPE_NAME',
                          render: function (data,type,row){
                         var eleave_type_name = '<center><font color ="#ffffff">' + data + '</font> </center>';
                                 return eleave_type_name;
                               } },
	         	{ data: 'ELEAVE_DATE_SEND_DATA',
                          render: function (data,type,row){
                         var eleave_date_send_data = '<center><font color ="#ffffff">' + data + '</font> </center>';
                                 return eleave_date_send_data;
                               }},
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
            { data: 'ELEAVE_MANAGER_APPROVE',
                          render: function (data,type,row){
                            var manager_approve_sus='<center><img src="<?php echo base_url('img') ?>/Allimg/Alarm4.gif" > </center>'
                            var manager_approve_wait='<center><img src="<?php echo base_url('img') ?>/Allimg/Alarm1.gif" > </center>'
                            var manager_approve_return='<center><img src="<?php echo base_url('img') ?>/Allimg/Alarm2.gif" > </center>'
                            var manager_approve_nan='<center><img src="<?php echo base_url('img') ?>/Allimg/loading.gif" > </center>'
                              if(row.ELEAVE_MANAGER_APPROVE == 1){
                                return manager_approve_sus;
                              }else if(row.ELEAVE_MANAGER_APPROVE == 0){
                                return manager_approve_wait;
                              }else if(row.ELEAVE_MANAGER_APPROVE == 2){
                                return manager_approve_return;
                              }
                                return manager_approve_wait;
                              
                                  }},
            { data: 'ELEAVE_HR_APPROVE',
                          render: function (data,type,row){
                            var hr_approve_sus='<center><img src="<?php echo base_url('img') ?>/Allimg/Alarm4.gif" > </center>'
                            var hr_approve_wait='<center><img src="<?php echo base_url('img') ?>/Allimg/Alarm1.gif" > </center>'
                            var hr_approve_return='<center><img src="<?php echo base_url('img') ?>/Allimg/Alarm2.gif" > </center>'
                            var hr_approve_nan='<center><img src="<?php echo base_url('img') ?>/Allimg/loading.gif" > </center>'
                              if(row.ELEAVE_HR_APPROVE == 1){
                                return hr_approve_sus;
                              }else if(row.ELEAVE_HR_APPROVE == 0){
                                return hr_approve_wait;
                              }else if(row.ELEAVE_HR_APPROVE == 2){
                                return hr_approve_return;
                              }
                                return hr_approve_wait;
                              
                                  }},
              { data: 'ELEAVE_EXECUTIVE_APPROVE',
                          render: function (data,type,row){
                            var executive_approve_sus='<center><img src="<?php echo base_url('img') ?>/Allimg/Alarm4.gif" > </center>'
                            var executive_approve_wait='<center><img src="<?php echo base_url('img') ?>/Allimg/Alarm1.gif" > </center>'
                            var executive_approve_return='<center><img src="<?php echo base_url('img') ?>/Allimg/Alarm2.gif" > </center>'
                            var executive_approve_nan='<center><img src="<?php echo base_url('img') ?>/Allimg/loading.gif" > </center>'
                              if(row.ELEAVE_EXECUTIVE_APPROVE == 1){
                                return executive_approve_sus;
                              }else if(row.ELEAVE_EXECUTIVE_APPROVE == 0){
                                return executive_approve_wait;
                              }else if(row.ELEAVE_EXECUTIVE_APPROVE == 2){
                                return executive_approve_return;
                              }
                                return executive_approve_wait;
                              
                                  }},
                                  
            { data: 'ELEAVE_ID',
                          render: function (data,type,row){
                            var notview ='<center><font color ="red">ไม่อนุญาติ</font> </center>';
                            var view = '<a href="<?php echo site_url() ?>/eleave/view_edit_data_eleave/' + data + '" ><center><img src="<?php echo base_url('img') ?>/Allimg/icon_check.png" > </center></a>';
                                    
                                    if(row.ELEAVE_MANAGER_APPROVE == 0){
                                    return view;
                                     }else  if(row.ELEAVE_MANAGER_APPROVE == 1){
                                    return notview;
                                     }else  if(row.ELEAVE_MANAGER_APPROVE == 2){
                                    return notview;
                                     }



                                  } },
            { data: 'ELEAVE_ID',
                          render: function (data,type,row){
                            var notview ='<center><font color ="red">ไม่อนุญาติ</font> </center>';
                            /* var view ='<button type="submit" id="button" name="button" data-sample-id="'+ data + '"  class="btn btn-danger remove" >'+data+'</button>'; */
                            /* var view ='<a href="#" data-href="<?php echo site_url('customer/delete'); ?>" data-id="'+data+'"  role="button" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> ลบ</a>'; */
                            var view = '<a  href="<?= base_url(); ?>index.php/eleave/eleave_delete/' + data + '"id="test" data-sample-id="'+data+'"  ><center><img src="<?php echo base_url('img') ?>/Allimg/icon_delete.png" > </center></a>';
                                    
                                    if(row.ELEAVE_MANAGER_APPROVE == 0){
                                    return view;
                                     }else  if(row.ELEAVE_MANAGER_APPROVE == 1){
                                    return notview;
                                     }else  if(row.ELEAVE_MANAGER_APPROVE == 2){
                                    return notview;
                                     }

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

 
