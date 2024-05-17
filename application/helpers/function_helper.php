<?php
if (!defined('BASEPATH'))
	exit();


if (!function_exists('engDate')) {
	function engDate($str) {
		if (!empty($str) AND ($str != "0000-00-00")) {
			$num = @strtotime($str);
			return date("F j, Y", $num);
			// August 27, 2012
		} else {
			$num = "";
			return "-";
		}
	}

}

if (!function_exists('engDateTime')) {
	function engDateTime($str) {
		if (!empty($str) AND ($str != "0000-00-00 00:00:00")) {
			$num = @strtotime($str);
			return date("F j, Y H:i:s", $num);
			// August 27, 2012 00:00:00
		} else {
			$num = "";
			return "-";
		}
	}

}

if (!function_exists('highlight')) {
	function highlight($searchtext, $text) {
		$search = prepare_search_term($searchtext);
		//return @preg_replace('#' . $search . '#iu', '<span style="background-color:red">$0</span>', $text);
		return @preg_replace('#' . $search . '#iu', '<font color="red">$0</font>', $text);
	}

	function prepare_search_term($str, $delim = "#") {
		$search = @preg_quote($str, $delim);
		return $search;
	}

}

if (!function_exists('genUsername')) {
	function genUsername($str1 = "", $str2 = "") {

		$str1 = clearText(trim(strtolower($str1)));
		$str2 = clearText(trim(strtolower($str2)));

		$numstr = strlen($str1);

		if ($numstr >= 10) {
			$str1 = substr($str1, 0, 10);
		}

		if (!empty($str1) AND !empty($str2)) {
			$username = $str1 . '.' . substr($str2, 0, 3);
		} else if (!empty($str1) AND empty($str2)) {
			$username = $str1 . '.' . substr($str1, 0, 3);
		} else {
			$username = $str1;
		}

		return $username;
	}

}

if (!function_exists('genPasswordByUser')) {
	function genPasswordByUser($str1 = "") {

		$str1 = clearPassword(trim(strtolower($str1)));

		$numstr = strlen($str1);

		if ($numstr >= 10) {
			$str1 = substr($str1, 0, 10);
		}

		if (empty($str1)) {
			$str1 = "";
		}

		return $str1;
	}

}

if (!function_exists('genPassword')) {
	function genPassword($length = 8) {
		srand((double)microtime() * 10000000);
		$chars = "ABCDEFGHIJKLMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz123456789";
		$ret_str = "";
		$num = strlen($chars);
		for ($i = 0; $i < $length; $i++) {
			$ret_str .= $chars[rand() % $num];
			$ret_str .= "";
		}
		return $ret_str;
	}

}

if (!function_exists('genNumber')) {
	function genNumber($length = 6) {
		srand((double)microtime() * 10000000);
		$chars = "0123456789";
		$ret_str = "";
		$num = strlen($chars);
		for ($i = 0; $i < $length; $i++) {
			$ret_str .= $chars[rand() % $num];
			$ret_str .= "";
		}
		return $ret_str;
	}

}

if (!function_exists('clearText')) {
	function clearText($str = "") {
		if (!empty($str)) {
			$str = str_ireplace("'", "", $str);
			$str = str_ireplace("_", "", $str);
			$str = str_ireplace("-", "", $str);
			$str = str_ireplace("+", "", $str);
			$str = str_ireplace(" ", "", $str);
			$str = str_ireplace("/", "", $str);
			$str = str_ireplace(",", "", $str);
			$str = str_ireplace("@", "", $str);
			$str = str_ireplace("&", "", $str);
			$str = str_ireplace(":", "", $str);
			$str = str_ireplace(";", "", $str);
			$str = str_ireplace("$", "", $str);
			$str = str_ireplace("*", "", $str);
			$str = str_ireplace("..", ".", $str);
			$str = str_ireplace("(", "", $str);
			$str = str_ireplace(")", "", $str);
			$str = str_ireplace("!", "", $str);

			$str = str_ireplace("miss.", "", $str);
			$str = str_ireplace("mrs.", "", $str);
			$str = str_ireplace("ms.", "", $str);
			$str = str_ireplace("mr.", "", $str);
			$str = str_ireplace("Miss.", "", $str);
			$str = str_ireplace("Mrs.", "", $str);
			$str = str_ireplace("Ms.", "", $str);
			$str = str_ireplace("Mr.", "", $str);

			return $str;
		} else {
			return "";
		}
	}

}

if (!function_exists('clearPassword')) {
	function clearPassword($str = "") {
		if (!empty($str)) {
			$str = str_ireplace("'", "", $str);
			$str = str_ireplace(" ", "", $str);
			$str = str_ireplace("..", ".", $str);
			$str = str_ireplace("(", "", $str);
			$str = str_ireplace(")", "", $str);
			$str = str_ireplace("/", "", $str);

			$str = str_ireplace("miss.", "", $str);
			$str = str_ireplace("mrs.", "", $str);
			$str = str_ireplace("ms.", "", $str);
			$str = str_ireplace("mr.", "", $str);
			$str = str_ireplace("Miss.", "", $str);
			$str = str_ireplace("Mrs.", "", $str);
			$str = str_ireplace("Ms.", "", $str);
			$str = str_ireplace("Mr.", "", $str);

			return $str;
		} else {
			return "";
		}
	}

}

if (!function_exists('GtmToEngDate')) {
	function GtmToEngDate($str = "") {

		if (!empty($str) AND ($str != "0000-00-00 00:00:00")) {
			$num = @strtotime($str);
			$day = date("F j, Y", $num);
			$time = date("H:i:s", $num);

			if ($time == "00:00:00") {
				$time = "";
			} else {
				$time = " " . $time;
			}

			return $day . "" . $time;
		} else {
			$num = "";
			return "-";
		}
	}

}

