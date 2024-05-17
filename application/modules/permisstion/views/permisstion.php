<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>ลงทะเบียนพนักงาน</title>

    <!-- Icons font CSS-->
    <link href="<?php echo base_url()."assets/assets_register/"; ?>vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url()."assets/assets_register/"; ?>/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="<?php echo base_url()."assets/assets_register/"; ?>vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url()."assets/assets_register/"; ?>vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?php echo base_url()."assets/assets_register/"; ?>css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-01 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
        
            <div class="card card-4">
            <img  src="<?php echo base_url('img'); ?>/attalogo.jpg" width="100%" hight="100%">
                <div class="card-body">
                    <h2 class="title">กรุณากรอกข้อมูลพนักงานเพื่อลงทะเบียนใช้งาน</h2>
                    <form method="POST" action="<?=site_url('register/register_frist')?>" >
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">ชื่อ</label>
                                    <input class="input--style-4" type="text" name="first_name" placeholder="กรอกชื่อจริง" required >
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">นามสกุล</label>
                                    <input class="input--style-4" type="text" name="last_name" placeholder="กรอกนามสกุล" required >
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">รหัสพนักงาน</label>
                                    <input class="input--style-4" type="text" name="emp_id" placeholder="กรอกรหัสพนักงาน" required >
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">รหัสฉุกเฉิน</label>
                                    <input class="input--style-4" type="PASSWORD" name="password_emergency"  value="Wyteb0ard" readonly="true"  >
                                </div>
                            </div>

                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">วัน/เดือน/ปีเกิด</label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4" type="date" name="birthday" required >
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">เพศ</label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">Male
                                            <input type="radio" checked="checked" name="gender" value="Male">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Female
                                            <input type="radio" name="gender" value="Female">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="email" name="email" placeholder="กรอก Email" required >
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">เบอร์ติดต่อ</label>
                                    <input class="input--style-4" type="text" name="phone" placeholder="กรอกเบอร์ติดต่อ" required >
                                </div>
                            </div>
                            
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">วัน/เดือน/ปีที่เข้าทำงาน</label>
                                    <div class="input-group-icon">
                                        
                                        <input class="input--style-4" type="date" name="job_start_date" required >
                                       
                                    </div>
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">วัน/เดือน/ปีที่ผ่านการทดลองงานแล้ว</label>
                                    <div class="input-group-icon">
                                        
                                        <input class="input--style-4" type="date" name="end_probatio" required >
                                        
                                    </div>
                                </div>
                            </div>

                            
                            

                        </div>

                        <!-- input ที่อยู่ -->
                        <div class="col-1">
                                <div class="input-group">
                                    <label class="label">ที่อยู่</label>
                                    <input class="input--style-4" type="text" name="address" placeholder="กรอกที่อยู่"required >
                                </div>
                            </div>

                            
                        <!-- ดรอปดาว แผนก วนอาเรย์ -->
                        <div class="input-group">
                            <label class="label">แผนก</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="department" required >
                                <option disabled="disabled" selected="selected">กรุณาเลือกแผนกที่สังกัด</option>
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
                                <div class="select-dropdown"></div>
                            </div>
                        </div>


                        <!-- ดรอปดาว ตำแหน่ง วนอาเรย์ -->
                        <div class="input-group">
                            <label class="label">ตำแหน่ง</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="job_position" required  >
                                    <option disabled="disabled" selected="selected">กรุณาเลือกตำแหน่งที่สังกัด</option>
                                    <?php 
                                    $sql = "SELECT * FROM JOB_POSITION_TYPE";
                                    $query = $this->db->query($sql)->result();
                                    foreach($query as $row){
                                        $job_position_id  = $row->JOB_POSITION_ID;
                                        $job_position_name = $row->JOB_POSITION_NAME;
                                ?>
                                    <option value="<?php echo $job_position_name; ?>" ><?php echo $job_position_name; ?></option>
                                <?php  } ?>   
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                            
                             <!-- ดรอปดาว บริษัท วนอาเรย์ -->
                             
                        <div class="input-group">
                            <label class="label">บริษัท</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="company" required >
                                    <option disabled="disabled" selected="selected">กรุณาเลือกบริษัทที่สังกัด</option>
                               
                                    <option value="1" >Benz Talingchan Co., Ltd.</option>
                                    <option value="2" >ATTA Autohaus Co., Ltd.</option>
                            
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                         



                            
                             <!-- ดรอปดาว ชื่อผู้จัดการที่รับผิดชอบ USERนี้ วนอาเรย์ -->
                             
                             <div class="input-group">
                            <label class="label">ผู้จัดการ</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="manager_approve" required >
                                    <option disabled="disabled" selected="selected">กรุณาเลือกผู้จัดการที่สังกัด</option>
                                <?php 
                                    $sql = "SELECT MANAGER_ID,MANAGER_NAME,MANAGER_SURNAME,MANAGER_EMP_ID FROM MANAGER_TYPE WHERE IS_APPROVE ='1'   ";
                                    $query = $this->db->query($sql)->result();
                                    foreach($query as $row){
                                        $manager_id  = $row->MANAGER_ID;
                                        $manager_emp_id  = $row->MANAGER_EMP_ID;
                                        $manager_name = $row->MANAGER_NAME;
                                        $manager_surname=$row->MANAGER_SURNAME;
                                        $manager_name_surname= $manager_emp_id.":".$manager_name." ".$manager_surname;
                                ?>
                                    <option value="<?php echo $manager_emp_id; ?>" ><?php echo $manager_name_surname; ?></option>
                                <?php  } ?>   
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>


                        
                             <!-- ดรอปดาว ชื่อHR ที่รับผิดชอบ USERนี้ วนอาเรย์ -->
                             
                             <div class="input-group">
                            <label class="label">ฝ่ายบุคคล</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="humane_resoures_approve" required >
                                    <option disabled="disabled" selected="selected">กรุณาเลือกฝ่ายบุคคล</option>
                                <?php 
                                    $sql = "SELECT HUMANE_RESOURCES_ID,HUMANE_RESOURCES_NAME,HUMANE_RESOURCES_SURNAME,HUMANE_RESOURCES_EMP_ID FROM HUMANE_RESOURCES_TYPE WHERE IS_APPROVE ='1'";
                                    $query = $this->db->query($sql)->result();
                                    foreach($query as $row){
                                        $humane_resoures_id  = $row->HUMANE_RESOURCES_ID;
                                        $humane_resoures_emp_id  = $row->HUMANE_RESOURCES_EMP_ID;
                                        $humane_resoures_name = $row->HUMANE_RESOURCES_NAME;
                                        $humane_resoures_surname=$row->HUMANE_RESOURCES_SURNAME;
                                        $humane_resoures_name_surname= $humane_resoures_emp_id.":".$humane_resoures_name." ".$humane_resoures_surname;
                                ?>
                                    <option value="<?php echo $humane_resoures_emp_id; ?>" ><?php echo $humane_resoures_name_surname; ?></option>
                                <?php  } ?>   
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>


                        
                            <button class="btn btn--radius-2 btn--blue " type="submit" align="left">Submit</button>
                            <button class="btn btn--radius-2 btn--blue  " onclick="window.history.go(-1); return false;" align="right">ย้อนกลับ</button>
                        
                                           


                    </form>
                    
                   
                </div>
                 
                        
                    
            </div>
        </div>
    </div>




    <!-- Jquery JS-->
    <script src="<?php echo base_url()."assets/assets_register/"; ?>vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="<?php echo base_url()."assets/assets_register/"; ?>vendor/select2/select2.min.js"></script>
    <script src="<?php echo base_url()."assets/assets_register/"; ?>vendor/datepicker/moment.min.js"></script>
    <script src="<?php echo base_url()."assets/assets_register/"; ?>vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="<?php echo base_url()."assets/assets_register/"; ?>js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->