<?php

// Chuẩn bị giá trị
$admin_function = 'Category Editor';
$custom_menu = array(
    'index.php?module=cate&action=list' => 'Quản lý danh mục'
);
$error = null; // các thông bối lỗi
require('templates/header_admin.php');
echo '
<form action="' .$_SERVER["PHP_SELF"]. '?module=cate&action=add" method="post" style="width: 650px;">
    <fieldset>
        <legend>Thông Tin Danh Mục</legend>';
        $cate->_CheckError($cate->GetError());
        echo '
        <span class="form_label">Tên danh mục:</span>
        <span class="form_item">
            <input type="text" name="txtCate" class="textbox"';
            if (isset($_POST["txtCate"])) {
                echo ' value="' .htmlspecialchars($_POST["txtCate"]). '"';
            }
            echo ' />
        </span><br />
        <span class="form_label"></span>
        <span class="form_item">
            <input type="submit" name="btnCateAdd" value="Thêm danh mục" class="button" />
        </span>
    </fieldset>
</form>';
require('templates/footer_admin.php');


?>