<?php

// Chuẩn bị giá trị
$admin_function = 'Edit User';
$custom_menu = array(
    'index.php?module=user&action=list' => 'Quản lý user'
);

$error = array(); // các thông bối lỗi
require('templates/header_admin.php');
$toto = json_decode($user->GetInfo());
$user->_CheckError($error);
echo '
<form action="' .$_SERVER["PHP_SELF"]. '?module=user&action=edit&id=' .$id. '" method="post" style="width: 650px;">
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
        <legend>Thông Tin User</legend>
        <span class="form_label">Username:</span>
        <span class="form_item">
            <b>' .$user->GetUser(). '</b>
        </span><br />
        <span class="form_label">Password:</span>
        <span class="form_item">
            <input type="password" name="txtPass" class="textbox" />
        </span><br />
        <span class="form_label">Confirm password:</span>
        <span class="form_item">
            <input type="password" name="txtRepass" class="textbox" />
        </span><br />';
        if (!$user->_EditMySeft() && $user->GetLevel() != 3) {
            echo '
            <span class="form_label">Level:</span>
            <span class="form_item">
                <input type="radio" name="rdoLevel" value="1"';
                if ($user->GetLevel() == 1) {
                    echo ' checked="checked"';
                }
                echo ' /> Admin 
                <input type="radio" name="rdoLevel" value="2"';
                if ($user->GetLevel() == 2) {
                    echo ' checked="checked"';
                }
                echo ' /> Mod
            </span><br />';
        }
        echo '
    </fieldset>
    <fieldset>
        <legend>Thông Tin Cá Nhân</legend>
        <span class="form_label">Họ và tên:</span>
        <span class="form_item">
            <input type="text" name="txtName" class="textbox"';
            if (isset($_POST["txtName"])) {
                echo ' value="' .htmlspecialchars($_POST["txtName"]). '"';
            }elseif (isset($toto->name)) {
                echo ' value="' .htmlspecialchars($toto->name). '"';
            }
            echo ' />
        </span><br />
        <span class="form_label">Giới tính:</span>
        <span class="form_item">
            <select name="sltGT">
                <option value="0">Chọn giới tính</option>
                <option value="1" ';
                if (isset($_POST["sltGT"]) && $_POST["sltGT"] == 1) {
                    echo ' selected = selected';
                }elseif (isset($toto->gt) && $toto->gt == 1) {
                    echo '  selected = selected ';
                }
                echo '>Nam</option>
                <option value="2" ';
                if (isset($_POST["sltGT"]) && $_POST["sltGT"] == 2) {
                    echo ' selected = selected';
                }elseif (isset($toto->gt) && $toto->gt == 2) {
                    echo '  selected = selected ';
                }
                echo '>Nữ</option>
            </select>
        </span><br />
        <span class="form_label">Ngày sinh:</span>
        <span class="form_item">
            <input type="text" name="txtNS"  id="txt" class="datepicker"';
            if (isset($_POST["txtNS"])) {
                echo ' value="' .$_POST["txtNS"]. '"';
            }elseif (isset($toto->birthday)) {
                echo ' value="' .htmlspecialchars($toto->birthday). '"';
            }
            echo ' />
        </span><br />
        <span class="form_label">Email:</span>
        <span class="form_item">
            <input type="text" name="txtemail" class="textbox"';
            if (isset($_POST["txtemail"])) {
                echo ' value="' .$_POST["txtemail"]. '"';
            }elseif (isset($toto->email)) {
                echo ' value="' .htmlspecialchars($toto->email). '"';
            }
            echo ' />
        </span><br />
        <span class="form_label">Địa chỉ:</span>
        <span class="form_item">
            <input type="text" name="txtAddress" class="textbox"';
            if (isset($_POST["txtAddress"])) {
                echo ' value="' .$_POST["txtAddress"]. '"';
            }elseif (isset($toto->address)) {
                echo ' value="' .htmlspecialchars($toto->address). '"';
            }
            echo ' />
        </span><br />
        <span class="form_label">Điện thoại:</span>
        <span class="form_item">
            <input type="text" name="txtNumber" class="textbox"';
            if (isset($_POST["txtNumber"])) {
                echo ' value="' .$_POST["txtNumber"]. '"';
            }elseif (isset($toto->number)) {
                echo ' value="' .htmlspecialchars($toto->number). '"';
            }
            echo ' />
        </span><br />
        <span class="form_label">Di động:</span>
        <span class="form_item">
            <input type="text" name="txtPhone" class="textbox"';
            if (isset($_POST["txtPhone"])) {
                echo ' value="' .$_POST["txtPhone"]. '"';
            }elseif (isset($toto->phone)) {
                echo ' value="' .htmlspecialchars($toto->phone). '"';
            }
            echo ' />
        </span><br />
        <span class="form_label">Số cmnd:</span>
        <span class="form_item">
            <input type="text" name="txtID" class="textbox"';
            if (isset($_POST["txtID"])) {
                echo ' value="' .$_POST["txtID"]. '"';
            }elseif (isset($toto->id)) {
                echo ' value="' .htmlspecialchars($toto->id). '"';
            }
            echo ' />
        </span>
    </fieldset>
    <span class="form_item">
        <input type="submit" name="btnUserEdit" value="Sửa user" class="button" />
    </span>
</form>';
require('templates/footer_admin.php');

?>