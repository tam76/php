<?php
include("templates/header.php");
echo '<form action="'.$_SERVER["REQUEST_URI"].'" method=post>
    <script type="text/javascript">
    $(function() {
    $.datepicker.regional["vi"] = {
    closeText: "Đóng",
    prevText: "&#x3c;Trước",
    nextText: "Tiếp&#x3e;",
    currentText: "Hôm nay",
    monthNames: [" Tháng Một", "Tháng Hai", "Tháng Ba", "Tháng Tư", "Tháng Năm", "Tháng Sáu",
    "Tháng Bảy", "Tháng Tám", "Tháng Chín", "Tháng Mười", "Tháng Mười Một", "Tháng Mười Hai"],
    monthNamesShort: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6",
    "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"],
    dayNames: ["Chủ Nhật", "Thứ Hai", "Thứ Ba", "Thứ Tư", "Thứ Năm", "Thứ Sáu", "Thứ Bảy"],
    dayNamesShort: ["CN", "T2", "T3", "T4", "T5", "T6", "T7"],
    dayNamesMin: ["CN", "T2", "T3", "T4", "T5", "T6", "T7"],
    weekHeader: "Tu",
    dateFormat: "dd/mm/yy",
    firstDay: 0,
    isRTL: false,
    showMonthAfterYear: false,
    yearSuffix: ""};
    $.datepicker.setDefaults($.datepicker.regional["vi"]);
    $(".datepicker").datepicker();
    }); 
    
    </script>
    <fieldset>
        <legend>Thông Tin Đăng Ký</legend>';
        $error = array(); 
        $user->_CheckError($error);
        echo '
        <span class="form_label">Username:</span>
        <span class="form_item">
            <input type="text" name="txtUser" class="textbox"';
            if (isset($_POST["txtUser"])) {
                echo ' value="' .htmlspecialchars($_POST["txtUser"]). '"';
            }
            echo ' />
        </span><br />
        <span class="form_label">Password:</span>
        <span class="form_item">
            <input type="password" name="txtPass" class="textbox" />
        </span><br />
        <span class="form_label">Confirm password:</span>
        <span class="form_item">
            <input type="password" name="txtRepass" class="textbox" />
        </span><br />
        <span class="form_label">Mã xác nhận:</span>
        <span class="form_item">
            <input type="text" name="txtCaptcha" maxlength="10" class="textbox" /><img src="lib/random_image.php" />
        </span><br />
    </fieldset>
    <fieldset>
        <legend>Thông Tin Cá Nhân</legend>
        <span class="form_label">Họ và tên:</span>
        <span class="form_item">
            <input type="text" name="txtName" class="textbox"';
            if (isset($_POST["txtName"])) {
                echo ' value="' .htmlspecialchars($_POST["txtName"]). '"';
            }
            echo ' />
        </span><br />
        <span class="form_label">Giới tính:</span>
        <span class="form_item">
            <select name="sltGT">
                <option value="0">Chọn giới tính</option>
                <option value="1">Nam</option>
                <option value="2">Nữ</option>
            </select>
        </span><br />
        <span class="form_label">Ngày sinh:</span>
        <span class="form_item">
            <input type="text" name="txtNS"  id="txt" class="datepicker"';
            if (isset($_POST["txtNS"])) {
                echo ' value="' .$_POST["txtNS"]. '"';
            }
            echo ' />
        </span><br />
        <span class="form_label">Email:</span>
        <span class="form_item">
            <input type="text" name="txtemail" class="textbox"';
            if (isset($_POST["txtemail"])) {
                echo ' value="' .$_POST["txtemail"]. '"';
            }
            echo ' />
        </span><br />
        <span class="form_label">Địa chỉ:</span>
        <span class="form_item">
            <input type="text" name="txtAddress" class="textbox"';
            if (isset($_POST["txtAddress"])) {
                echo ' value="' .$_POST["txtAddress"]. '"';
            }
            echo ' />
        </span><br />
        <span class="form_label">Điện thoại:</span>
        <span class="form_item">
            <input type="text" name="txtNumber" class="textbox"';
            if (isset($_POST["txtNumber"])) {
                echo ' value="' .$_POST["txtNumber"]. '"';
            }
            echo ' />
        </span><br />
        <span class="form_label">Di động:</span>
        <span class="form_item">
            <input type="text" name="txtPhone" class="textbox"';
            if (isset($_POST["txtPhone"])) {
                echo ' value="' .$_POST["txtPhone"]. '"';
            }
            echo ' />
        </span><br />
        <span class="form_label">Số cmnd:</span>
        <span class="form_item">
            <input type="text" name="txtID" class="textbox"';
            if (isset($_POST["txtID"])) {
                echo ' value="' .$_POST["txtID"]. '"';
            }
            echo ' />
        </span>
    </fieldset>
    <span class="form_item">
        <input type="submit" name="btnUserAdd" value="Đồng ý" class="button" />
    </span>
</form>';
include("templates/footer.php");

?>