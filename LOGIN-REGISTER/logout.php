<?php
session_start(); // Bắt đầu phiên

// Hủy tất cả các biến trong phiên
$_SESSION = [];

// Hủy phiên
session_destroy();

// Chuyển hướng về trang đăng nhập
header("location: ../LOGIN-REGISTER/index.html");
exit;
?>
