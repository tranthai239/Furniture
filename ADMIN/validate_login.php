<?php
session_start();
include('db_connection.php'); // Kết nối cơ sở dữ liệu

// Kiểm tra nếu người dùng đã đăng nhập rồi thì chuyển hướng đến trang ADMIN
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header("Location: index.php");
    exit();
}

// Kiểm tra nếu có dữ liệu gửi từ form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $loginName = $_POST['loginName'];  // Lấy tên đăng nhập từ form
    $password = $_POST['password'];    // Lấy mật khẩu từ form

    // Truy vấn kiểm tra tài khoản và mật khẩu
    $stmt = $conn->prepare("SELECT * FROM admin WHERE LoginName = ? AND password = ?");
    
    if ($stmt === false) {
        die('Lỗi câu lệnh SQL: ' . $conn->error); // In ra lỗi nếu câu lệnh chuẩn không được chuẩn bị
    }
    
    $stmt->bind_param("ss", $loginName, $password);  // Liên kết tham số với tên đăng nhập và mật khẩu
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Tài khoản và mật khẩu đúng
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_loginName'] = $loginName;

        // Chuyển hướng đến trang ADMIN
        header("Location: index.php");
        exit();
    } else {
        // Mật khẩu hoặc tài khoản không chính xác
        echo "Tài khoản hoặc mật khẩu không chính xác!";
    }
}
?>
