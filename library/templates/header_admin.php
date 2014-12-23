<?php


echo '<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="Jackie Do" />
    
    <link rel="stylesheet" href="templates/css/style.css" />
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
    <script type="text/javascript" src="scripts/jquery-1.11.0.min.js"></script>
    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
	<script type="text/javascript">
        function xacnhan(msg) {
            if (window.confirm(msg)) {
                return true;
            }
            return false;
        }
    </script>
	<title>Admin Area</title>
</head>

<body>

    <div id="layout">
        <div id="top">
            Admin Area';
            if (isset($admin_function)) {
                echo ' :: '.$admin_function;
            }
            echo '
        </div>';
        if (isset($_SESSION[PREFIX."username"])) {
            echo '<div id="menu">
            <table width="100%">
                <tr>
                    <td>
                        <a href="index.php?module=admin&direction=main">Mainpage</a>';
                        if (isset($custom_menu) && !empty($custom_menu)) {
                            foreach ($custom_menu as $link => $name) {
                                echo ' | <a href="' .$link. '">' .$name. '</a>';
                            }
                        }
                        echo '
                    </td>
                    <td align="right">
                        Xin chào <a href="index.php?module=user&action=edit&id=' .$_SESSION[PREFIX."userid"]. '">' .$_SESSION[PREFIX."username"]. '</a> | <a href="index.php?module=admin&direction=logout">Logout</a>
                    </td>
                </tr>
            </table></div>';
        }
        echo '
        <div id="main">';

?>