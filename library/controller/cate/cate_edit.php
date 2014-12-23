<?php
$cate = new Model_Category_Category;
// Kiểm tra quyền admin
require('lib/check_manager.php');
if (!isset($_GET["id"])) {
    header("location: index.php?module=cate&action=list");
    exit();
}
$id = $_GET["id"];
// Sau khi nhấn nút btnCateAdd
if (isset($_POST["btnCateEdit"])) {
    if($cate->UpdateCategory($_POST["txtCate"], $id)) {
        header("location: index.php?module=cate&action=list");
        exit();
    }
}
require('view/cate/cate_edit.php');

?>