if (!function_exists('encrypttext')) {
	function encrypttext($text = "") {
		$string = $text;
		$hash = "";
		$j = 0;
		$secureKey = KEYWEB;
		$key = sha1($secureKey);
		$strLen = strlen($string);
		$keyLen = strlen($key);
		for ($i = 0; $i < $strLen; $i++) {
			$ordStr = ord(substr($string, $i, 1));
			if ($j == $keyLen) { $j = 0;
			}
			$ordKey = ord(substr($key, $j, 1));
			$j++;
			$hash .= strrev(base_convert(dechex($ordStr + $ordKey), 16, 36));
		}
		$hash = base64_encode(base64_encode($hash));
		return $hash;
	}

}

if (!function_exists('decrypttext')) {
	function decrypttext($text) {
		$string = $text;
		$hash = "";
		$j = 0;
		$string = base64_decode(base64_decode($string));
		$secureKey = KEYWEB;
		$key = sha1($secureKey);
		$strLen = strlen($string);
		$keyLen = strlen($key);
		for ($i = 0; $i < $strLen; $i += 2) {
			$ordStr = hexdec(base_convert(strrev(substr($string, $i, 2)), 36, 16));
			if ($j == $keyLen) { $j = 0;
			}
			$ordKey = ord(substr($key, $j, 1));
			$j++;
			$hash .= chr($ordStr - $ordKey);
		}
		return $hash;
	}

}

if (!function_exists('injection')) {
	function injection($string = "") {
		$specialCharacters = array(
			"'" => '',
			'"' => '',
			'&' => '',
			'$' => '',
			'%' => ''
		);
		while (list($character, $replacement) = each($specialCharacters)) {
			$string = str_replace($character, '-' . $replacement . '-', $string);
		}
		return $string;
	}

}

if (!function_exists('checktrue')) {
	function checktrue() {
		$CI = &get_instance();
		$arrData = $CI->session->all_userdata();

		if (!isset($arrData['userID']) || !isset($arrData['companyID']) || !isset($arrData['branchID'])) {
			return false;
		}

		$userId = intval($arrData['userID']);
		$companyId = intval($arrData['companyID']);
		$branchId = intval($arrData['branchID']);

		if (empty($userId) || empty($companyId) || empty($branchId)) {
			return false;
		}

		// check time in use 30 min
		$last_activity = ($CI->session->userdata("last_activity") + 1800);
		$time_now = time();

		if ($last_activity >= $time_now) {
			$CI->session->set_userdata("last_activity", time());
		} else {
			return false;
		}

		return true;
	}

}

if (!function_exists('showValue')) {
	function showValue($value, $default) {
		if ($value)
			$value = $value;
		else
			$value = $default;
		$onFocue = 'onfocus="if(this.value == \'' . $value . '\') { this.value = \'\'; }"';
		$onBlur = 'onblur="if(this.value == \'\') { this.value = \'' . $value . '\'; }" value="' . $value . '"';
		return ' placeholder="' . $default . '"';
	}

}

if (!function_exists('showBirthDay')) {
	function showBirthDay($pbday) {
		$mbirth = strtotime($pbday);
		$mnow = strtotime(date("Y-m-d"));

		$mage = ($mnow - $mbirth);
		$age = (date("Y", $mage) - 1970);

		return $age;
	}

}

if (!function_exists('showCountBirthDay')) {
	function showCountBirthDay($pbday) {
		$mbirth = strtotime($pbday);
		$mnow = strtotime(date("Y-m-d"));

		$mage = ($mnow - $mbirth);
		$age = (date("Y", $mage) - 1970) . " Y " . (date("m", $mage) - 1) . " M " . (date("d", $mage) - 1) . " D";

		return $age;
	}

}

function isArrayMin($data) {
	$minn = 10000000;
	for ($i = 0; $i < count($data); $i++) {
		if ($data[$i] < $minn)
			$minn = $data[$i];
	}
	return $minn;
}

function isArrayMax($data) {
	$maxx = 0;
	for ($i = 0; $i < count($data); $i++) {
		if ($data[$i] > $maxx)
			$maxx = $data[$i];
	}
	return $maxx;
}

function html2txt($text) {

	$search = array(
		'@<script[^>]*?>.*?</script>@si', // Strip out javascript
		'@<[\/\!]*?[^<>]*?>@si', // Strip out HTML tags
		'@<style[^>]*?>.*?</style>@siU', // Strip style tags properly
		'@<![\s\S]*?--[ \t\n\r]*>@' // Strip multi-line comments including CDATA
	);

	$text = @preg_replace($search, '', $text);
	$text = @str_ireplace("<br />", " ", $text);
	$text = @str_ireplace("&nbsp;", " ", $text);
	$text = @str_ireplace("<u>", "", $text);
	$text = @str_ireplace("</u>", "", $text);

	return $text;
}

function check_browser() {
	$useragent = $_SERVER['HTTP_USER_AGENT'];
	if (preg_match('|MSIE ([0-9].[0-9]{1,2})|', $useragent, $matched)) {
		$browser_version = $matched[1];
		$browser = 'IE';
	} elseif (preg_match('|Chrome/([0-9\.]+)|', $useragent, $matched)) {
		$browser_version = $matched[1];
		$browser = 'Chrome';
	} elseif (preg_match('|Opera ([0-9].[0-9]{1,2})|', $useragent, $matched)) {
		$browser_version = $matched[1];
		$browser = 'Opera';
	} elseif (preg_match('|Firefox/([0-9\.]+)|', $useragent, $matched)) {
		$browser_version = $matched[1];
		$browser = 'Firefox';
	} elseif (preg_match('|Safari/([0-9\.]+)|', $useragent, $matched)) {
		$browser_version = $matched[1];
		$browser = 'Safari';
	} else {
		$browser_version = 0;
		$browser = 'other';
	}
	return $browser;
}

