<?php

// Kiểm tra quyền admin
require('lib/check_manager.php');
$cate= new Model_Category_Category;
require('view/cate/cate_list.php');
?>