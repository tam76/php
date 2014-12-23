<?php
session_start();
$xml = simplexml_load_file('cache/home.xml');

// Gọi phần footer của giao diện
require("view/main/main.php");

?>