<?php


 // Kiểm tra quyền admin
    require('lib/check_manager.php');
    // Chuẩn bị giá trị
    $admin_function = 'Admin Mainpage';
    $custom_menu = array(
        'index.php?module=user&action=list' => 'Quản lý user',
        'index.php?module=cate&action=list' => 'Quản lý danh mục',
        'index.php?module=books&action=list' => 'Quản lý sách'
    );
    require('templates/header_admin.php');
    // Biểu tượng cho các chức năng trên trang
    echo '
    <table class="function_table" style="margin: 0 auto;">
        <tr>
            <td class="function_item user_list">
                <a href="index.php?module=user&action=list">Quản lý user</a>
            </td>
            <td class="function_item user_add">
                <a href="index.php?module=user&action=add">Thêm user</a>
            </td>
            <td rowspan="3" class="statistics_panel">
                <h3>Thống kê</h3>
                <ul>
                    <li>Tổng số user: ' .$total_user. '</li>
                    <li>Tổng số danh mục: ' .$total_cate. '</li>
                    <li>Tổng số sách: ' .$total_books. '</li>
                </ul>
            </td>
        </tr>
        <tr>
            <td class="function_item cate_list">
                <a href="index.php?module=cate&action=list">Quản lý danh mục</a>
            </td>
            <td class="function_item cate_add">
                <a href="index.php?module=cate&action=add">Thêm danh mục</a>
            </td>
        </tr>
        <tr>
            <td  class="function_item book_list">
                <a href="index.php?module=books&action=list">Quản lý sách</a>
            </td>
            <td class="function_item book_add">
                <a href="index.php?module=books&action=add">Thêm sách</a>
            </td>
        </tr>
    </table>';
    require('templates/footer_admin.php');

?>