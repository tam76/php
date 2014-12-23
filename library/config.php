<?php
if (isset($_SERVER['HTTP_HOST']))
{
	$base_url = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
	$base_url .= '://'. $_SERVER['HTTP_HOST'];
	$base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
}

else
{
	$base_url = 'http://localhost/';
}
/** Cấu hình đường dẫn đến site dành cho KCFinder **/
$siteURL = $base_url; // Không có dấu / ở cuối đường dẫn 

/** Cấu hình cookie, session **/
define('PREFIX','library_');
 // Tiếp đầu ngữ cho các cookie hoặc session

/** Cấu hình kết nối MySQL DBMS **/
define('HOST_NAME','localhost');
define('HOST_USER','root');
define('HOST_PASS','');
define('DB_NAME','thu_vien');

/** Cấu hình cho username **/
define('USER_MIN_LEN',5);
$username_exclude_chars = array("'", '"', "-", "_", " ");

/** Cấu hình cho năm xuất bản **/
define('MIN_BOOK_YEAR',1990);

/** Cấu hình giới hạn show tin **/
$limit = 4;
$home_limit = 10;
$pagePerSegment = 5;

/** Cấu hình upload hình tin **/
$accept_img = array("bmp","jpg", "gif", "png");

/** Cấu hình upload book **/
$accept_file = array("pdf");

/** Cấu hình thời gian **/
date_default_timezone_set('GMT');
$local_timezone = 7;
function __autoload($name) {
    $name = strtolower($name);
    if (file_exists('class/'.$name.'.php')) {
        require_once('class/'.$name.'.php');
    } else {
        $name= str_replace('_','/',$name);
        require_once($name.'.php');
    }
}

?>