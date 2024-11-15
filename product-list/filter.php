<?php
// Kết nối cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Kiểm tra yêu cầu tìm kiếm
$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
$searchBy = isset($_GET['searchBy']) ? $_GET['searchBy'] : 'NameProduct'; // Tìm kiếm theo tên mặc định

// Truy vấn cơ sở dữ liệu
$sql = "SELECT ProductCode, NameProduct, Price, DiscountPrice, ImagePath, SKU, Quantity FROM `product-info` WHERE $searchBy LIKE ?";
$stmt = $conn->prepare($sql);
$searchWildcard = '%' . $searchTerm . '%';
$stmt->bind_param('s', $searchWildcard);
$stmt->execute();
$result = $stmt->get_result();

$products = [];
while ($row = $result->fetch_assoc()) {
    $products[] = $row;
}

echo json_encode($products);

$stmt->close();
$conn->close();
?>
