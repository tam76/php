<?php

$book = new Model_Books_Books;
// Kiểm tra quyền admin
require('lib/check_manager.php');
// Chuẩn bị giá trị
if (!isset($_GET["id"])) {
    header("location: index.php?module=books&action=list");
    exit();
}
$id = $_GET["id"];
if($book->Delbook($id)) {
    header("location: index.php?module=books&action=cache&toto=del&id=".$id."&old_cate=".$book->GetCateid());
}
?>