<?php
    // Khởi động bộ session
    session_start();
    /*if($_SESSION[PREFIX."level"] == 3){
        session_destroy();
    }*/
    // Chuẩn bị các giá trị
    $loi= array();
    $error = new Model_User_User;
    $admin_function = 'Login';
    
    // Sau khi nhân nút btnLogin
    if (isset($_POST["btnLogin"])) {
        // Kiểm tra dữ liệu đầu vào
        if($error->CheckLogin($_POST["txtUser"],$_POST["txtPass"])) {
            header('location: index.php?module=admin&direction=main');
            exit();
        } else {
            $loi= $error->GetError();
        }
    }
    require('view/login/login.php');
?>