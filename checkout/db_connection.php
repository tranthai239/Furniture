<?php
$servername = "localhost"; // Địa chỉ server
$username = "root"; // Tên người dùng
$password = ""; // Mật khẩu
$dbname = "web"; // Tên cơ sở dữ liệu

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>
