<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);

    // Kiểm tra không để trống
    if (empty($username) || empty($email) || empty($message)) {
        echo "Vui lòng điền đầy đủ thông tin!";
        exit;
    }

    // Kiểm tra định dạng email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Email không đúng định dạng!";
        exit;
    }

    // Kết nối cơ sở dữ liệu
    $conn = new mysqli("localhost", "root", "", "web");

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    // Lưu thông tin vào cơ sở dữ liệu
    $stmt = $conn->prepare("INSERT INTO contact_form (username, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $message);

    if ($stmt->execute()) {
        echo "Cảm ơn bạn đã liên hệ! Chúng tôi sẽ phản hồi sớm nhất có thể.";
    } else {
        echo "Có lỗi xảy ra, vui lòng thử lại sau.";
    }

    // Đóng kết nối
    $stmt->close();
    $conn->close();
}
?>
