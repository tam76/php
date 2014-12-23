<?php

// Chuẩn bị giao diện
$admin_function = 'User Manager';
$custom_menu = array(
    'index.php?module=user&action=add' => 'Thêm user'
);
require('templates/header_admin.php');
echo '
<table class="list_table">
    <tr class="list_heading">
        <td class="id_col">STT</td>
        <td>Username</td>
        <td>Level</td>
        <td class="action_col">Quản lý</td>
    </tr>';
    // Lấy tất cả user đổ ra trang
    if (!$data) {
        echo '
        <tr class="list_data">
            <td colspan="4" class="aligncenter">Chưa có dữ liệu</td>
        </tr>';
    } else {
        $stt = 0;
        foreach ($data as $item) {
            $stt++;
            echo '
            <tr class="list_data">
                <td class="alignright">' .$stt. '</td>
                <td>' .$item["username"]. '</td>
                <td>';
                if ($item["userid"] == 2) {
                    echo '<img src="templates/images/super_admin.png" width="16px" align="absmiddle" /> <span style="color: red; font-weight: bolder;">Super admin</span>';
                } elseif ($item["level"] == 1) {
                    echo '<b>Admin</b>';
                } elseif ($item["level"] == 2) {
                    echo '<b>Mod</b>';
                } else {
                    echo 'Member';
                }
                echo '</td>
                <td class="aligncenter">
                    <a href="index.php?module=user&action=edit&id=' .$item["userid"]. '"><img src="templates/images/edit.png" /></a>&nbsp;&nbsp;
                    <a href="index.php?module=user&action=del&id=' .$item["userid"]. '" onclick="return xacnhan(\'Bạn có chắc muốn xóa user thứ ' .$stt. '?\');"><img src="templates/images/delete.png" /></a>
                </td>
            </tr>';
        }
    }
    echo '
</table>';
require('templates/footer_admin.php');
?>