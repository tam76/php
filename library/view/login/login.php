<?php
    // Gọi phần giao diện đầu trang
    require('templates/header_admin.php');
?>
            <form action="index.php?module=admin&direction=login" method="post" style="width: 650px; margin: 30px auto;">
                <?php
                    // Xuất lỗi nếu có
                    $error->_CheckError($loi);
                ?>
                <table>
                    <tr>
                        <td class="login_img">
                        </td>
                        <td>
                            <span class="form_label">Username:</span>
                            <span class="form_item">
                                <input type="text" name="txtUser" class="textbox"
                                <?php
                                    if(isset($_POST["txtUser"])) {
                                        echo ' value = "'.$_POST["txtUser"].'"';
                                    }
                                    
                                ?> />
                            </span><br />
                            <span class="form_label">Password:</span>
                            <span class="form_item">
                                <input type="password" name="txtPass" class="textbox" />
                            </span><br />
                            <span class="form_label"></span>
                            <span class="form_item">
                                <input type="submit" name="btnLogin" value="Đăng nhập" class="button" />
                            </span><br />
                        </td>
                    </tr>
                </table>
            </form>
<?php
    // Gọi phần giao diện cuối trang
    require('templates/footer_admin.php');
?>