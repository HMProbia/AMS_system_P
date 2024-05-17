<!-- <script src="<?= base_url(); ?>assets/hightchart/js/highcharts.js" charset="UTF-8" type="text/javascript"></script>
<script src="<?= base_url(); ?>assets/hightchart/js/highcharts-more.js" charset="UTF-8" type="text/javascript"></script>
<script src="<?= base_url(); ?>assets/hightchart/js/modules/exporting.js" charset="UTF-8" type="text/javascript"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
<?php
        
    $emp_id =$this->session->userdata("EMP_ID");

    if($form_eleave_type != ''){
			$search_arr[] = " ELEAVE_TYPE_ID='".$form_eleave_type."' ";
		}
		
		if($year != ''){
			$search_arr[] = " YEAR ( ELEAVE_DATE_START ) like '%".$year."%' ";
		}
		if($form_eleave_status != ''){
			$search_arr[] = " ELEAVE_STATUS like '%".$form_eleave_status."%' ";
		}
		
        if($emp_id != ''){
			$search_arr[] = " ELEAVE_EMP_ID like '%".$emp_id."%' ";
		}
        if(count($search_arr) > 0){
			$searchQuery = implode(" and ",$search_arr);
		}

    //รวมลากิจ
    $sql=" SELECT MONTH( ELEAVE_DATE_START ) AS AD_MONTH,COUNT( ELEAVE_ID ) AS C_ELEAVE,ELEAVE_TYPE_ID FROM ELEAVE 
        WHERE $searchQuery AND ELEAVE_TYPE_ID ='0'  GROUP BY AD_MONTH";
             
        $query = $this->db->query($sql)->result();
        for($i = 1; $i<=12; $i++){
          $arrBox[$i] = 0;
        }	
        foreach($query as $row){
          $n = $row->AD_MONTH ;
          $arrBox[$n] = $row->C_ELEAVE;
          
        } 
        $txt_data_eleave_year1 = @implode(",", $arrBox);
        echo " <br>";
       //////
      
    //ลาป่วย
    $sql=" SELECT MONTH( ELEAVE_DATE_START ) AS AD_MONTH,COUNT( ELEAVE_ID ) AS C_ELEAVE,ELEAVE_TYPE_ID FROM ELEAVE 
    WHERE $searchQuery AND ELEAVE_TYPE_ID ='1'  GROUP BY AD_MONTH";
         
    $query = $this->db->query($sql)->result();
    for($i = 1; $i<=12; $i++){
      $arrBox2[$i] = 0;
    }	
    foreach($query as $row){
      $n = $row->AD_MONTH ;
      $arrBox2[$n] = $row->C_ELEAVE;
      
    } 
    $txt_data_eleave_year2 = @implode(",", $arrBox2);
    echo " <br>";
    
    //////

    //ลากิจฉุกเฉิน
    $sql=" SELECT MONTH( ELEAVE_DATE_START ) AS AD_MONTH,COUNT( ELEAVE_ID ) AS C_ELEAVE,ELEAVE_TYPE_ID FROM ELEAVE 
    WHERE $searchQuery AND ELEAVE_TYPE_ID ='2'  GROUP BY AD_MONTH";
         
    $query = $this->db->query($sql)->result();
    for($i = 1; $i<=12; $i++){
      $arrBox3[$i] = 0;
    }	
    foreach($query as $row){
      $n = $row->AD_MONTH ;
      $arrBox3[$n] = $row->C_ELEAVE;
      
    } 
    $txt_data_eleave_year3 = @implode(",", $arrBox3);
    echo " <br>";
    
    //////
        


?>
 <!-- BAR CHART -->
 <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">กราฟแสดงยอดการลา <?php echo $year; ?></h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="barChart" style="min-height: 250px; height: 300px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->


<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas =$('#barChart').get(0) .getContext('2d')

    var areaChartData = {
      
      labels  : ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'],
      datasets: [
        {
          label               : 'ลากิจ',
          backgroundColor     : 'rgba(255,69,0)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#ffffff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php echo $txt_data_eleave_year1;?>]
        },
        {
          label               : 'ลาป่วย',
          backgroundColor     : 'rgba(128,0,0)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#ffffff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [<?php echo $txt_data_eleave_year2;?>]
        },
        {
          label               : 'ลากิจฉุกเฉิน',
          backgroundColor     : 'rgba(255,255,0)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#ffffff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [<?php echo $txt_data_eleave_year3;?>]
        },
        /* {
          label               : 'ลาปวช',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#ffffff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [65, 59, 80, 81, 56, 55, 40]
        }, */
      ]
      
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }

    
    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
      
    }

      new Chart(barChartCanvas, {
        type: 'bar',
        data: barChartData,
        options: barChartOptions
      })
    
  })
</script>
</body>
</html>
