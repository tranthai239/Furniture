<?php
// db_connection.php
$servername = "localhost";
$username = "root"; // Thay thế bằng tên người dùng của bạn
$password = ""; // Thay thế bằng mật khẩu của bạn
$dbname = "web"; // Thay thế bằng tên cơ sở dữ liệu của bạn

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>
