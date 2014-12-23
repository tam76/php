<?php

if(isset($_GET["action"])){
    $action=$_GET["action"];
    switch($action){
        case "list":
            require ('controller/cate/cate_list.php');
            break;
        case "add":
            require ('controller/cate/cate_add.php');
            break;
        case "edit":
            require ('controller/cate/cate_edit.php');
            break;
        case "del":
            require ('controller/cate/cate_del.php');
            break;
        default :
            require ('controller/cate/cate_list.php');
    }
}else {
    require ('controller/cate/cate_list.php');
}

?>