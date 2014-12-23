<?php

// Kiểm tra quyền admin
require('lib/check_manager.php');
if (!isset($_GET["id"])) {
    header("location: index.php?module=user&action=list");
    exit();
}
$id = $_GET["id"];
// Lấy thông tin của người đang bị sửa để kiểm soát quyền sửa và đổ vào form
$user = new Model_User_User;
$user->_LayTTDT($id);
// Kiểm soát quyền sửa
if(!$user->_getPermission("edit")) {
    header("content-type: text/html; charset=utf-8");
    echo '
    <script type="text/javascript">
        alert("Bạn không được phép sửa user này");
        window.location = "index.php?module=user&action=list";
    </script>';
    exit();
}
/**
 * Có 2 tru72ng hợp không được phép sửa
 * 1. Đăng nhập không phải super mà sửa super
 * 2. Đăng nhập không phải super mà sửa admin mà admin đó không là chính mình 
 **/
// Sau khi nhấn nút btnUserAdd
if (isset($_POST["btnUserEdit"])) {
    if(!empty($_POST['txtName'])) {
        $regex = "/^[\w\s]*$/u";
        if(!preg_match($regex,$_POST['txtName'])) {
            $user->SetError('Họ tên không hợp lệ');
        }else{
            $info['name']=$_POST['txtName'];
        }
    }if(!empty($_POST['sltGT'])) {
        $info['gt']=$_POST['sltGT'];
    }
    if(!empty($_POST['txtNS'])) {
        $regex = "/^[[1|2]{1}\d{1}|30|31]\/[[0]{1}\d{1}|10|11|12]\/\d{4}$/";
        if(!preg_match($regex,$_POST['txtNS'])) {
            $user->SetError('Ngày sinh không hợp lệ');
        }else{
            $info['birthday']=$_POST['txtNS'];
        }
    }
    if(!empty($_POST['txtemail'])) {
        $regex = "/^[a-z][a-z0-9_-]*(\.[a-z0-9_-]+)*@[a-z0-9-]+(\.[a-z]{2,4}){1,2}$/i";
        if(!preg_match($regex,$_POST['txtemail'])) {
            $user->SetError('Email không hợp lệ');
        }else{
            $info['email']=$_POST['txtemail'];
        }
    }
    if(!empty($_POST['txtAddress'])) {
        $regex = "/^[\w\s\/\.]*$/u";
        if(!preg_match($regex,$_POST['txtAddress'])) {
            $user->SetError('Địa chỉ không hợp lệ');
        }else {
            $info['address']=$_POST['txtAddress'];
        }
    }
    if(!empty($_POST['txtNumber'])) {
        $regex = "/^0[\d]{9}$/";
        if(!preg_match($regex,$_POST['txtNumber'])) {
            $user->SetError('Số điện thoại không hợp lệ');
        }else {
            $info['number']=$_POST['txtNumber'];
        }
    }
    if(!empty($_POST['txtPhone'])) {
        $regex = "/^(09|012|016)\d{8}$/";
        if(!preg_match($regex,$_POST['txtPhone'])) {
            $user->SetError('Số di động không hợp lệ');
        }else {
            $info['phone']=$_POST['txtPhone'];
        }
    }
    if(!empty($_POST['txtID'])) {
        $regex = "/^\d{9}$/";
        if(!preg_match($regex,$_POST['txtID'])) {
            $user->SetError('Số chứng minh nhân dân không hợp lệ');
        }else {
            $info['id']=$_POST['txtID'];
        }
    }
    if(empty($info)){
        $info = null;
    }else{
        $info=json_encode($info,JSON_UNESCAPED_UNICODE);
    }
    if($user->UpdateUser($_POST["txtPass"], $_POST["txtRepass"], $_POST["rdoLevel"], $info, $id)) {
        
        header('location: index.php?module=user&action=list');
    }else {
        $error = $user->getError();
    }
}
require('view/user/user_edit.php');
?>