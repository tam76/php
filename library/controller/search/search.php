<?php
session_start();
$book = new Model_Books_Books;
if(isset($_POST['txtSearch']) && isset($_POST['btnSearch']) && !empty($_POST['txtSearch'])) {
    $search =addslashes($_POST['txtSearch']);
    if(!$book->SearchBook($search) || empty($search)) {
        $book->SetError('Không có kết quả trả về');
    }
}else {
    $book->SetError('Không có kết quả trả về');
}
include("view/search/search.php")
?>