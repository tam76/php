<?php
if(isset($_GET["action"])){
    $action=$_GET["action"];
    switch($action){
        case "list":
            require ('controller/user/user_list.php');
            break;
        case "add":
            require ('controller/user/user_add.php');
            break;
        case "edit":
            require ('controller/user/user_edit.php');
            break;
        case "del":
            require ('controller/user/user_del.php');
            break;
        default :
            require ('controller/user/user_list.php');
    }
}else {
    require ('controller/user/user_list.php');
}
?>