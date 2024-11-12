<?php
// Bắt đầu phiên
session_start(); // Bắt đầu phiên để sử dụng session

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
    // Lấy giá trị từ form
    $LoginName = $_POST['loginName'] ?? ''; // Thay đổi từ 'loginname' thành 'loginName'
    $Password = $_POST['pswd'] ?? '';

    // Kiểm tra nếu LoginName trống
    if (empty($LoginName)) {
        echo "<script>alert('Không nhận được giá trị LoginName! Vui lòng kiểm tra lại.'); window.history.back();</script>";
    } else {
        // Truy vấn bảng account
        $stmt_account = $conn->prepare("SELECT * FROM account WHERE LoginName = ? AND Password = ?");
        $stmt_account->bind_param("ss", $LoginName, $Password);
        $stmt_account->execute();
        $result_account = $stmt_account->get_result();

        // Truy vấn bảng admin để kiểm tra quyền admin
        $stmt_admin = $conn->prepare("SELECT * FROM admin WHERE LoginName = ? AND Password = ?");
        $stmt_admin->bind_param("ss", $LoginName, $Password);
        $stmt_admin->execute();
        $result_admin = $stmt_admin->get_result();

        // Kiểm tra kết quả truy vấn
        if ($result_admin->num_rows > 0) {
            // Nếu tài khoản là admin, thiết lập session và chuyển hướng đến ADMIN/index.php
            $_SESSION['loggedin'] = true; // Đánh dấu người dùng đã đăng nhập
            $_SESSION['username'] = $LoginName; // Lưu tên người dùng
            echo "<script>window.location.href='../ADMIN/index.php';</script>";
        } elseif ($result_account->num_rows > 0) {
            // Nếu tài khoản là người dùng bình thường, thiết lập session và chuyển hướng đến main-product/index.php
            $_SESSION['loggedin'] = true; // Đánh dấu người dùng đã đăng nhập
            $_SESSION['username'] = $LoginName; // Lưu tên người dùng
            echo "<script>alert('Đăng nhập thành công!'); window.location.href='../main-product/index.php';</script>";
        } else {
            echo "<script>alert('LoginName hoặc mật khẩu không đúng!'); window.history.back();</script>";
        }

        // Đóng các câu truy vấn
        $stmt_account->close();
        $stmt_admin->close();
    }
}

$conn->close();
?>
