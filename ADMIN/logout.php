<?php
session_start();
session_unset();  // Xóa tất cả session
session_destroy();  // Hủy session

// Chuyển hướng về trang login
header("Location: login.php");
exit();
?>
