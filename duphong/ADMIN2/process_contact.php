<?php
include 'db_connection.php'; // Kết nối đến cơ sở dữ liệu

if (isset($_POST['delete'])) {
    // Xóa các dòng được chọn
    if (isset($_POST['contact_ids'])) {
        $idsToDelete = $_POST['contact_ids'];
        $idsToDelete = implode(',', array_map('intval', $idsToDelete)); // Chuyển đổi sang định dạng số nguyên để bảo mật
        $sqlDelete = "DELETE FROM `contact_form` WHERE id IN ($idsToDelete)";
        if ($conn->query($sqlDelete) === TRUE) {
            echo "Dữ liệu đã được xóa thành công.";
        } else {
            echo "Lỗi: " . $conn->error;
        }
    }
}

if (isset($_POST['update'])) {
    // Cập nhật trạng thái của các dòng được chọn
    if (isset($_POST['contact_ids'])) {
        $idsToUpdate = $_POST['contact_ids'];
        $idsToUpdate = implode(',', array_map('intval', $idsToUpdate)); // Chuyển đổi sang định dạng số nguyên để bảo mật
        $sqlUpdate = "UPDATE `contact_form` SET Status = 'Đã xử lý' WHERE id IN ($idsToUpdate)";
        if ($conn->query($sqlUpdate) === TRUE) {
            echo "Trạng thái đã được cập nhật thành công.";
        } else {
            echo "Lỗi: " . $conn->error;
        }
    }
}

// Quay lại trang trước đó hoặc làm điều gì đó khác
header("Location: index.php");
exit();
?>