function check_browser_version() {
	$useragent = $_SERVER['HTTP_USER_AGENT'];
	if (preg_match('|MSIE ([0-9].[0-9]{1,2})|', $useragent, $matched)) {
		$browser_version = $matched[1];
		$browser = 'IE';
	} elseif (preg_match('|Chrome/([0-9\.]+)|', $useragent, $matched)) {
		$browser_version = $matched[1];
		$browser = 'Chrome';
	} elseif (preg_match('|Opera ([0-9].[0-9]{1,2})|', $useragent, $matched)) {
		$browser_version = $matched[1];
		$browser = 'Opera';
	} elseif (preg_match('|Firefox/([0-9\.]+)|', $useragent, $matched)) {
		$browser_version = $matched[1];
		$browser = 'Firefox';
	} elseif (preg_match('|Safari/([0-9\.]+)|', $useragent, $matched)) {
		$browser_version = $matched[1];
		$browser = 'Safari';
	} else {
		$browser_version = 0;
		$browser = 'other';
	}
	return $browser_version;
}

function page_rendered($web_start_time) {
	$web_end_time = microtime(true);
	$duration = @round(($web_end_time - $web_start_time), 4);

	$hours = (int)($duration / 60 / 60);
	$minutes = (int)($duration / 60) - $hours * 60;
	$seconds = (int)$duration - $hours * 60 * 60 - $minutes * 60;

	return 'Page rendered in <b>' . $duration . '</b> seconds';
}

function gen_code($method = "", $time = "", $amount = 0, $user_id = "", $card_id = "", $merchant_id = "", $secret = "") {
	return md5($method . '-' . $time . '-' . $amount . '-' . $user_id . '-' . $card_id . '-' . $merchant_id . '-' . $secret);
}

function gen_code_login($user_username, $merchant_id, $session, $date, $secret_key) {
	return md5($user_username . '-' . $merchant_id . '-' . $session . '-' . $date . '-' . $secret_key);
}

function month_name($num = 0) {
	$num = (int)($num);
	$months[1] = 'มกราคม';
	$months[2] = 'กุมภาพันธ์';
	$months[3] = 'มีนาคม';
	$months[4] = 'เมษายน';
	$months[5] = 'พฤษภาคม';
	$months[6] = 'มิถุนายน';
	$months[7] = 'กรกฎาคม';
	$months[8] = 'สิงหาคม';
	$months[9] = 'กันยายน ';
	$months[10] = 'ตุลาคม';
	$months[11] = 'พฤศจิกายน';
	$months[12] = 'ธันวาคม';

	return @$months[$num];
}

function month_name2($num = 0) {
	$num = (int)($num);
	$months[1] = 'ม.ค.';
	$months[2] = 'ก.พ.';
	$months[3] = 'มี.ค.';
	$months[4] = 'เม.ย.';
	$months[5] = 'พ.ค.';
	$months[6] = 'มิ.ย.';
	$months[7] = 'ก.ค.';
	$months[8] = 'ส.ค.';
	$months[9] = 'ก.ย.';
	$months[10] = 'ต.ค.';
	$months[11] = 'พ.ย.';
	$months[12] = 'ธ.ค.';

	return @$months[$num];
}

// ฟังก์ชั่น วัน
function dateDiff($date1, $date2) {

	$diff = abs(strtotime($date2) - strtotime($date1));

	$years = floor($diff / (365 * 60 * 60 * 24));
	$months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
	$days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));

	return "$years ปี $months เดือน $days วัน";
}

function dateDiff2($date1, $date2) {

	if (!empty($date2)) {
		$diff = abs(strtotime($date2) - strtotime($date1));
		$days = floor($diff / 3600 / 24);
	} else {
		$days = 0;
	}

	return (int)($days);
}

function dateDiff3($date1, $date2) {

	if (!empty($date2)) {
		$diff = (strtotime($date2) - strtotime($date1));
		$days = floor($diff / 3600 / 24);
	} else {
		$days = 0;
	}

	return (int)($days);
}

function getMinHour($num = 0) {

	$h = floor(($num) / 60);
	$m = $num - ($h * 60);

	$txt = "";

	if (!empty($h)) {
		$txt .= "$h ชั่วโมง ";
	}

	if (!empty($m)) {
		$txt .= "$m นาที";
	}

	return $txt;
}

function getMinHour2($num = 0) {

	$h = floor(($num) / 60);
	$m = $num - ($h * 60);
	$m = str_pad($m, 2, "0", STR_PAD_LEFT);

	return "$h.$m";
}

// +วัน แบบไม่รวม เสาร์ อาทิตย์
function dateIncNoHoliday($dates, $day) {

	// วันที่เริ่ม
	$day_name = date("D", strtotime($dates));

	if ($day_name == "Sat") {
		$dates2 = date("Y-m-d", strtotime("+" . ($day + 2) . " day", strtotime($dates)));
	} else if ($day_name == "Sun") {
		$dates2 = date("Y-m-d", strtotime("+" . ($day + 2) . " day", strtotime($dates)));
	} else {
		if ($day >= 7) {
			$dates2 = date("Y-m-d", strtotime("+" . ($day + 2) . " day", strtotime($dates)));
		} else {
			$dates2 = date("Y-m-d", strtotime("+" . ($day) . " day", strtotime($dates)));
		}
	}

	$day_name = date("D", strtotime($dates2));

	if ($day_name == "Sat") {
		$dates2 = date("Y-m-d", strtotime("+" . ($day + 1) . " day", strtotime($dates)));
	} else if ($day_name == "Sun") {
		$dates2 = date("Y-m-d", strtotime("+" . ($day + 3) . " day", strtotime($dates)));
	} else {
		$dates2 = date("Y-m-d", strtotime("+" . ($day + 1) . " day", strtotime($dates)));
	}

	return $dates2;
}

