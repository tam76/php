<?php

// Chuẩn bị các giá trị
$content = null;
if (isset($_GET["id"])) {
    $id = $_GET["id"];
} else {
    header("location: index.php");
    exit();
}
if(!isset($_GET['page'])) {
    $_GET['page'] = 1;
    $page = 0;
}else {
    $page = $_GET['page']-1;
}

// Tạo một đối tượng phân trang
$paging = new PagingXML();
//$paging = new Paging;
$book = new Model_Books_Books;
$cate_title = $book->titlecate($id);
if(!file_exists('cache/' .$cate_title. '.xml')) {
    $book->SetError('Danh mục hiện đang trống');
}
else {
    $xml = simplexml_load_file('cache/' .$cate_title. '.xml');
}
require("view/category/category.php");

?>