
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <title>AdminLTE 3 | Dashboard 2</title> -->
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>dist/css/adminlte.min.css">
 <!-- AJAX -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>
   <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
 <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css"/>
  <!-- SweetAlert2 -->
  <link rel="stylesheet"  href="<?php echo base_url()."assets/"; ?>plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet"  href="<?php echo base_url()."assets/"; ?>build/scss/plugins/_toastr.scss">
  <script href="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
  <link rel="icon" href="<?=base_url()?>ATTA.png" type="image/gif">
  <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
  <!-- <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet"> -->
<!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script> -->
</head>
<?php 
$user_id_session = $this->session->userdata("USER_ID");
$emp_id_session =$this->session->userdata("EMP_ID");


$sql="SELECT *FROM USER_INFO WHERE EMP_ID = $emp_id_session ";
$query = $this->db->query($sql)->row();
        $emp_id  = @$query->EMP_ID;
        $name = @$query->NAME;
				$surname= @$query->SURNAME;
        $image_profile= @$query->IMAGE_PROFILE;
        /* $user_level =@$query-> USER_LEVEL; */
        $allname= $name." ".$surname;
        

?>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
<script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>


  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="<?php echo base_url()."assets/"; ?>#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo base_url()."assets/"; ?>index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= site_url(); ?>/contacts/" class="nav-link">Contacts</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="<?php echo base_url()."assets/"; ?>#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="<?php echo base_url()."assets/"; ?>#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="<?php echo base_url()."assets/"; ?>dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url()."assets/"; ?>#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="<?php echo base_url()."assets/"; ?>dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url()."assets/"; ?>#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="<?php echo base_url()."assets/"; ?>dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url()."assets/"; ?>#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="<?php echo base_url()."assets/"; ?>#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url()."assets/"; ?>#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url()."assets/"; ?>#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url()."assets/"; ?>#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url()."assets/"; ?>#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="<?php echo base_url()."assets/"; ?>#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="<?php echo base_url()."assets/"; ?>#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= site_url(); ?>/dashboard/" class="brand-link">
      <img src="<?php echo base_url('img'); ?>/ATTA.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Smart Agent System</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url('upload/profile'); ?>/<?php echo $image_profile; ?>"  class="img-circle elevation-2" alt="User Image">
        </div>
       
        <div class="info">
          <a href="<?= site_url(); ?>/account/view_profile/" class="d-block"><?php echo $allname ?></a>
        </div>
      </div>

      
    
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               <li class="nav-item">
            <a href="<?= site_url(); ?>/dashboard/" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
            </li>

          <li class="nav-item">
            <a href="<?php echo base_url()."assets/"; ?>#" class="nav-link active">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                ระบบ
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                  <a href="<?= site_url(); ?>/account/view_profile/" class="nav-link active">
                    <i class="fas fa-id-card-alt"></i>
                    <p>โปรไฟล์ของฉัน </p>
                  </a>
                </li>

              <li class="nav-item">
                <a href="<?= site_url(); ?>/logout/" class="nav-link">
                  <i class="fas fa-door-open"></i>
                  <p>ออกจากระบบ</p>
                </a>
              </li>


            </ul>
          </li>
          <?php 
          $session_emp_id = $this->session->userdata('EMP_ID');
          $sql0="SELECT PERMISSTION_ID,EMP_ID_PERMISSTION,PERMISSTION_M_ID,PERMISSTION_S_ID FROM USER_PERMISSTION_MENU_MAIN WHERE IS_APPROVE='1' AND
          EMP_ID_PERMISSTION='$session_emp_id' ";
          $query0 =$this->db->query($sql0)->row();
          $emp_id_permisstion_user =@$query0->EMP_ID_PERMISSTION;
          $m_id_permisstion_user =@$query0->PERMISSTION_M_ID;
          $s_id_permisstion_user =@$query0->PERMISSTION_S_ID;
          
          
          ?>
         

          <?php //ไว้ทำไดนามิกเมนู 
          $sql1="SELECT *FROM MODULES_MAIN_MENU WHERE IS_APPROVE = '1' ";
          $query1 = $this->db->query($sql1)->result();
                                    foreach($query1 as $row){
                                        $main_menu_id  = $row->M_ID;
                                        $main_menu_name = $row->MENU_NAME;
                                        $main_menu_url = $row->URL;
                                        $main_menu_icon = $row->ICON;
                  
          ?>
          <?php  
          $arramymainmenu=explode(",", $m_id_permisstion_user);
          if(in_array($main_menu_id, $arramymainmenu)){

          
          ?>
          
          <li class="nav-item">
            <a href="<?php echo $main_menu_url ; ?>" class="nav-link">
              <i class="<?php echo $main_menu_icon ;?>"></i>
              <p>
                <?php echo $main_menu_name ; ?>
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <?php } ?>
            
                    <?php
                    $sql2="SELECT *FROM MODULES_MAIN_SUBMENU WHERE IS_APPROVE = '1' ";
                    $query2 = $this->db->query($sql2)->result();
                          foreach($query2 as $row){
                          $main_submenu_main_in_sub_id  = $row->M_ID;
                          $main_submenu_sub_id  = $row->SUB_ID;
                          $main_submenu_name = $row->MENU_NAME;
                          $main_submenu_url = $row->URL;
                          $main_submenu_icon = $row->ICON;
                                                
                          
                    ?>

                    <?php if($main_menu_id == $main_submenu_main_in_sub_id){?>
                      <?php
                      $arramysubmenu=explode(",", $s_id_permisstion_user);
                        if(in_array($main_submenu_sub_id, $arramysubmenu)){
                        ?>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="<?= site_url(); ?><?php echo $main_submenu_url ; ?>" class="nav-link">
                          <i class="<?php echo $main_submenu_icon ;?>"></i>
                          <p><?php echo $main_submenu_name ; ?></p>
                        </a>
                      </li>
                      
                      
                      
                    </ul>
                      <?php }?>
                    <?php }?>
                  <?php }?>

            
            
            
          </li>
          <?php }?>
        
          
          
          

          
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  

    
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Smart Agent System &copy; 2021 <a href="  https://attaautohaus.com">AttaAutohaus</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 0.1
    </div>
  </footer>
