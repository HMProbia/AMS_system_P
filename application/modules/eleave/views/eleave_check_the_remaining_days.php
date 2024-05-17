
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
            <h1 class="m-0">Check You Time   </h1>
          
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
                  ตรวจสอบเวลาที่เหลือ
                </h3>
              </div>
              
              <div class="card-body pad table-responsive">
                <div class="row">
                 <?php  
                 $emp_id =$this->session->userdata("EMP_ID");
                 $separator=' ';
                      //
                      $sql="SELECT * FROM ELEAVE_CONEM_NUMBER_SCORE WHERE ELEAVE_CONEM_NUMBER_SCORE_EMP_ID='$emp_id'";
                      $query = $this->db->query($sql)->result();
                      foreach($query as $row){
                        $eleave_conem_number_score_id  = $row->ELEAVE_CONEM_NUMBER_SCORE_ID;
                        $eleave_conem_number_score_emp_id  = $row->ELEAVE_CONEM_NUMBER_SCORE_EMP_ID;  
                        $eleave_conem_number_score_d  = $row->ELEAVE_CONEM_NUMBER_SCORE_D;
                        $eleave_conem_number_score_h  = $row->ELEAVE_CONEM_NUMBER_SCORE_H;
                        $eleave_conem_number_score_m  = $row->ELEAVE_CONEM_NUMBER_SCORE_M;
                      }
                      $days="วัน";
                      $hour="ชั่วโมง";
                      $minute="นาที";
                      $all_eleave_conem_number_score =$eleave_conem_number_score_d.$separator.$days.$separator.$eleave_conem_number_score_h.$separator.$hour.$separator.$eleave_conem_number_score_m.$separator.$minute;
                      //
                      $sql2="SELECT * FROM ELEAVE_SICK_NUMBER_SCORE WHERE ELEAVE_SICK_NUMBER_SCORE_EMP_ID='$emp_id'";
                      $query2 = $this->db->query($sql2)->result();
                      foreach($query2 as $row){
                        $eleave_sick_number_score_id  = $row->ELEAVE_SICK_NUMBER_SCORE_ID;
                        $eleave_sick_number_score_emp_id  = $row->ELEAVE_SICK_NUMBER_SCORE_EMP_ID;  
                        $eleave_sick_number_score_d  = $row->ELEAVE_SICK_NUMBER_SCORE_D;
                        $eleave_sick_number_score_h  = $row->ELEAVE_SICK_NUMBER_SCORE_H;
                        $eleave_sick_number_score_m  = $row->ELEAVE_SICK_NUMBER_SCORE_M;
                      }
                      $all_eleave_sick_number_score =$eleave_sick_number_score_d.$separator.$days.$separator.$eleave_sick_number_score_h.$separator.$hour.$separator.$eleave_sick_number_score_m.$separator.$minute;
                      //
                      $sql3="SELECT * FROM ELEAVE_EMERGENCY_NUMBER_SCORE WHERE ELEAVE_EMERGENCY_NUMBER_SCORE_EMP_ID='$emp_id'";
                      $query3 = $this->db->query($sql3)->result();
                      foreach($query3 as $row){
                        $eleave_emergemcy_number_score_id  = $row->ELEAVE_EMERGENCY_NUMBER_SCORE_ID;
                        $eleave_emergemcy_number_score_emp_id  = $row->ELEAVE_EMERGENCY_NUMBER_SCORE_EMP_ID;  
                        $eleave_emergemcy_number_score_d  = $row->ELEAVE_EMERGENCY_NUMBER_SCORE_D;
                        $eleave_emergemcy_number_score_h  = $row->ELEAVE_EMERGENCY_NUMBER_SCORE_H;
                        $eleave_emergemcy_number_score_m  = $row->ELEAVE_EMERGENCY_NUMBER_SCORE_M;
                      }
                      $all_eleave_emergemcy_number_score =$eleave_emergemcy_number_score_d.$separator.$days.$separator.$eleave_emergemcy_number_score_h.$separator.$hour.$separator.$eleave_emergemcy_number_score_m.$separator.$minute;
                      ?> 


                            
                      </div>
                      
                      <div class="card text-white bg-warning ">
                        <div name ="Div-show-g">
                      <table id="eleave_remaining_data" class=" table   table-bordered    " width ="100%" >
                 
                        <thead>
                            <tr>
                              <th bgcolor="#6600FF" width="10" style="margin: 3px; padding: 3px; text-align: center" ><font color ="#FFFFFF">ลำดับ</font></th>
                              <th bgcolor="#6600FF"width="150" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF">ประเภทการลา</font></th>
                              <th bgcolor="#6600FF"width="200" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF">จำนวนการลาที่เหลือ</font></th>
                              
                            </tr>
                            
                              
                            

                        </thead>
                        <tbody>
                        </tbody>
                        <tr>
                          <th bgcolor="#000000"width="10" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF"scope="row">1</th>
                          <td bgcolor="#000000"width="150" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF"><?php echo "ลากิจ"; ?></font></td>
                          <td bgcolor="#000000"width="200" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF"><?php echo $all_eleave_conem_number_score; ?></font></td>

                      </tr>
                      <tr>
                          <th bgcolor="#000000"width="10" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF"scope="row">2</th>
                          <td bgcolor="#000000"width="150" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF"><?php echo "ลาป่วย"; ?></font></td>
                          <td bgcolor="#000000"width="200" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF"><?php echo $all_eleave_sick_number_score; ?></font></td>
                          
                      </tr>
                      <tr>
                          <th bgcolor="#000000"width="10" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF"scope="row">3</th>
                          <td bgcolor="#000000"width="150" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF"><?php echo "ลากิจฉุกเฉิน"; ?></font></td>
                          <td bgcolor="#000000"width="200" style="margin: 3px; padding: 3px; text-align: center"><font color ="#FFFFFF"><?php echo $all_eleave_emergemcy_number_score; ?></font></td>
                          
                      </tr>
                    </table>
                                    </div>
                      
                    
                    
                                    
           <!--  </div>
            <div id="divShow" onload="mygraphAdproject()"></div>
          </div> -->
          <!-- /.col -->
        </div>
        <!-- ./row -->

     
        </div>
</section>

</div>
<!-- ./wrapper -->



</body>



</html>



 