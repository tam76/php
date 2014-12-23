<?php
echo '<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <base href="' .$siteURL. '" />
    <meta name="keywords" content="Thu vien, Sach online, tai lieu online, ebook, do an, sach, tai lieu" />
    <meta name="description" content="Thư viện sách online nơi cung cấp các ebook, sách ,tài liệu chất lượng với các chủ đề phong phú" />
    <link rel="stylesheet" href="templates/css/style1.css" />
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
    <link rel="stylesheet" href="templates/css/jRating.jquery.css" type="text/css" />
    <style type="text/css">
		body {margin:15px;font-family:Arial;font-size:13px}
		a img{border:0}
		.datasSent, .serverResponse{margin-top:20px;width:470px;height:73px;border:1px solid #F0F0F0;background-color:#F8F8F8;padding:10px;float:left;margin-right:10px}
		.datasSent{width:200px;position:fixed;left:680px;top:0}
		.serverResponse{position:fixed;left:680px;top:100px}
		.datasSent p, .serverResponse p {font-style:italic;font-size:12px}
		.exemple{margin-top:15px;}
		.clr{clear:both}
		pre {margin:0;padding:0}
		.notice {background-color:#F4F4F4;color:#666;border:1px solid #CECECE;padding:10px;font-weight:bold;width:600px;font-size:12px;margin-top:10px}
	</style>
    <script type="text/javascript" src="scripts/jquery-1.11.0.min.js"></script>
    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
    <script type="text/javascript" src="scripts/login.js"></script>
	<script type="text/javascript" src="scripts/jRating.jquery.js"></script>
    <script type="text/javascript" src="scripts/tooltip.js"></script>
    <script type="text/javascript" src="scripts/cart.js"></script>
    
    
    <title>Thư viện online</title>
</head>

<body>

    <div id="layout">
        <div id="top">
            Banner
        </div><!-- End Top -->
        <div id="search">
            <form action = "timkiem.html" method = "post">
                <input type="text" name="txtSearch" id="txtSearch" class="textbox" />
                <input type="submit" value = "" name="btnSearch" />
            </form>
        </div><!-- End Search -->
        <div id="topmenu">
            <ul>
                <li><a href="trangchu.html">Trang Chủ</a></li>
                <li><a href="dangky.html">Đăng Ký</a></li>
                <li><a href="#">Danh Mục</a>
                    <ul>';
                    //Kết nối CSDL
                    $CSDL = new NoneUni;
                        
                    // Lấy tất cả các danh mục tin tạo thành các liên kết
                    $sql = 'SELECT * FROM category ORDER BY cate_title ASC';
                    $query = $CSDL->_query($sql);
                    $menu = array();
                    while ($data = $CSDL->_fecth()) {
                        $menu[] = $data;
                    }
                    foreach ($menu as $item) {
                        echo '
                        <li><a href="danh-muc/' .$item["cateid"]. '-' .$CSDL->noneUniAlias($item["cate_title"], true). '.html">' .$item["cate_title"]. '</a></li>';
                    }
                    echo'
                    </ul>
                </li>
                <li><a href="giohang.html">Giỏ hàng</a></li>
                <li><a href="#">Sản Phẩm</a></li>
                <li><a href="#">Liên Hệ</a></li>
            </ul>
        </div>
        <div id="content">
            <div id="left">
                <div id="leftmenu">
                    <h1>
                        Menu Chính
                    </h1>
                    <ul>
                        <li><a href="trangchu.html">Trang Chủ</a></li>
                        <li><a href="dangky.html">Đăng Ký</a></li>
                        <li><a href="#">Danh Mục</a>
                            <ul>';
                            foreach ($menu as $item) {
                                echo '
                                <li><a href="danh-muc/' .$item["cateid"]. '-' .$CSDL->noneUniAlias($item["cate_title"], true). '.html">' .$item["cate_title"]. '</a></li>';
                            }
                            echo '
                            </ul>
                        </li>
                        <li><a href="giohang.html">Giỏ hàng</a></li>
                        <li><a href="#">Sản Phẩm</a></li>
                        <li><a href="#">Liên Hệ</a></li>
                    </ul>
                </div><!-- End leftmenu -->
                <div id="login">
                    <h1>
                        Đăng Nhập
                    </h1>
                    <div class="content">
                        <div id="login_msg">';
                        if (isset($_SESSION[PREFIX."username"])) {
                            echo 'Xin chào ' .$_SESSION[PREFIX."username"]. '<br />
                            <a href="giohang.html" class="button" title="Giỏ hàng">Giỏ hàng</a><br />
                            <a href="thanhtoan.html" class="button" title="Thanh Toán">Thanh Toán</a><br />
                            <a href="tusach.html" class="button" title="Tủ sách">Tủ sách</a><br />
                            <a href="#" class="button" title="logout">Logout</a>';
                        }
                        echo '</div>
                        <form name="fLogin" id="fLogin" action="#" method="post"';
                        if (isset($_SESSION[PREFIX."username"])) {
                            echo ' style="display: none;"';
                        }
                        echo '>
                            Username:<br />
                            <input type="text" name="txtUser" id="txtUser" class="textbox" /><br />
                            Password: <br />
                            <input type="password" name="txtPass" id="txtPass" class="textbox" /><br />
                            <input type="submit" name="btnLogin" id="btnLogin" value="Đăng nhập" />
                        </form>
                    </div>
                </div>
            </div><!-- End Left -->
            <div id="main">';

?>