function dateInc($dates, $day) {

	$dates = date("Y-m-d", strtotime("+" . $day . " day", strtotime($dates)));

	return $dates;
}

function dateIncYear($dates, $year) {

	$dates = date("Y-m-d", strtotime("+" . $year . " year", strtotime($dates)));

	return $dates;
}

function dateDec($dates, $day) {

	$dates = date("Y-m-d", strtotime("-" . $day . " day", strtotime($dates)));

	return $dates;
}

function dateCount($dates1, $dates2, $today = "") {

	$start = strtotime($dates1);
	$end = strtotime($dates2);

	$days_between = ceil(abs($end - $start) / 86400);

	if ($days_between == "Y") {
		$days_between = $days_between + 1;
	}

	return $days_between;
}

function textarea($name = "", $value = "", $height = 180, $format = "basic") {

	if ($format == "basic") {
		echo "
    		<textarea name=\"" . $name . "\" id=\"" . $name . "\" cols=\"2\">" . $value . "</textarea>
    	    <script type=\"text/javascript\">
                var textarea = '" . $name . "';
                if (CKEDITOR.instances['textarea']) { CKEDITOR.instances['textarea'].destroy(true); }
                CKEDITOR.replace(textarea,{
                    toolbar :
                    [
                       ['Bold','Italic','Underline','Strike']
                    ],
                    enterMode : CKEDITOR.ENTER_BR,
                   	autoParagraph : false,
                    height : " . $height . ",
                    language: 'en'
                });
            </script>
    	";
	} else if ($format == "basic2") {
		echo "
    		<textarea name=\"" . $name . "\" id=\"" . $name . "\" cols=\"2\">" . $value . "</textarea>
    	    <script type=\"text/javascript\">
                var textarea = '" . $name . "';
                if (CKEDITOR.instances['textarea']) { CKEDITOR.instances['textarea'].destroy(true); }
                CKEDITOR.replace(textarea,{
                    toolbar :
                    [
                       ['Bold','Italic','Underline','Strike'],['TextColor','BGColor']
                    ],
                    enterMode : CKEDITOR.ENTER_BR,
                   	autoParagraph : false,
                    height : " . $height . ",
                    language: 'en'
                });
            </script>
    	";
	} else if ($format == "style1") {
		echo "
    		<textarea name=\"" . $name . "\" id=\"" . $name . "\" cols=\"2\">" . $value . "</textarea>
    	    <script type=\"text/javascript\">
                var textarea = '" . $name . "';
                if (CKEDITOR.instances['textarea']) { CKEDITOR.instances['textarea'].destroy(true); }
                CKEDITOR.replace(textarea,{
                    toolbar :
                    [
                       ['FontSize'],['Bold','Italic','Underline','Strike'],['TextColor','BGColor'],['Image','-','Link'],
                       ['NumberedList','BulletedList']
                    ],
                    enterMode : CKEDITOR.ENTER_BR,
                   	autoParagraph : false,
                    height : " . $height . ",
                    language: 'en',
					filebrowserBrowseUrl 		: '../templates/ckfinder/ckfinder.html',
					filebrowserImageBrowseUrl 	: '../templates/ckfinder/ckfinder.html?Type=Images',
					filebrowserFlashBrowseUrl 	: '../templates/ckfinder/ckfinder.html?Type=Flash',
					filebrowserUploadUrl 		: '../templates/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
					filebrowserImageUploadUrl 	: '../templates/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
					filebrowserFlashUploadUrl 	: '../templates/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

                });
            </script>
    	";
	} else if ($format == "style2") {
		echo "
    		<textarea name=\"" . $name . "\" id=\"" . $name . "\" cols=\"2\">" . $value . "</textarea>
    	    <script type=\"text/javascript\">
                var textarea = '" . $name . "';
                if (CKEDITOR.instances['textarea']) { CKEDITOR.instances['textarea'].destroy(true); }
                CKEDITOR.replace(textarea,{
                    toolbar :
                    [
                       ['FontSize'],['Bold','Italic','Underline','Strike'],['TextColor','BGColor'],['Link'],
                       ['NumberedList','BulletedList']
                    ],
                    enterMode : CKEDITOR.ENTER_BR,
                   	autoParagraph : false,
                    height : " . $height . ",
                    language: 'en'
                });
            </script>
    	";
	}
}

function pagetime_start() {
	$mtime = @microtime();
	$mtime = @explode(" ", $mtime);
	$mtime = $mtime[1] + $mtime[0];
	$starttime = $mtime;

	return $starttime;
}

function pagetime_end($starttime = 0) {
	$mtime = @microtime();
	$mtime = @explode(" ", $mtime);
	$mtime = $mtime[1] + $mtime[0];
	$endtime = $mtime;
	$totaltime = ($endtime - $starttime);

	echo "<br><font style=\"font-size: 8pt;\">หน้านี้ประมวลผล " . number_format($totaltime, 2) . " วินาที</font>";
}

// ลบไฟล์แคชที่เกินกำหนด
function delete_cache() {
	if ($handle = @opendir('cache')) {
		while (false !== ($entry = @readdir($handle))) {
			$n = basename($entry);
			if ($n != "." && $n != "..") {
				$path = './cache/' . $entry . "/";
				if ($handle2 = @opendir($path)) {
					//echo $path. "<br>";

					while (false !== ($file = @readdir($handle2))) {
						@$file2 = "$path$file";
						$filelastmodified = @filemtime($file2);

						if ((time() - $filelastmodified) > (0.02 * 3600)) {
							@unlink($file2);
						}
					}
					@closedir($handle2);
				}

			}
		}
		@closedir($handle);
	}
}

