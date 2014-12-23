<?php

include("templates/header.php");
$error = array(); 
$user->_CheckError($error);
echo '<form action="'.$_SERVER["REQUEST_URI"].'" method=post>
    <span >Hiện tại bạn đang có ';
    echo $_SESSION[PREFIX."property"].'.000 VNĐ:</span><br />
    <span class="form_label">Nạp tiền:</span>
    <span class="form_item">
        <input type="text" name="txtMoney" maxlength="1" class = "soluong"';
        if (isset($_POST["txtMoney"])) {
            echo ' value="' .htmlspecialchars($_POST["txtMoney"]). '"';
        }
        echo ' />.000NNĐ
    </span><br />
    <span class="form_label">Mã xác nhận:</span>
    <span class="form_item">
        <input type="text" name="txtCaptcha" maxlength="10" class="textbox" /><img src="lib/random_image.php" />
    </span><br />
    <span class="form_item">
        <input type="submit" name="btnOK" value="Đồng ý" class="button" />
    </span>
</form>';
include("templates/footer.php");

?>