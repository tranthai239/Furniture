<?php
include('db_connection.php');  // Kết nối với cơ sở dữ liệu

// Xử lý nút Xóa khi có form được submit
if (isset($_POST['delete'])) {
    if (!empty($_POST['contact_ids'])) {
        $ids = implode(",", $_POST['contact_ids']);
        $delete_sql = "DELETE FROM `contact_form` WHERE id IN ($ids)";
        if ($conn->query($delete_sql) === TRUE) {
            echo "Xóa thành công!";
        } else {
            echo "Lỗi khi xóa: " . $conn->error;
        }
    }
}

// Xử lý nút Cập Nhật khi có form được submit
if (isset($_POST['update'])) {
    if (!empty($_POST['contact_ids'])) {
        $ids = implode(",", $_POST['contact_ids']);
        $update_sql = "UPDATE `contact_form` SET Status = 'Đã xử lý' WHERE id IN ($ids)";
        if ($conn->query($update_sql) === TRUE) {
            echo "  Cập nhật thành công!";
        } else {
            echo "Lỗi khi cập nhật: " . $conn->error;
        }
    }
}

// Truy vấn và hiển thị dữ liệu
$sql = "SELECT * FROM `contact_form`";
$result = $conn->query($sql);

// Kiểm tra có dữ liệu không
if ($result === false) {
    echo "Lỗi SQL: " . $conn->error;
} else {
    if ($result->num_rows > 0) {
        echo '<form method="POST" action="">';  // Form để gửi dữ liệu cho các nút
        echo '<table border="1">';
        echo '<thead>
                <tr>
                    <th>Chọn</th>
                    <th>ID</th>
                    <th>Tên người dùng</th>
                    <th>Email</th>
                    <th>Thông điệp</th>
                    <th>Thời gian gửi</th>
                    <th>Trạng thái</th>
                </tr>
              </thead>';
        echo '<tbody>';
        // Duyệt qua từng dòng kết quả và hiển thị
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td><input type="checkbox" name="contact_ids[]" value="' . $row['id'] . '"></td>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['username'] . '</td>';
            echo '<td>' . $row['email'] . '</td>';
            echo '<td>' . $row['message'] . '</td>';
            echo '<td>' . $row['submitted_at'] . '</td>';
            echo '<td>' . $row['Status'] . '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';

        // Các nút hành động
        echo '<button type="submit" name="delete">Xóa</button>';
        echo '<button type="submit" name="update">Cập nhật trạng thái</button>';
        echo '</form>';
    } else {
        echo "Không có dữ liệu trong bảng contact_form.";
    }
}

$conn->close();
?>