// แปลง excel วันที่นำเข้าเป็น 1970-01-01
function convertSerialDate($date = "") {
	if (!empty($date)) {
		$timestamp = ($date - 25569) * 86400;
		$timestamp -= 3600 * 7;
		$date = date("Y-m-d H:i:s", $timestamp);
	} else {
		$date = "";
	}
	return $date;
}

function convertSerialDateNoTime($date = "") {
	if (!empty($date)) {
		$timestamp = ($date - 25569) * 86400;
		$timestamp -= 3600 * 7;
		$date = date("Y-m-d", $timestamp);
	} else {
		$date = "";
	}
	return $date;
}

// แปลง excel เวลานำเข้าเป็นทศนิยม
function convertSerialTime($date = "") {
	if (!empty($date)) {
		$timestamp = ($date - 25569) * 86400;
		$timestamp -= (3600 * 6) + 1696;
		$date = gmdate("H:i:s", $timestamp);
	} else {
		$date = "";
	}
	return $date;
}

function genColor() {
	$characters = 'ABCDEF0123456789';
	$hexadecimal = '#';
	for ($i = 1; $i <= 6; $i++) {
		$position = rand(0, strlen($characters) - 1);
		$hexadecimal .= $characters[$position];
	}
	return $hexadecimal;
}

function convertThaiBaht($number) {

	$txtnum1 = array(
		'ศูนย์',
		'หนึ่ง',
		'สอง',
		'สาม',
		'สี่',
		'ห้า',
		'หก',
		'เจ็ด',
		'แปด',
		'เก้า',
		'สิบ'
	);
	$txtnum2 = array(
		'',
		'สิบ',
		'ร้อย',
		'พัน',
		'หมื่น',
		'แสน',
		'ล้าน',
		'สิบ',
		'ร้อย',
		'พัน',
		'หมื่น',
		'แสน',
		'ล้าน'
	);

	$number = str_replace(",", "", $number);
	$number = str_replace(" ", "", $number);
	$number = str_replace("บาท", "", $number);
	$number = explode(".", $number);

	if (sizeof($number) > 2) {
		return 'ตำแหน่งทศนิยมเกิน';
		exit ;
	}

	$strlen = strlen($number[0]);
	$convert = '';
	for ($i = 0; $i < $strlen; $i++) {
		$n = substr($number[0], $i, 1);
		if ($n != 0) {
			if ($i == ($strlen - 1) AND $n == 1) { $convert .= 'เอ็ด';
			} elseif ($i == ($strlen - 2) AND $n == 2) {  $convert .= 'ยี่';
			} elseif ($i == ($strlen - 2) AND $n == 1) { $convert .= '';
			} else { $convert .= $txtnum1[$n];
			}
			$convert .= $txtnum2[$strlen - $i - 1];
		}
	}

	$convert .= 'บาท';
	if ($number[1] == '0' OR $number[1] == '00' OR $number[1] == '') {
		$convert .= 'ถ้วน';
	} else {
		$strlen = strlen($number[1]);
		for ($i = 0; $i < $strlen; $i++) {
			$n = substr($number[1], $i, 1);
			if ($n != 0) {
				if ($i == ($strlen - 1) AND $n == 1) {$convert .= 'เอ็ด';
				} elseif ($i == ($strlen - 2) AND $n == 2) {$convert .= 'ยี่';
				} elseif ($i == ($strlen - 2) AND $n == 1) {$convert .= '';
				} else { $convert .= $txtnum1[$n];
				}
				$convert .= $txtnum2[$strlen - $i - 1];
			}
		}
		$convert .= 'สตางค์';
	}
	return $convert;
}

// สำหรับ หา คอลัม excel
// $columns = get_column_range('A', 'AZ');
function get_column_range($start_column = "A", $end_column = "Z") {

	$start_column = strtoupper($start_column);
	$end_column = strtoupper($end_column);

	$s = alpha2num($start_column);
	$e = alpha2num($end_column);

	$columns = array();

	for ($i = $s; $i <= $e; $i++)
		$columns[] = num2alpha($i);

	return $columns;
}

function alpha2num($a = "") {
	$l = strlen($a);
	$n = 0;
	for ($i = 0; $i < $l; $i++)
		$n = $n * 26 + ord($a[$i]) - 0x40;

	return $n - 1;
}

function num2alpha($n = "") {
	for ($r = ""; $n >= 0; $n = intval($n / 26) - 1)
		$r = chr($n % 26 + 0x41) . $r;
	return $r;
}

function number_format2($number = 0) {
	if (is_numeric($number)) {// a number
		if (!$number) {// zero
			$number = '0.00';
			// output zero
		} else {// value
			if (floor($number) == $number) {// whole number
				$number = number_format($number, 2);
				// format
			} else {// cents
				$number = number_format(round($number, 2), 2);
				// format
			} // integer or decimal
		}// value
		return ' ' . $number;
	} // numeric
}

