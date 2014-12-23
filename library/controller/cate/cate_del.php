<?php

$cate = new Model_Category_Category;
// Kiểm tra quyền admin
require('lib/check_manager.php');
// Chuẩn bị giá trị
if (!isset($_GET["id"])) {
    header("location: index.php?module=cate&action=list");
    exit();
}
$id = $_GET["id"];
// Xóa
$cate->DelCategory($id);
header("location: index.php?module=cate&action=list");

?>