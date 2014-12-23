<?php

if(isset($_GET['direction'])){
    $direction=$_GET["direction"];
    switch($direction) {
        case "main":
            require_once('controller/admin/main.php');
            //require_once('controller/user.php');
            break;
        case "login":
            require_once('controller/admin/login/login.php');
            break;
        case "logout":
            require_once('controller/admin/logout/logout.php');
            break;
        default:
            require_once('controller/admin/main.php');
    }
} else {
    require_once('controller/admin/main.php');
}

?>