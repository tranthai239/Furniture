<?php
// Kết nối với cơ sở dữ liệu MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Kiểm tra dữ liệu POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Hiển thị toàn bộ dữ liệu POST để kiểm tra
    var_dump($_POST);

    // Lấy giá trị từ form
    $UserName = $_POST['username'] ?? '';
    $LoginName = $_POST['loginname'] ?? '';
    $Email = $_POST['email'] ?? '';
    $PhoneNumber = $_POST['phonenumber'] ?? '';
    $Address = $_POST['address'] ?? '';
    $Password = $_POST['pswd'] ?? '';
    $confirm_password = $_POST['confirm-password'] ?? '';

    // Kiểm tra nếu Email trống sau khi lấy giá trị
    if (empty($Email)) {
        echo "<script>alert('Không nhận được giá trị email! Vui lòng kiểm tra lại.'); window.history.back();</script>";
    } 
    else {
        // Kiểm tra tính hợp lệ của email và mật khẩu
        if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Email không hợp lệ!'); window.history.back();</script>";
        } elseif ($Password !== $confirm_password) {
            echo "<script>alert('Mật khẩu và xác nhận mật khẩu không trùng khớp!'); window.history.back();</script>";
        } elseif (stripos($UserName, 'admin') !== false || stripos($LoginName, 'admin') !== false || stripos($Email, 'admin') !== false) {
            echo "<script>alert('Tên đăng nhập, email và tên người dùng không được chứa chuỗi \"admin\"!'); window.history.back();</script>";
        } else {
            // Kiểm tra email và loginname đã tồn tại
            $stmt = $conn->prepare("SELECT * FROM account WHERE Email = ? OR LoginName = ?");
            $stmt->bind_param("ss", $Email, $LoginName);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo "<script>alert('Email hoặc tên đăng nhập đã tồn tại!'); window.history.back();</script>";
            } else {
                // Chèn dữ liệu vào bảng account mà không mã hóa mật khẩu
                $stmt = $conn->prepare("INSERT INTO account (UserName, LoginName, Email, PhoneNumber, Address, Password) 
                        VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("ssssss", $UserName, $LoginName, $Email, $PhoneNumber, $Address, $Password);

                if ($stmt->execute() === TRUE) {
                    echo "<script>alert('Đăng ký thành công!'); window.location.href='signin-signup.html';</script>";
                } else {
                    echo "Lỗi: " . $stmt->error;
                }
            }
            $stmt->close();
        }
    }
}
$conn->close();
?>