</div>

        </body>
        
<script href="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>

<script src="<?php echo base_url()."assets/"; ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>dist/js/adminlte.js"></script>
<script href="<?php echo base_url()."assets/"; ?>plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script href="<?php echo base_url()."assets/"; ?>plugins/raphael/raphael.min.js"></script>
<script href="<?php echo base_url()."assets/"; ?>plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script href="<?php echo base_url()."assets/"; ?>plugins/jquery-mapael/maps/usa_states.min.js"></script>
<script href="<?php echo base_url()."assets/"; ?>plugins/chart.js/Chart.min.js"></script>
<script href="<?php echo base_url()."assets/"; ?>dist/js/demo.js"></script>
<script href="<?php echo base_url()."assets/"; ?>dist/js/pages/dashboard2.js"></script>
<script href="<?php echo base_url()."assets/"; ?>plugins/jquery/jquery.min.js"></script>
<script href="<?php echo base_url()."assets/"; ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script href="<?php echo base_url()."assets/"; ?>dist/js/adminlte.js"></script>
<script src="<?php echo base_url()."assets/"; ?>plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>plugins/sweetalert2/sweetalert2.all.min.js"></script>
<script href="<?php echo base_url()."assets/"; ?>plugins/chart.js/Chart.min.js"></script>
<script href="<?php echo base_url()."assets/"; ?>dist/js/demo.js"></script>
<script href="<?php echo base_url()."assets/"; ?>dist/js/pages/dashboard3.js"></script>
<script href="<?php echo base_url()."assets/"; ?>plugins/toastr/toastr.min.js"></script>








<style>
  .red {
  background-color: #0C090A !important;
}

</style>



</html>
