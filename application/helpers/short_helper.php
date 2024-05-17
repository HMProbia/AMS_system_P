<?php



	// เช็คว่าได้ทำการ login มาหรือไม่
	if (!function_exists('__login')) {
		function __login() {
			$ci = &get_instance();
			if (!$ci->session->userdata("EMP_ID")) {

				$link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

				 echo "<script>alert('session หมดอายุ');</script>";
				// update log
					$data = array(
						
						'EMP_ID' => $emp_id,
						'IP' => $_SERVER['REMOTE_ADDR'],
						'LOGIN_DATE' => date("Y-m-d H:i:s"),
						'LOGIN_STATUS' => "LOGOUT:SUCCEED",
					);
					/* print_r($data); */
					$this->db->insert("USER_LOGIN_LOG", $data); 
		
					//มาแก้ต่อ
					$session_id = $this->session->userdata('session_id');
					$this->db->where("session_id", $session_id);
					$this->db->delete("CI_SESSIONS");

					$logindata = array(
						'USER_ID' => '',
						'LOGIN_NAME' => '',
					);

					$this->session->unset_userdata($logindata);
					redirect("../login/"); 
			}
		}

	}



	//โหลดหน้าเดสเพลย
	if (!function_exists('__display')) {
		function __display($text) {
			$ci = &get_instance();
			$ci->load->view($file, $data);
		}
	
	}




	//โหลดหน้าวิว
	if (!function_exists('__view')) {
		function __view($file, $data = '') {
			$ci = &get_instance();
			/*  $ci->load->view("register");  */
			$ci->load->view($file, $data);
		}
	
	}

	//อัพโหลด
	/* if (!function_exists('__upload')) {
		function __upload($file) {
			if (!$file)
				$file = $_FILES["uploadFile"];
	
			@mkdir('assets/upload/' . date('Y'));
			@mkdir('assets/upload/' . date('Y') . '/' . date('m'));
			@mkdir('assets/upload/' . date('Y') . '/' . date('m') . '/' . date('d'));
			$config['upload_path'] = 'assets/upload/' . date('Y') . '/' . date('m') . '/' . date('d');
	
			$tmp_name = $file["tmp_name"];
			$filename = md5($file["name"] . $file['size'] . rand(10000, 99999));
	
			$extension = @end(explode('.', $file['name']));
	
			if ($filename != "") {
				$filename = $config['upload_path'] . "/" . $filename . "." . $extension;
				@move_uploaded_file($tmp_name, $filename);
				return $filename;
			} else {
				return "";
			}
		}
	
	} */


	// สิ้นสุดเก็บแคช
if (!function_exists('__cend')) {
	function __cend($module = "", $option = array()) {

		$ci = &get_instance();
		$ci->load->library('cache_fragment');

		if ($module == "") {
			$module = "other";
		}

		$emp_id = $ci->session->userdata('EMP_ID');

		if (empty($ีemp_id)) {
			$emp_id = 0;
		}

		return $ci->cache_fragment->end($emp_id, $module, $option);
	}

}



	

	//ตรวจสอบ session ถ้าหากไม่มีให้ดีดออกจากระบบทันที
	 if (!function_exists('_checksession')) {
		function _checksession() {
			$ci = &get_instance();
				if($ci->session->userdata("EMP_ID") ==""){
					  echo "<script>alert('session หมดอายุ');</script>"; 
					  redirect("./login/"); 
				}
	
	
	
			}
	}

	//Load menu 
	if (!function_exists('_menu')) {
		function _menu() {
			$ci = &get_instance();
			$ci->load->view("menu/menu");
			
	
	
			}
	}



	
/*
 * $file : ไฟล์ที่เรียกใช้งาน
 * $data : ข้อมูลที่เก็บ
 * $time : ระยะเวลาข้อมูลที่เก็บไว้ 30 นาที
 */
function __viewContent($file = "", $data = array(), $time = 0) {

	$ci = &get_instance();
	$module = $ci->uri->segment(1);

	$time = (int)($time);

	if ($time >= 1) {

		if ($module == "") {
			$module = "dashboard";
		}

		if (__cstart("$module", $data, $time)) {
			$ci->load->view("$file", $data);
		}

		__cend("$module", $data);

	} else {
		$ci->load->view("$file", $data);
	}
}




// return x,xxx
if (!function_exists('__number')) {
	function __number($text = "", $style = "") {
		if (!empty($text)) {
			
			$nums = @number_format($text, 0, "", ",");
			
			if ($style == "fin" && ($nums < 0)) {
				return "<font color='#FF0000'>(" . abs($nums) . ")</font>";
			} else if ($style == "fin2" && ($nums < 0)) {
				return "<font color='#FF0000'>" . $nums . "</font>";
			} else {
				return $nums;
			}
			
		} else {
			return "0";
		}
	}
}


//check_permission_approve_manager
if (!function_exists('_check_permission_approve_manager')) {
	function _check_permission_approve_manager() {
		
		$ci = &get_instance();
		
		$user_level =$ci->session->userdata("USER_LEVEL");

		if($user_level >="4"){
			echo "<script>alert('คุณไม่มีสิทธิใช้งาน');</script>"; 
			echo "<script> window.location.href='eleave_status' </script>";  
		}if($user_level <="3"){
			echo "<script>alert('คุณมีสิทธิเข้าใช้งาน');</script>"; 
			$ci->load->view($file, $data);
		}


	}
}



?>

