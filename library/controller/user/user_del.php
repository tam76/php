<?php
// Kiểm tra quyền admin
require('lib/check_admin.php');
// Chuẩn bị giá trị
header("content-type: text/html; charset=utf-8");
if (!isset($_GET["id"])) {
    header("location: index.php?module=user&action=list");
    exit();
}
$id = $_GET["id"];
$user= new Model_User_User;

if ($user->delUser($id)) {
    header("location: index.php?module=user&action=list");
} else {
    header("content-type: text/html; charset=utf-8");
    echo '
    <script type="text/javascript">
        alert("Bạn không được phép xóa user này");
        window.location = "index.php?module=user&action=list";
    </script>';
}


?>