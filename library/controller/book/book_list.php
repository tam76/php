<?php

$book = new Model_Books_Books;
// Kiểm tra quyền admin
require('lib/check_manager.php');

require('view/book/book_list.php');
?>