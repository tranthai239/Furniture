<?php
// Kiểm tra nếu action là "add_to_demo"
if (isset($_POST['action']) && $_POST['action'] == "add_to_demo") {
    // Lấy giá trị ProductCode từ form
    $ProductCode = mysqli_real_escape_string($conn, $_POST['ProductCode']);

    // Lấy dữ liệu từ bảng `product-info` theo ProductCode
    $query_select = "SELECT ProductCode, NameProduct, Price, DiscountPrice, ImagePath, SKU, Color, Dimensions, Material, Policies, Quantity 
                     FROM product_info 
                     WHERE ProductCode = '$ProductCode'";

    $result = mysqli_query($conn, $query_select);

    if ($result && mysqli_num_rows($result) > 0) {
        // Lấy dữ liệu của sản phẩm
        $row = mysqli_fetch_assoc($result);

        // Lấy các trường từ dữ liệu của sản phẩm
        $NameProduct = $row['NameProduct'];
        $Price = $row['Price'];
        $DiscountPrice = $row['DiscountPrice'];
        $ImagePath = $row['ImagePath'];
        $SKU = $row['SKU'];
        $Color = $row['Color'];
        $Dimensions = $row['Dimensions'];
        $Material = $row['Material'];
        $Policies = $row['Policies'];
        $Quantity = $row['Quantity'];

        // Thêm sản phẩm vào bảng `product-demo`
        $query_insert = "INSERT INTO product_demo (ProductCode, NameProduct, Price, DiscountPrice, ImagePath, SKU, Color, Dimensions, Material, Policies, Quantity)
                         VALUES ('$ProductCode', '$NameProduct', '$Price', '$DiscountPrice', '$ImagePath', '$SKU', '$Color', '$Dimensions', '$Material', '$Policies', '$Quantity')";

        if (mysqli_query($conn, $query_insert)) {
            // Nếu thành công, chuyển hướng về trang khác hoặc trang hiện tại với thông báo thành công
            header('Location: product_demo.php?status=success');
            exit();
        } else {
            // Nếu có lỗi trong việc thực thi câu lệnh SQL
            echo "Lỗi khi thêm sản phẩm demo: " . mysqli_error($conn);
        }
    } else {
        echo "Sản phẩm không tồn tại.";
    }
}
?>
