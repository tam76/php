<?php
session_start();
$book = new Model_Books_Books;
if(!isset($_SESSION[PREFIX."userid"]) && !isset($_SESSION[PREFIX."bookcase"])){
    header("content-type: text/html; charset=utf-8");
    echo '
    <script type="text/javascript">
        alert("Bạn phải đăng nhập để vào tủ sách");
        window.location = "index.php";
    </script>';
}

include("view/account/bookcase/bookcase.php");

?>