<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

if (isset($_POST['ProductCode'])) {
    $productCode = $_POST['ProductCode'];
    // Thêm sản phẩm vào bảng cart
    $sql = "INSERT INTO cart (ProductCode) VALUES ('$productCode')";
    if ($conn->query($sql) === TRUE) {
        echo "Đã thêm sản phẩm vào giỏ hàng";
    } else {
        echo "Lỗi: " . $conn->error;
    }
}

$conn->close();
?>
