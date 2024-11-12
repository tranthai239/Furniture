<?php
session_start();
include('db_connection.php'); // Kết nối cơ sở dữ liệu

// Kiểm tra nếu người dùng đã đăng nhập rồi thì chuyển hướng đến trang ADMIN
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header("Location: admin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập Admin</title>
    <style type="text/css">
        /* Tổng thể body và bố cục */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

/* Định dạng cho container form */
form {
    background-color: white;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 300px;
    text-align: center;
}

/* Tiêu đề form */
h2 {
    color: #333;
    margin-bottom: 20px;
}

/* Định dạng cho nhãn (label) */
label {
    font-size: 14px;
    color: #555;
    text-align: left;
    display: block;
    margin-bottom: 8px;
}

/* Định dạng cho input */
input[type="text"], input[type="password"] {
    width: 100%;
    padding: 10px;
    margin: 10px 0 20px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 14px;
    box-sizing: border-box;
}

/* Định dạng khi input được focus */
input[type="text"]:focus, input[type="password"]:focus {
    border-color: #5c9ded;
    outline: none;
}

/* Định dạng cho nút submit */
button {
    width: 100%;
    padding: 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

/* Chuyển màu khi hover lên nút */
button:hover {
    background-color: #45a049;
}

/* Định dạng cho phần thông báo lỗi (nếu có) */
.error-message {
    color: red;
    font-size: 14px;
    margin-top: 10px;
}

    </style>
</head>
<body>
 
    <form action="validate_login.php" method="POST">
        <label><h2>Đăng nhập Admin</h2></label>
        <label for="loginName">Tên đăng nhập:</label>
        <input type="text" name="loginName" id="loginName" required>
        <br>
        <label for="password">Mật khẩu:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <button type="submit">Đăng nhập</button>
    </form>
</body>
</html>
