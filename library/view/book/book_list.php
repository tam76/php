<?php
// Chuẩn bị giao diện
$admin_function = 'Book Manager';
$custom_menu = array(
    'index.php?module=books&action=add' => 'Thêm sách'
);
require('templates/header_admin.php');
echo '
<table class="list_table">
    <tr class="list_heading">
        <td class="id_col">STT</td>
        <td>Tiêu đề</td>
        <td>Tác giả</td>
        <td>Nhà xuất bản</td>
        <td>Năm xuất bản</td>
        <td>Danh mục</td>
        <td>User đăng</td>
        <td>Công bố</td>
        <td class="action_col">Quản lý</td>
    </tr>';
    // Lấy tất cả danh mục đổ ra trang
    if (!$book->BookList()) {
        echo '
        <tr class="list_data">
            <td colspan="8" class="aligncenter">Chưa có sách</td>
        </tr>';
    } else {
        $stt = 0;
        $data = array();
        foreach($book->BookList() as $data) {
            $stt++;
            echo '
            <tr class="list_data">
                <td class="alignright">' .$stt. '</td>
                <td>' .htmlspecialchars($data["book_title"]). '</td>
                <td>';
                if (empty($data["author"])) {
                    echo 'Chưa xác định';
                } else {
                    echo htmlspecialchars($data["author"]);
                }
                echo  '</td>
                <td>';
                if (empty($data["publisher"])) {
                    echo 'Chưa xác định';
                } else {
                    echo htmlspecialchars($data["publisher"]);
                }
                echo  '</td>
                <td>';
                if (empty($data["book_date"])) {
                    echo 'Chưa xác định';
                } else {
                    echo $data["book_date"];
                }
                echo  '</td>
                <td>' .$data["cate_title"]. '</td>
                <td>' .$data["username"]. '</td>
                <td>';
                if ($data["book_public"] == 'Y') {
                    echo 'Có';
                } else {
                    echo 'Không';
                }
                echo '</td>
                <td class="aligncenter">
                    <a href="index.php?module=books&action=edit&id=' .$data["bookid"]. '"><img src="templates/images/edit.png" /></a>
                    <a href="index.php?module=books&action=del&id=' .$data["bookid"]. '" onclick="return xacnhan(\'Bạn có chắc muốn xóa cuốn sách có STT là ' .$stt. ' \');"><img src="templates/images/delete.png" /></a>
                </td>
            </tr>';
        }
    }
    echo '
</table>';
require('templates/footer_admin.php');
?>