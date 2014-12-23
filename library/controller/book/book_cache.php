<?php
$book = new Model_Books_Books;
// Kiểm tra quyền admin
require('lib/check_manager.php');;
if(isset($_GET['toto'])) {
    if($_GET['toto'] == 'add' && isset($_GET['new_cate'])) {
        $book->HomeXML();
        $book->CateXML($_GET['new_cate']);
        
    }elseif ($_GET['toto'] == 'edit' && isset($_GET['id']) && isset($_GET['old_cate'])&& isset($_GET['new_cate'])) {
        $book->Checkid($_GET['id']);
        if($_GET['old_cate'] == $_GET['new_cate']) {
            $book->CateXML($_GET['new_cate']);
        }else {
            $book->CateXML($_GET['new_cate']);
            $book->CateXML($_GET['old_cate']);
        }
    } elseif ($_GET['toto'] == 'del'&& isset($_GET['id']) && isset($_GET['old_cate'])) {
        $book->Checkid($_GET['id']);
        $book->CateXML($_GET['old_cate']);
    } else {
        header("content-type: text/html; charset=utf-8");
        echo '
        <script type="text/javascript">
            alert("Tạo cache không hợp lệ");
            window.location = "index.php?module=books&action=list";
        </script>';
    }
    header("location: index.php?module=books&action=list");
} else {
    header("content-type: text/html; charset=utf-8");
    echo '
    <script type="text/javascript">
        alert("Tạo cache không hợp lệ");
        window.location = "index.php?module=books&action=list";
    </script>';
}
?>