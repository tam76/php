<?php
$book = new Model_Books_Books;
// Kiểm tra quyền admin
require('lib/check_manager.php');
// Sau khi nhấn nút btnNewsAdd
if (isset($_POST["btnBookAdd"])) {
    if(!$book->Addbook($_POST["txtTitle"], $_FILES["txtImg"]["name"], $_FILES["txtUrl"]["name"], $_POST["txtAuthor"], $_POST["txtPublisher"], $_POST["sltDate"], $_POST["rdoPublic"], $_POST["sltCate"], $_SESSION[PREFIX."userid"],$_POST["txtCost"]) ) {
        $error = $book->GetError();
    }elseif(empty($_FILES["txtImg"]["name"])) {
        move_uploaded_file($_FILES["txtUrl"]["tmp_name"], 'file/'.$book->GetUrl());
        header("location: index.php?module=books&action=cache&toto=add&new_cate=".$book->GetCateid());
        exit();
    }else {
        move_uploaded_file($_FILES["txtImg"]["tmp_name"], 'images/'.$book->GetImg());
        move_uploaded_file($_FILES["txtUrl"]["tmp_name"], 'file/'.$book->GetUrl());
        header("location: index.php?module=books&action=cache&toto=add&new_cate=".$book->GetCateid());
        exit();
    }
}

require('view/book/book_add.php');

?>