function get_browser_name() {
	$user_agent = $_SERVER['HTTP_USER_AGENT'];

	if (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR/'))
		return 'Opera';
	else if (strpos($user_agent, 'Edge'))
		return 'Edge';
	else if (strpos($user_agent, 'Chrome'))
		return 'Chrome';
	else if (strpos($user_agent, 'Safari'))
		return 'Safari';
	else if (strpos($user_agent, 'Firefox'))
		return 'Firefox';
	else if (strpos($user_agent, 'MSIE') || strpos($user_agent, 'Trident/7'))
		return 'IE';
	else
		return 'Other';
}

function date_hour_dif($begin, $end) {
	$remain = intval(strtotime($end) - strtotime($begin));
	$wan = floor($remain / 86400);
	$l_wan = $remain % 86400;
	$hour = floor($l_wan / 3600);
	$l_hour = $l_wan % 3600;
	$minute = floor($l_hour / 60);
	$second = $l_hour % 60;
	if ($wan == 0) {
		if ($hour == 0) {
			$dif = $minute . " นาที";
		} else {
			$dif = $hour . " ชม. " . $minute . " นาที";
		}
	} else {
		if ($hour == 0) {
			$dif = $wan . " วัน " . $minute . " นาที";
		} else {
			$dif = $wan . " วัน " . $hour . " ชม. " . $minute . " นาที";
		}
	}

	return $dif;
}

function number_acc($num = 0) {

	$txt = ($num < 0) ? '<span style="color: #FF0000">(' . @__price(abs($num)) . ')</span>' : '<span style="color: #000000">' . @__price(abs($num)) . '</span>';

	return $txt;
}

function ascii2str($str) {
	$arr = array(
		"&#32;" => ' ',
		"&#33;" => '!',
		"&#34;" => '"',
		"&#35;" => '#',
		"&#36;" => '$',
		"&#37;" => '%',
		"&#38;" => '&',
		"&#39;" => "'",
		"&#40;" => '(',
		"&#41;" => ')',
		"&#42;" => '*',
		"&#43;" => '+',
		"&#44;" => ',',
		"&#45;" => '-',
		"&#46;" => '.',
		"&#47;" => '/',
		"&#48;" => '0',
		"&#49;" => '1',
		"&#50;" => '2',
		"&#51;" => '3',
		"&#52;" => '4',
		"&#53;" => '5',
		"&#54;" => '6',
		"&#55;" => '7',
		"&#56;" => '8',
		"&#57;" => '9',
		"&#58;" => ':',
		"&#59;" => ';',
		"&#60;" => '<',
		"&#61;" => '=',
		"&#62;" => '>',
		"&#63;" => '?',
		"&#64;" => '@',
		"&#65;" => 'A',
		"&#66;" => 'B',
		"&#67;" => 'C',
		"&#68;" => 'D',
		"&#69;" => 'E',
		"&#70;" => 'F',
		"&#71;" => 'G',
		"&#72;" => 'H',
		"&#73;" => 'I',
		"&#74;" => 'J',
		"&#75;" => 'K',
		"&#76;" => 'L',
		"&#77;" => 'M',
		"&#78;" => 'N',
		"&#79;" => 'O',
		"&#80;" => 'P',
		"&#81;" => 'Q',
		"&#82;" => 'R',
		"&#83;" => 'S',
		"&#84;" => 'T',
		"&#85;" => 'U',
		"&#86;" => 'V',
		"&#87;" => 'W',
		"&#88;" => 'X',
		"&#89;" => 'Y',
		"&#90;" => 'Z',
		"&#91;" => '[',
		"&#92;" => '\\',
		"&#93;" => ']',
		"&#94;" => '^',
		"&#95;" => '_',
		"&#96;" => '`',
		"&#97;" => 'a',
		"&#98;" => 'b',
		"&#99;" => 'c',
		"&#100;" => 'd',
		"&#101;" => 'e',
		"&#102;" => 'f',
		"&#103;" => 'g',
		"&#104;" => 'h',
		"&#105;" => 'i',
		"&#106;" => 'j',
		"&#107;" => 'k',
		"&#108;" => 'l',
		"&#109;" => 'm',
		"&#110;" => 'n',
		"&#111;" => 'o',
		"&#112;" => 'p',
		"&#113;" => 'q',
		"&#114;" => 'r',
		"&#115;" => 's',
		"&#116;" => 't',
		"&#117;" => 'u',
		"&#118;" => 'v',
		"&#119;" => 'w',
		"&#120;" => 'x',
		"&#121;" => 'y',
		"&#122;" => 'z',
		"&#123;" => '{',
		"&#124;" => '|',
		"&#125;" => '}',
		"&#126;" => '~'
	);
	return strtr($str, $arr);
}

function genPassword2($passwordLength = 8, $characters = "lower_case,upper_case,numbers,special_symbols") {

	$numbers_array = array();
	$upper_letters_array = array();
	$lower_letters_array = array();
	$special_chars_array = array();

	$selected = 0;

	$arrPassword = array();
	$strPassword = "";

	for ($i = 49; $i < 58; $i++) {
		@array_push($numbers_array, chr($i));
	}

	for ($i = 65; $i < 91; $i++) {
		if ($i != 73 && $i != 79) {
			@array_push($upper_letters_array, chr($i));
		}
	}

	for ($i = 97; $i < 123; $i++) {
		if ($i != 111 && $i != 108) {
			@array_push($lower_letters_array, chr($i));
		}
	}

	$special_chars_array = array(
		chr(33),
		chr(35),
		chr(36),
		chr(37),
		chr(38),
		chr(42),
		chr(45),
		chr(58),
		chr(60),
		chr(62),
		chr(64),
	);

	$selOptions = @count($upper_letters_array) + count($lower_letters_array) + count($numbers_array) + count($special_chars_array);

	$optionLength = @ceil($passwordLength / $selOptions);

	if (count($upper_letters_array) >= 1) {
		$password = array();

		for ($i = 0; $i < $optionLength; $i++) {
			@array_push($password, $upper_letters_array[rand(0, (count($upper_letters_array) - 1))]);
		}

		$arrPassword[] = @implode($password);
		$selected++;
	}

	if (count($numbers_array) >= 1) {
		$password = array();

		for ($i = 0; $i < $optionLength; $i++) {
			@array_push($password, $numbers_array[rand(0, (count($numbers_array) - 1))]);
		}

		$arrPassword[] = @implode($password);
		$selected++;
	}

	if (count($lower_letters_array) >= 1) {
		$password = array();

		for ($i = 0; $i < $optionLength; $i++) {
			@array_push($password, $lower_letters_array[rand(0, (count($lower_letters_array) - 1))]);
		}

		$arrPassword[] = @implode($password);
		$selected++;
	}

	if (count($special_chars_array) >= 1) {
		$password = array();

		for ($i = 0; $i < $optionLength; $i++) {
			@array_push($password, $special_chars_array[rand(0, (count($special_chars_array) - 1))]);
		}

		$arrPassword[] = @implode($password);
		$selected++;
	}

	$remained = ($passwordLength - ($selected * $optionLength));

	if (count($lower_letters_array) >= 1) {

		for ($i = 0; $i < $remained; $i++) {
			$password = array();
			@array_push($password, $lower_letters_array[rand(0, (count($lower_letters_array) - 1))]);
			$arrPassword[] = @implode($password);
			$selected++;
		}

	}

	@shuffle($arrPassword);

	$strPassword = @implode($arrPassword);

	return $strPassword;
}

// ใช้สำหรับกราฟ
function strchart_clear($str = "") {

	/*
	 $str1 = "0, 0, 0, 0, 0, 0, 12051, 87410, 55041, 750000, 47800, 9115, 7230";
	 $str2 = "12051, 87410, 55041, 750000, 478000, 0, 0, 0, 0, 0, 0, 0";
	 $str3 = "0, 300, 87410, 99008, 3024000, 0, 0, 0, 5807, 0, 1415, 18202, 0";
	 */

	$arrStr = array();
	$arrStrTemp = array();

	$arrStr = explode(", ", $str);

	$str_first = "";
	$str_last = "";

	// หาตำแหน่งน้อยสุด
	for ($i = 0; $i < count($arrStr); $i++) {
		$str_temp = @trim($arrStr[$i]);
		if ($str_temp >= 1 && $str_first == "") {
			$str_first = 0;
		}
	}

	// หาตำแหน่งมากสุด
	for ($i = count($arrStr); $i > 0; $i--) {
		$str_temp = @trim($arrStr[$i]);
		if ($str_temp >= 1 && $str_last == "") {
			$str_last = $i;
		}
	}

	for ($i = 0; $i < count($arrStr); $i++) {
		if ($i >= $str_first && $i <= $str_last) {

			$str_temp = @trim($arrStr[$i]);

			if ($i <= $str_last) {
				$arrStrTemp[$i] = $str_temp;
			}

		} else {
			if ($i <= $str_last && count($arrStr) >= $i) {
				$arrStrTemp[$i] = 0;
			} else {
				$arrStrTemp[$i] = "";
			}

		}
	}

	$text = @implode(", ", $arrStrTemp);

	return $text;
}

function changeBoxtype($box_type) {

	if ($box_type == "01") {
		$box_type = "BT-01";
	} else if ($box_type == "01A") {
		$box_type = "BT-01A";
	} else if ($box_type == "R&D") {
		$box_type = "R-D";
	} else if ($box_type == "Duplicate") {
		$box_type = "duplicate";
	} else if ($box_type == "02") {
		$box_type = "BT-02";
	} else if ($box_type == "Coin Exchange") {
		$box_type = "EX";
	} else if ($box_type == "Oil-GAS95") {
		$box_type = "OIL";
	} else if ($box_type == "Vending") {
		$box_type = "VM";
	} else if ($box_type == "03B") {
		$box_type = "BT-03B";
	} else if ($box_type == "RO" || $box_type == "RO Water") {
		$box_type = "RO";
	} else if ($box_type == "RO Water 02") {
		$box_type = "RO-02";
	} else if ($box_type == "Condom") {
		$box_type = "CD";
	} else if ($box_type == "Counter Service") {
		$box_type = "CS";
	} else if ($box_type == "01B") {
		$box_type = "BT-01B";
	} else {
		$box_type = "";
	}

	return $box_type;
}

function strpos_arr($haystack, $needles = array(), $offset = 0) {
	$chr = array();
	foreach ($needles as $needle) {
		$res = strpos($haystack, $needle, $offset);
		if ($res !== false)
			$chr[$needle] = $res;
	}
	if (empty($chr))
		return false;
	return min($chr);
}

// api url
function api_url($project = "") {

	// production
	$arrApi["ams"] = "http://ams.forthsmart.co.th/";
	$arrApi["dms"] = "http://dms.forthsmart.co.th/";

	// test
	$arrApiTest["ams"] = "http://127.0.0.1/ams/";
	$arrApiTest["dms"] = "http://127.0.0.1/dms/";

	if (!empty($project)) {
		if ($_SERVER['SERVER_ADDR'] == '192.168.50.221') {
			return @$arrApi["$project"];
		} else {
			return @$arrApiTest["$project"];
		}
	} else {
		return null;
	}
}

function get_numchange($nums2 = 0, $nums1 = 0) {

	$nums = @($nums2 - $nums1);

	if ($nums >= 1) {
		$nums = "<font color='#21610B'>+" . @__number($nums) . "</font>";
	} else if ($nums == 0) {
		$nums = "<font color='#000000'>" . @__number($nums) . "</font>";
	} else {
		$nums = "<font color='#FF0000'>" . @__number($nums) . "</font>";
	}

	return $nums;
}

// downline file และ ลบไฟล์ที่เกินกว่า 15 นาทีออกจาก server
function dl_export($file_path = "") {

	$path = "export_temp";

	$handle = @opendir($path);

	while (false !== ($file = readdir($handle))) {
		if ($file != "." && $file != "..") {
			$Diff = (time() - filectime("$path/$file")) / 15;
			if ($Diff > 14)
				@unlink("$path/$file");
		}
	}

	@closedir($handle);

	return redirect($file_path);
}

// สำหรับหาค่าช่องใน excel
function get_cloume_excel($num = 0) {

	$char = "A";

	for ($i = 0; $i <= $num; $i++) {
		$char++;
	}

	return $char;
}

// สำหรับแสดงค่าในช่อง excel
function load_cloume_excel() {

	$char = "A";

	for ($i = 0; $i <= 800; $i++) {
		$data[] = $char;
		$char++;
	}

	return $data;
}

//สร้างโฟร์เดอร์
function mk_directory($path = '') {
	if (!empty($path)) {
		$path = explode('/', $path);
		$a = '';
		foreach ($path as $key => $row) {
			$a .= $row . '/';
			if (!file_exists($a)) {
				mkdir($a, 0777);
				chmod($a, 0777);
			}

		}
	}
}

//เช็คไฟล์ชื่อซ้ำหรือป่าว
function check_file_name($path = '') {
	if (file_exists($path)) {
		$i = 1;
		// get file extension
		$directory = pathinfo($path, PATHINFO_DIRNAME);

		// get file extension
		$extension = pathinfo($path, PATHINFO_EXTENSION);

		// get file's name
		$filename = pathinfo($path, PATHINFO_FILENAME);

		while (file_exists($path)) {
			// add and combine the filename, iterator, extension
			$new_filename = $filename . '_' . $i . '.' . $extension;

			// add file name to the end of the path to place it in the new directory; the while loop will check it again
			$path = $directory . '/' . $new_filename;
			$i++;
		}
	}
	return $path;
}

function month_quarter($dates = "") {

	$dates = date("Y-m", strtotime($dates));
	$year = date("Y", strtotime($dates));
	$num = date("n", strtotime($dates));

	if ($num >= 1 && $num <= 3) {
		$quarter = $year . "Q1";
	} else if ($num >= 4 && $num <= 6) {
		$quarter = $year . "Q2";
	} else if ($num >= 7 && $num <= 9) {
		$quarter = $year . "Q3";
	} else if ($num >= 10 && $num <= 12) {
		$quarter = $year . "Q4";
	}

	return $quarter;

}

// หาจำนวนวันในแต่ละเดือน Y-m
function get_month($dates = "", $num = "") {

	$dates = date("Y-m", strtotime($dates));

	if (empty($num)) {
		$month = 1;
	} else {
		$month = $num;
	}

	$set_month = "-" . $month . " month";

	$date2 = date("Y-m", strtotime("$set_month", strtotime($dates)));

	return $date2;
}

// หาเดือน
function monthDiff($date1, $date2) {

	$diff = abs(strtotime($date2) - strtotime($date1));

	$years = floor($diff / (365 * 60 * 60 * 24));
	$months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
	$days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));

	if (!empty($years)) {
		$months = $months + ($years * 12);
	} else if (!empty($months)) {
		$months = $months + ($years * 12);
	} else {
		$months = 0;
	}

	return "$months";
}

