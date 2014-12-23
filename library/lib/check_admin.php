<?php

// Khởi động bộ session
session_start();
// Kiểm tra quyền admin
if ($_SESSION[PREFIX."level"] != 1) {
    header("location: index.php?module=admin&direction=main");
    exit();
}
$_SESSION['KCFINDER'] = array();
$_SESSION['KCFINDER']['disabled'] = false;
$_SESSION['KCFINDER']['uploadURL'] = $siteURL;
$_SESSION['KCFINDER']['uploadDir'] = "";


?>