<?php

// Khởi động bộ session
session_start();
// Kiểm tra quyền admin
if (!isset($_SESSION[PREFIX."level"]) || $_SESSION[PREFIX."level"] == 3) {
    session_destroy();
    header("location: index.php?module=admin&direction=login");
    exit();
}
?>