function weekDiff($date1, $date2) {

	$s_day = date("j", strtotime($date1));
	$s_month = date("n", strtotime($date1));

	$e_day = date("j", strtotime($date2));
	$e_month = date("n", strtotime($date2));

	if ($s_day >= 1 && $s_day <= 7) {
		$s_w = 1;
	} else if ($s_day >= 8 && $s_day <= 14) {
		$s_w = 2;
	} else if ($s_day >= 15 && $s_day <= 21) {
		$s_w = 3;
	} else if ($s_day >= 22 && $s_day <= 31) {
		$s_w = 4;
	}

	if ($e_day >= 1 && $e_day <= 8) {
		$e_w = 1;
	} else if ($e_day >= 9 && $e_day <= 15) {
		$e_w = 2;
	} else if ($e_day >= 16 && $e_day <= 22) {
		$e_w = 3;
	} else if ($e_day >= 23 && $e_day <= 31) {
		$e_w = 4;
	}

	if ($e_month == $s_month) {
		$week_num = (($e_w - $s_w) + 1);
	} else {
		$week_num = ((($e_month - $s_month) * 4) + (($e_w - $s_w) + 1));
	}

	if (empty($date1) && empty($date2)) {
		$week_num = 0;
	}

	return $week_num;



	function month_name($num = 0) {
		$num = (int)($num);
		$months[1] = 'มกราคม';
		$months[2] = 'กุมภาพันธ์';
		$months[3] = 'มีนาคม';
		$months[4] = 'เมษายน';
		$months[5] = 'พฤษภาคม';
		$months[6] = 'มิถุนายน';
		$months[7] = 'กรกฎาคม';
		$months[8] = 'สิงหาคม';
		$months[9] = 'กันยายน ';
		$months[10] = 'ตุลาคม';
		$months[11] = 'พฤศจิกายน';
		$months[12] = 'ธันวาคม';

		return @$months[$num];
	}

	function month_name2($num = 0) {
		$num = (int)($num);
		$months[1] = 'ม.ค.';
		$months[2] = 'ก.พ.';
		$months[3] = 'มี.ค.';
		$months[4] = 'เม.ย.';
		$months[5] = 'พ.ค.';
		$months[6] = 'มิ.ย.';
		$months[7] = 'ก.ค.';
		$months[8] = 'ส.ค.';
		$months[9] = 'ก.ย.';
		$months[10] = 'ต.ค.';
		$months[11] = 'พ.ย.';
		$months[12] = 'ธ.ค.';

		return @$months[$num];
	}


	//หาวันของระบบลา
	function diffdayscore($day,$hour,$minute){
		//คำนวณเอาวันแปลงเป็นวิ
		$day_to_s=$day*24*60*60;
		//เอาชั่วโมงแปลงเป็นวิ
		$hour_to_s=$hour*60*60;
		//เอานาทีแปลงเป็นวิ
		$minute_to_s=$minute*60;
		
		$txt_all =$day_to_s+$hour_to_s+$minute_to_s;
		return $txt_all;
	}
	//หาชั่วโมงของระบบลา
	/* function diffhourcore($hour1,$hour2){
		$hour1-$hour2=$allhour;
		return $allhour;
	} */

	//หานาทีของระบบลา
	/* function diffminutescore($minute1,$minute2){
		$minute1-$minute2=$allminute;
		return $allminute;
	} */

	

}
