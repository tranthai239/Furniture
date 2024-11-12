<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .product-card {
            position: relative;
            overflow: hidden;
            border-radius: 5%;
        }
        .product-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            opacity: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: opacity 0.3s ease;
        }
        .product-card:hover .product-overlay {
            opacity: 1;
        }
        .product-buttons {
            display: flex;
            flex-direction: column;
            bottom: 0%;
            margin: 0 auto;
            position: absolute;
        }
        .alert-custom {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            display: none;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function showAlert(message, type) {
            const alertBox = $('#alertBox');
            alertBox.removeClass('alert-success alert-danger').addClass('alert-' + type);
            alertBox.text(message);
            alertBox.fadeIn().delay(2000).fadeOut(); // Hiện thông báo rồi ẩn sau 2 giây
        }

        function addToCart(productCode) {
            $.post('product.php', { product_code: productCode }, function(response) {
                // Hiển thị thông báo dựa trên phản hồi từ server
                if (response.success) {
                    showAlert('Sản phẩm đã được thêm vào giỏ hàng.', 'success');
                } else {
                    showAlert('Không tìm thấy sản phẩm.', 'danger');
                }
            }, 'json');
        }
    </script>
</head>
<body>
    <div class="container mt-4">
        <!-- Phần hiển thị thông báo -->
        <div id="alertBox" class="alert alert-custom"></div>

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
                echo "<div class='col-lg-3 col-md-4 col-sm-12 mb-4'>
                        <div class='card product-card'>
                            <img class='card-img-top' src='" . $row['ImagePath'] . "' alt='" . $row['NameProduct'] . "'>
                            <div class='card-body'>
                                <h5 class='card-title'>" . $row['NameProduct'] . "</h5>
                                <p class='card-text'>Giá: " . number_format($row['Price']) . " VNĐ</p>";
                if (!empty($row['DiscountPrice'])) {
                    echo "<del>" . number_format($row['DiscountPrice']) . " VNĐ</del>";
                }
                echo "
                            </div>
                            <div class='product-overlay'>
                                <div class='product-buttons'>
                                    <button class='btn btn-success' onclick='addToCart(\"" . $row['ProductCode'] . "\")'>Thêm vào giỏ hàng</button>
                                    <a href='../product-cart/index.php?ProductCode=" . $row['ProductCode'] . "' class='btn btn-primary'>Mua ngay</a>
                                    <a href='../product-detail/index.php?ProductCode=" . $row['ProductCode'] . "' class='btn btn-info'>Chi tiết</a>
                                </div>
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

        // Đóng kết nối
        $conn->close();
        ?>

        <!-- PHP xử lý AJAX -->
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_code'])) {
            // Kết nối cơ sở dữ liệu
            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Kết nối thất bại: " . $conn->connect_error);
            }

            $productCode = $_POST['product_code'];

            // Lấy thông tin sản phẩm từ bảng `product-demo`
            $sql = "SELECT ProductCode, NameProduct, Price, ImagePath, SKU FROM `product-demo` WHERE ProductCode = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $productCode);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result && $result->num_rows > 0) {
                $product = $result->fetch_assoc();

                // Thêm sản phẩm vào bảng `cart` hoặc cập nhật `Quantity` nếu đã tồn tại
                $insertSql = "INSERT INTO `cart` (ProductCode, NameProduct, Price, ImagePath, SKU, Quantity) 
                              VALUES (?, ?, ?, ?, ?, 1)
                              ON DUPLICATE KEY UPDATE Quantity = Quantity + 1";
                $insertStmt = $conn->prepare($insertSql);
                $insertStmt->bind_param(
                    "ssiss",
                    $product['ProductCode'],
                    $product['NameProduct'],
                    $product['Price'],
                    $product['ImagePath'],
                    $product['SKU']
                );
                $insertStmt->execute();
                $insertStmt->close();

                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false]);
            }

            $stmt->close();
            $conn->close();
            exit; // Dừng thực thi mã PHP sau khi xử lý AJAX
        }
        ?>
    </div>
</body>
</html>
