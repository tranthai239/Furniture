<?php
$target_dir = "uploads/"; // Thư mục lưu trữ tệp đã upload
$uploadOk = 1;
$imagePaths = [];

// Hàm để xử lý upload từng tệp
function handleUpload($fileField) {
    global $target_dir, $uploadOk, $imagePaths;

    $target_file = $target_dir . basename($_FILES[$fileField]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Kiểm tra nếu tệp đã tồn tại
    if (file_exists($target_file)) {
        echo "Xin lỗi, tệp " . basename($_FILES[$fileField]["name"]) . " đã tồn tại.<br>";
        $uploadOk = 0;
    }

    // Kiểm tra kích thước tệp
    if ($_FILES[$fileField]["size"] > 500000) { // Giới hạn kích thước tệp là 500KB
        echo "Xin lỗi, kích thước tệp " . basename($_FILES[$fileField]["name"]) . " quá lớn.<br>";
        $uploadOk = 0;
    }

    // Cho phép một số định dạng tệp nhất định
    if (!in_array($imageFileType, ["jpg", "png", "jpeg", "gif"])) {
        echo "Xin lỗi, chỉ cho phép các định dạng JPG, JPEG, PNG & GIF cho tệp " . basename($_FILES[$fileField]["name"]) . ".<br>";
        $uploadOk = 0;
    }

    // Kiểm tra nếu $uploadOk là 0 do có lỗi
    if ($uploadOk == 0) {
        echo "Xin lỗi, tệp " . basename($_FILES[$fileField]["name"]) . " của bạn không được tải lên.<br>";
    } else {
        if (move_uploaded_file($_FILES[$fileField]["tmp_name"], $target_file)) {
            echo "Tệp " . htmlspecialchars(basename($_FILES[$fileField]["name"])) . " đã được tải lên.<br>";
            $imagePaths[$fileField] = $target_file; // Lưu đường dẫn tệp
        } else {
            echo "Xin lỗi, đã có lỗi xảy ra khi tải tệp " . basename($_FILES[$fileField]["name"]) . " lên.<br>";
        }
    }
}

// Xử lý upload cho từng trường
handleUpload('imagePath');
handleUpload('imagePathSP1');
handleUpload('imagePathSP2');

if ($uploadOk == 1) {
    // Lưu đường dẫn tệp vào cơ sở dữ liệu
    // Bạn có thể sử dụng câu lệnh SQL để chèn đường dẫn tệp vào bảng tương ứng
    $sql = "INSERT INTO your_table (image_path, image_path_sp1, image_path_sp2) VALUES ('" . $imagePaths['imagePath'] . "', '" . $imagePaths['imagePathSP1'] . "', '" . $imagePaths['imagePathSP2'] . "')";
    
    // Kết nối và thực hiện câu lệnh SQL
    // $conn là kết nối đến cơ sở dữ liệu của bạn
    if ($conn->query($sql) === TRUE) {
        echo "Đường dẫn tệp đã được lưu vào cơ sở dữ liệu.";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}
?>
