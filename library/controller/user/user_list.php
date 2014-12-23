<?php
// Kiểm tra quyền admin
require('lib/check_manager.php');
$CSDL =new Model_User_User;
$data = $CSDL->UserLisr();
require("view/user/user_list.php");
?>