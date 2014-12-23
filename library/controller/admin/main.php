<?php
$DB= new Database;

$sql_user='SELECT userid FROM user';
$user_query= $DB->_query($sql_user);
$total_user=$DB->_numrow();

$sql_cate='SELECT cateid FROM category';
$cate_query= $DB->_query($sql_cate);
$total_cate=$DB->_numrow();

$sql_book='SELECT bookid FROM books';
$book_query= $DB->_query($sql_book);
$total_books=$DB->_numrow();
require_once('view/admin/main.php');
?>