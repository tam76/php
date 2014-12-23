<?php
session_start();
sleep(1);
if (empty($_POST["user"]) || empty($_POST["pass"])) {
    echo 'Miss';
} else {
    $user = $_POST["user"];
    $pass = $_POST["pass"];
    // Kết nối
    require('config.php');
    $CSDL=new Model_User_User;
    if(!$CSDL->CheckLogin($user,$pass)) {
        echo 'Wrong';
    }else {
        $CSDL->CheckLogin($user,$pass);
        echo 'Xin chào ' .$_SESSION[PREFIX."username"]. ' <br />
        <a href="giohang.html" class="button" title="Giỏ hàng">Giỏ hàng</a><br />
            <a href="thanhtoan.html" class="button" title="Thanh Toán">Thanh Toán</a><br />
            <a href="tusach.html" class="button" title="Tủ sách">Tủ sách</a><br />
            <a href="#" class="button" title="logout">Logout</a>';
    }
}

?>