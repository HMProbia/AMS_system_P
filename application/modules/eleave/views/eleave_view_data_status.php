
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
                        <select class="form-control select2bs4"  name ="form_eleave_type" id="form_eleave_type" >
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


                              <!-- 2 -->
                    <div class="col-sm-2">
                    <div class="form-group">
                        <label>ค้นหาสถานะ</label>
                        <select class="form-control select2bs4"  name ="form_eleave_status"id="form_eleave_status" style="width: 100%;">
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
                        
                    </div>
                    <!-- /2 -->
                              <?php 
                        if($user_level  = "0" OR $user_level ="1" OR $user_level ="2" OR $user_level ="3"){
                    
                        ?>
                                <!-- 3 -->
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>ค้นหาชื่อ</label>
                                    <input class="form-control" type="text" name="name" id="name"  placeholder="ชื่อ" />
                                    
                                </div>
                                    
                            </div>
                                    <!-- /3 -->

                        <?php }?>
                        </form>
                        
                        </div>
                        <div class="row">

                            <div class="col-sm-2">
                                <div class="form-group"><BR>
                                <a href="<?= base_url(); ?>index.php/eleave/export_eleave_data_excel" >
                                <button class="form-control" type='submit' ><font color ="#FFFFFF">Export Excel</font></button>
                                </a>
                                    
                                </div>
                            </div>
                            
                      
                      
                            <div class="col-sm-2">
                                    <div class="form-group"><BR>
                                    <button class="form-control"><a href="<?= site_url(); ?>/eleave/eleave_add_data" ><font color ="#FFFFFF">เพิ่มข้อมูล</font></a></button>
                                        
                                    </div>
                            </div>

                            <div class="col-sm-2">
                                    <div class="form-group"><BR>
                                    <button class="form-control" onclick="mygraphAdproject()"><font color ="#FFFFFF">ค้นหาข้อมูล</font></button>
                                        
                                    </div>
                            </div>
                            
                        </div>
                      <div class="card text-white bg-warning ">
                      
                    <div id="divShow"></div>
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

<script>
 
 $(document).on('click', '#button', function(){ 
    /* $("#button").data("sample-id"); */
    
    alert($("#button").data("sample-id"));
    
    console.log($("#button").data("sample-id"));
});

</script>


 <script> 
$( document ).ready(function() {
			mygraphAdproject();
		});
		function mygraphAdproject() {
           /*  var form_eleave_type =document.getElementById("form_eleave_type").value;
            var form_company_name =document.getElementById("form_company_name").value;
            var form_date_start =document.getElementById("form_date_start").value;
            var form_date_end =document.getElementById("form_date_end").value;
            var form_eleave_status =document.getElementById("form_eleave_status").value;
            var name =document.getElementById("name").value;
            console.log(name); */
			$("#divShow").html("<br><div align='center'>กรุณารอสักครู่...<br><br><img src='<?= base_url(); ?>/img/Allimg/loading.gif'><br><br></div>");
			var pmeters = 'form_eleave_type=' + $("#form_eleave_type").val()+'&form_company_name=' + $("#form_company_name").val()+
            '&form_date_start=' + $("#form_date_start").val()+'&form_date_end=' + $("#form_date_end").val()+'&form_eleave_status=' + $("#form_eleave_status").val()+'&name=' + $("#name").val();
			pmeters = pmeters.replace("undefined", ""); 
			console.log(pmeters);
		    $.ajax({
				type: "POST",
				url: "<?= base_url(); ?>index.php/eleave/load_data_status_content/",
				data: pmeters,
				success: function(resPonse){
					$("#divShow").html(resPonse);
				}
			});
		}
</script> 

 <!-- <script> 

		function export_excel() {
           
			
			
			var pmeters = 'form_eleave_type=' + $("#form_eleave_type").val()+'&form_company_name=' + $("#form_company_name").val()+
            '&form_date_start=' + $("#form_date_start").val()+'&form_date_end=' + $("#form_date_end").val()+'&form_eleave_status=' + $("#form_eleave_status").val()+'&name=' + $("#name").val();
			pmeters = pmeters.replace("undefined", ""); 
			console.log(pmeters);
		    $.ajax({
				type: "POST",
				url: "<?= base_url(); ?>index.php/eleave/export_eleave_data_excel/",
				data: pmeters,
				/* success: function(resPonse){
					$("#divShow").html(resPonse);
				} */
			});
		}
</script>  -->



 
