<?php

// Chuẩn bị giao diện
$admin_function = 'Category Manager';
$custom_menu = array(
    'index.php?module=cate&action=add' => 'Thêm danh mục'
);
require('templates/header_admin.php');
echo '
<table class="list_table">
    <tr class="list_heading">
        <td class="id_col">STT</td>
        <td>Tên danh mục</td>
        <td class="action_col">Quản lý</td>
    </tr>';
    if (!$cate->CateList()) {
        echo '
        <tr class="list_data">
            <td colspan="3" class="aligncenter">Chưa có danh mục</td>
        </tr>';
    } else {
        $stt = 0;
        foreach($cate->CateList() as $item) {
            $stt++;
            echo '
            <tr class="list_data">
                <td class="alignright">' .$stt. '</td>
                <td>' .$item["cate_title"];
                $cate->CountNews($item["cateid"]);
                echo '</td>
                <td class="aligncenter">
                    <a href="index.php?module=cate&action=edit&id=' .$item["cateid"]. '"><img src="templates/images/edit.png" /></a>
                    <a href="index.php?module=cate&action=del&id=' .$item["cateid"]. '" onclick="return xacnhan(\'Bạn có chắc muốn xóa danh mục có STT là ' .$stt. ' \');"><img src="templates/images/delete.png" /></a>
                </td>
            </tr>';
        }
    }
    echo '
</table>';
require('templates/footer_admin.php');
?>