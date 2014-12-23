<?php
session_start();
function CheckBook() {
    $bookcase = json_decode($_SESSION[PREFIX."bookcase"]);
    foreach($bookcase as $data) {
        $ids[] = $data->id;
    }
    if(!in_array($_GET['id'],$ids)) {
        return false;
    }
    return true;
}
if(!isset($_SESSION[PREFIX."bookcase"]) || !isset($_GET['id']) || !CheckBook()){
    header("content-type: text/html; charset=utf-8");
    echo '
    <script type="text/javascript">
        alert("Bạn đã truy cập trái phép vào cuốn sách");
        window.location = "index.php";
    </script>';
    exit;
}
$book = new Model_Books_Books;
$book->Infobook($_GET['id']);
require 'view/account/book/book.php'
?>