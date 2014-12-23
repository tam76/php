<?php
session_start();
$user = new Model_User_User;
if(!isset($_SESSION[PREFIX."username"])) {
    header("content-type: text/html; charset=utf-8");
    echo '
    <script type="text/javascript">
        alert("Bạn vui lòng đăng nhập");
        window.location = "index.php";
    </script>';
}
if(isset($_POST['btnOK'])) {
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
            if(empty($_POST["txtMoney"])){
                $user->SetError('Vui lòng nhập thêm tiền');
            }else {
                if(is_numeric($_POST["txtMoney"]) && $_POST["txtMoney"] < 10) {
                    $_SESSION[PREFIX."property"] = $_SESSION[PREFIX."property"] + $_POST["txtMoney"];
                    $user->CheckOut($_SESSION[PREFIX."property"],$_SESSION[PREFIX."userid"]);
                    header("location: index.php");
                    exit;
                }else {
                    $user->SetError('Vui lòng nhập cho đúng');
                }
            }
        }
    }
}

include("view/account/asset/asset.php");

?>