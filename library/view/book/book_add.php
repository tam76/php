<?php
// Chuẩn bị giá trị
$admin_function = 'Add Book';
$custom_menu = array(
    'index.php?module=books&action=list' => 'Quản lý sách'
);
$error = array(); // các thông bối lỗi
require('templates/header_admin.php');
echo '
<form action="' .$_SERVER["PHP_SELF"]. '?module=books&action=add" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend>Thông Tin Sách</legend>';
        $book->_CheckError($error);
        echo '
        <span class="form_label">Danh mục:</span>
        <span class="form_item">
            <select name="sltCate">
                <option value="none">Chọn danh mục</option>';
                // Lấy tất cả danh mục đổ vào listbox trên form
                $book->SelectCate($_POST["sltCate"]);
                echo '
            </select>
        </span><br />
        <span class="form_label">Tiêu đề:</span>
        <span class="form_item">
            <input type="text" name="txtTitle" class="textbox"';
            if (isset($_POST["txtTitle"])) {
                echo ' value="' .htmlspecialchars($_POST["txtTitle"]). '"';
            }
            echo ' />
        </span><br />
        <span class="form_label">Tác giả:</span>
        <span class="form_item">
            <input type="text" name="txtAuthor" class="textbox"';
            if (isset($_POST["txtAuthor"])) {
                echo ' value="' .htmlspecialchars($_POST["txtAuthor"]). '"';
            }
            echo ' />
        </span><br />
        <span class="form_label">Nhà xuất bản:</span>
        <span class="form_item">
            <input type="text" name="txtPublisher" class="textbox"';
            if (isset($_POST["txtPublisher"])) {
                echo htmlspecialchars($_POST["txtPublisher"]);
            }
            echo ' />
        </span><br />
        <span class="form_label">Giá sách:</span>
        <span class="form_item">
            <input type="text" name="txtCost" class="textbox"';
            if (isset($_POST["txtCost"])) {
                echo $_POST["txtCost"];
            }
            echo ' />.000 VNĐ
        </span><br />
        <span class="form_label">Năm xuất bản:</span>
        <span class="form_item">
            <select name="sltDate">
                <option value="0">Chọn năm</option>';
                for($i=MIN_BOOK_YEAR;$i<=getdate()['year'];$i++) {
                    echo '<option value="' .$i. '"';
                    if (isset($_POST["sltDate"]) && $_POST["sltDate"] == $i) {
                        echo ' selected="selected"';
                    }
                    echo '>' .$i. '</option>';
                }
                echo '
            </select>
        </span><br />
        <span class="form_label">Hình sách:</span>
        <span class="form_item">
            <input type="file" name="txtImg" class="textbox" />
        </span><br />
        <span class="form_label">Sách:</span>
        <span class="form_item">
            <input type="file" name="txtUrl" class="textbox" />
        </span><br />
        <span class="form_label">Công bố:</span>
        <span class="form_item">
            <input type="radio" name="rdoPublic" value="Y" /> Có 
            <input type="radio" name="rdoPublic" value="N" checked="checked" /> Không
        </span><br />
        <span class="form_label"></span>
        <span class="form_item">
            <input type="submit" name="btnBookAdd" value="Thêm sách" class="button" />
        </span>
        
    </fieldset>
    
</form>';
require('templates/footer_admin.php');

?>