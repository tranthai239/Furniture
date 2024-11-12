<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productCode = $_POST['ProductCode'];

    $sql = "DELETE FROM cart WHERE SKU = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $productCode);

    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error: ' . $conn->error;
    }
    $stmt->close();
}
$conn->close();
?>
