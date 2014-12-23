<?php
// Gọi cấu hình site
require('config.php');

// Ta nhận request trực tiếp từ người dùng
if(isset($_GET['module'])){
    $module=$_GET["module"];
    switch($module) {
        case "main":
            require_once('controller/main/main.php');
            break;
        case "category":
            require_once('controller/category/category.php');
            break;
        case "cart":
            require_once('controller/account/cart/cart.php');
            break;
        case "bookcase":
            require_once('controller/account/bookcase/bookcase.php');
            break;
        case "registration":
            require_once('controller/account/registration/registration.php');
            break;
        case "asset":
            require_once('controller/account/asset/asset.php');
            break;
        case "book":
            require_once('controller/account/book/book.php');
            break;
        case "search":
            require_once('controller/search/search.php');
            break;
        case "admin":
            require_once('controller/admin.php');
            break;
        case "user":
            require_once('controller/user.php');
            break;
        case "cate":
            require_once('controller/cate.php');
            break;
        case "books":
            require_once('controller/books.php');
            break;
        default:
            require_once('controller/main/main.php');
    }
} else {
    require_once('controller/main/main.php');
}
?>