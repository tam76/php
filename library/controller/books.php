<?php
if(isset($_GET["action"])){
    $action=$_GET["action"];
    switch($action){
        case "list":
            require ('controller/book/book_list.php');
            break;
        case "add":
            require ('controller/book/book_add.php');
            break;
        case "edit":
            require ('controller/book/book_edit.php');
            break;
        case "del":
            require ('controller/book/book_del.php');
            break;
        case "cache":
            require ('controller/book/book_cache.php');
            break;
        default :
            require ('controller/book/book_list.php');
    }
}else {
    require ('controller/book/book_list.php');
}

?>