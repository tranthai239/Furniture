<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        

        <?php
        // Kết nối cơ sở dữ liệu
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "web";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Kết nối thất bại: " . $conn->connect_error);
        }

        // Lấy dữ liệu sản phẩm
        $sql = "SELECT ProductCode, NameProduct, Price, DiscountPrice, ImagePath, Color, Dimensions, Material, Policies, SKU 
                FROM `product-demo` WHERE Quantity > 1";
        $result = $conn->query($sql);

        // Tạo các mảng để phân loại sản phẩm
        $products_sale = [];
        $bedroom_products = [];
        $kitchen_products = [];
        $living_room_products = [];

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row['Price'] < $row['DiscountPrice']) {
                    $products_sale[] = $row;
                }
                if ($row['SKU'] === 'BED') {
                    $bedroom_products[] = $row;
                }
                if ($row['SKU'] === 'CHAIR' || $row['SKU'] === 'TABLE') {
                    $kitchen_products[] = $row;
                }
                if ($row['SKU'] === 'SOFA') {
                    $living_room_products[] = $row;
                }
            }
        }

        // Hàm hiển thị sản phẩm
        function displayProducts($title, $products) {
            echo "<h3>$title</h3>";
            echo "<div class='row'>";
            foreach ($products as $row) {
                echo "<div class='col-lg-3 col-md-4 col-sm-12 mb-4' onclick=\"window.location.href='../product-detail/index.php?ProductCode=" . $row['ProductCode'] . "'\" style='cursor: pointer;'>
                        <div class='card'>
                            <img class='card-img-top' src='" . $row['ImagePath'] . "' alt='" . $row['NameProduct'] . "'>
                            <div class='card-body'>
                                <h5 class='card-title'>" . $row['NameProduct'] . "</h5>
                                <p class='card-text'>Giá: " . number_format($row['Price']) . " VNĐ</p>";
                if (!empty($row['DiscountPrice'])) {
                    echo "<del>" . number_format($row['DiscountPrice']) . " VNĐ</del>";
                }
                echo "<p class='card-text'>Màu sắc: " . $row['Color'] . "</p>
                      <p class='card-text'>Kích thước: " . $row['Dimensions'] . "</p>
                      <p class='card-text'>Chất liệu: " . $row['Material'] . "</p>
                      <p class='card-text'>Chính sách: " . $row['Policies'] . "</p>
                      <form action='../product-cart-test/cart.php' method='POST' onsubmit='event.stopPropagation(); return confirm(\"Bạn có chắc chắn muốn thêm sản phẩm vào giỏ hàng?\");'>
                          <input type='hidden' name='product_code' value='" . $row['ProductCode'] . "'>
                          <button type='submit' class='btn btn-success'>Thêm vào giỏ hàng</button>
                      </form>
                            </div>
                        </div>
                      </div>";
            }
            echo "</div>";
        }

        // Hiển thị sản phẩm theo từng danh mục
        if (!empty($products_sale)) {
            displayProducts('Sản phẩm Sale', $products_sale);
        }
        if (!empty($bedroom_products)) {
            displayProducts('Nội thất phòng ngủ', $bedroom_products);
        }
        if (!empty($kitchen_products)) {
            displayProducts('Nội thất phòng bếp', $kitchen_products);
        }
        if (!empty($living_room_products)) {
            displayProducts('Nội thất phòng khách', $living_room_products);
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
