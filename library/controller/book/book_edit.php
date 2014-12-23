<?php

$book = new Model_Books_Books;
// Kiểm tra quyền admin
require('lib/check_manager.php');

if (!isset($_GET["id"])) {
    header("location: index.php?module=books&action=list");
    exit();
}
$id = $_GET["id"];
$book->Infobook($id);
$old_cate = $book->GetCateid();
// Sau khi nhấn nút btnBookEdit
if (isset($_POST["btnBookEdit"])) {
    if(!$book->Updatebooks($_POST["txtTitle"], $_FILES["txtImg"]["name"], $_FILES["txtUrl"]["name"], $_POST["txtAuthor"], $_POST["txtPublisher"], $_POST["sltDate"], $_POST["sltCate"], $_POST["rdoPublic"], $id)) {
        $error = $book->GetError();
    }else {
        header("location: index.php?module=books&action=cache&toto=edit&id=".$id."&old_cate=".$old_cate."&new_cate=".$book->GetCateid());
        exit();
    }
}

require('view/book/book_edit.php');

?>