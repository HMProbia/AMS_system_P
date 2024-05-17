
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
            <h1 class="m-0">Report Data All   </h1>
          
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
                <div class="row">
                    <!-- 1 -->
                    <div class="col-sm-2">
                    <div class="form-group">
                        <label>ประเภทการลา</label>
                        <select class="form-control select2bs4"  name ="form_eleave_type" id="form_eleave_type" style="width: 100%;">
                            <option selected="selected" value="">-ประเภทการลา-</option>
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
                    
                    
                    
                    
                
                    
                     <!-- <?php }?> -->
                     
                             

                              <!--  -->
                              <div class="col-sm-2">
                              <!-- text input -->
                                <div class="form-group">
                                <label>เลือกปี</label>
                                  <select name="year" id="year" class="form-control" >
                                      <option value="">- ปี -</option>
                                          <?php
                                          for($i = date("Y"); $i >= 2015; $i--){
                                            $sel = ($year==$i)? "selected" : "";
                                          ?>
                                      <option value="<?= $i; ?>" <?= $sel; ?>><?= $i; ?></option>
                                          <?php } ?>
                                  </select>  
                                  
                                </div>
                              </div>


                              <!-- 2 -->
                    <div class="col-sm-2">
                    <div class="form-group">
                        <label>ค้นหาสถานะ</label>
                        <select class="form-control select2bs4"  name ="form_eleave_status"id="form_eleave_status" style="width: 100%;">
                        <option selected="selected" value="">-สถานะการลา-</option>
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
                        
                    </div>
                    <!-- /2 -->
                              <?php 
                        if($user_level  = "0" OR $user_level ="1" OR $user_level ="2" OR $user_level ="3"){
                    
                        ?>
                                

                        <?php }?>
                        <div class="col-sm-2">
                                <div class="form-group">
                                <label></label>
                                <input type="button" value="ค้นหา" class="form-control" onclick="mygraphAdproject()">
                                  
                                    
                                </div>
                            </div>

                            
                      </div>
                      <div class="card text-white bg-warning ">
                        <div name ="Div-show-g">
                      <!-- <table id="eleave_report_data" class=" table   table-bordered    " width ="100%" >
                 
                        <thead>
                            <tr>
                              <th bgcolor="#000000" width="10" style="margin: 3px; padding: 3px; text-align: center" ><font color ="#FFFFFF">ลำดับ</font></th>
                              <th bgcolor="#000000"width="60" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF">ลำดับผู้ใช้</font></th>
                              <th bgcolor="#000000"width="80" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF">รหัสพนักงาน</font></th>
                              <th bgcolor="#000000"width="100" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF">ประเภทการลา</font></th>
                              <th bgcolor="#000000"width="80" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF">วันเริ่มลา</font></th>
                              <th bgcolor="#000000"width="80" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF">วันจบลา</font></th>
                              <th bgcolor="#000000"width="80" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF">ช่วงเวลาที่ลา</font></th>
                              <th bgcolor="#000000"width="80" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF">จำนวนวันที่ลา</font></th>
                              <th bgcolor="#000000"width="60" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF">สถานะ</font></th>
                              <th bgcolor="#000000"width="60" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF">แก้ไข</font></th>
                              <th bgcolor="#000000"width="60" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF">ลบข้อมูล</font></th>
                            </tr>
                            
                              
                            

                        </thead>
                        <tbody>
                        </tbody>
                    </table> -->
                                    </div>
                      
                    
                    
                                    
            </div>
            <div id="divShow" onload="mygraphAdproject()"></div>
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
<!-- <script>  
function onExport(){
    
    search_eleave_type = $('#form_eleave_type').val();
	  searchcompany_name = $('#form_company_name').val();
	  searchname = $('#name').val();
    searchudate_start = $('#form_date_start').val();
	  searchdate_end = $('#form_date_end').val();
	  searcheleave_status = $('#form_eleave_status').val();



    window.open("<?= base_url(); ?>eleave/eleave_report_data_export/"+search_eleave_type+"/"+searchcompany_name+"/"+searchname+"/"+searchudate_start+"/"+searchdate_end+"/"+searcheleave_status+"/");
}
</script> -->
<script> 
$( document ).ready(function() {
			mygraphAdproject();
		});
		function mygraphAdproject() {
			$("#divShow").html("<br><div align='center'>กรุณารอสักครู่...<br><br><img src='<?= base_url(); ?>/img/Allimg/loading.gif'><br><br></div>");
			var pmeters = 'year=' + $("#year").val()+  '&form_eleave_status=' + $("#form_eleave_status").val()+ '&form_eleave_type=' + $("#form_eleave_type").val();
			pmeters = pmeters.replace("undefined", ""); 
			/* console.log(pmeters); */
		    $.ajax({
				type: "POST",
				url: "<?= base_url(); ?>index.php/eleave/graph_eleave_report_content/",
				data: pmeters,
				success: function(resPonse){
					$("#divShow").html(resPonse);
				}
			});
		}
</script> 

 
