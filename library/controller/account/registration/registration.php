<?php
session_start();
if(isset($_SESSION[PREFIX."username"])) {
    header("content-type: text/html; charset=utf-8");
    echo '
    <script type="text/javascript">
        alert("Bạn không thể đăng ký");
        window.location = "index.php";
    </script>';
}
$user = new Model_User_User;
if(isset($_POST['btnUserAdd']))
{
	if(empty($_POST['txtCaptcha']))
	{
		$user->SetError('Vui lòng nhập mã xác nhận');
	}
	else
	{
		if($_POST['txtCaptcha'] != $_SESSION['security_code'])
		{
			$user->SetError('Mã xác nhận chưa chính xác');
		}
		else
		{
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
                $regex = "/^\d{2}\/\d{2}\/\d{4}$/";
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
            echo $info;
			if(!$user->AddUser($_POST["txtUser"], $_POST["txtPass"], $_POST["txtRepass"],$info)) {
                $error = $user->getError();
            } else {
                header("location: index.php");
                exit;
            }
		}
	}
}

include("view/account/registration/registration.php");

?>