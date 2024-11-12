<?php



$servername = "localhost";
$username = "root";  // Thay đổi nếu cần
$password = "";      // Thay đổi nếu cần
$dbname = "web";     // Tên cơ sở dữ liệu của bạn

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Kiểm tra xem có lọc theo SKU hay không
$filters = isset($_POST['filter']) ? $_POST['filter'] : [];
$priceFilters = isset($_POST['price_filter']) ? $_POST['price_filter'] : [];

// Tạo chuỗi truy vấn để lấy tất cả sản phẩm có số lượng lớn hơn 1
$sql = "SELECT ProductCode, NameProduct, Price, DiscountPrice, ImagePath, SKU, color, Dimensions, Material, Policies 
        FROM `product-info` WHERE Quantity > 1";

// Thêm điều kiện lọc cho SKU nếu có
if (!empty($filters)) {
    $skuConditions = array_map(fn($filter) => "SKU LIKE '$filter%'", $filters);
    $sql .= " AND (" . implode(' OR ', $skuConditions) . ")";
}

// Thêm điều kiện lọc cho giá nếu có
if (!empty($priceFilters) && is_array($priceFilters)) {
    $priceConditions = [];
    foreach ($priceFilters as $priceFilter) {
        switch ($priceFilter) {
            case 'under_200000':
                $priceConditions[] = "Price < 200000";
                break;
            case '200000_500000':
                $priceConditions[] = "Price BETWEEN 200000 AND 500000";
                break;
            case '500000_1000000':
                $priceConditions[] = "Price BETWEEN 500000 AND 1000000";
                break;
            case 'above_1000000':
                $priceConditions[] = "Price > 1000000";
                break;
        }
    }
    if (!empty($priceConditions)) {
        $sql .= " AND (" . implode(' OR ', $priceConditions) . ")";
    }
}

// Thực hiện truy vấn
$result = $conn->query($sql);

// Hiển thị sản phẩm
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='col-lg-3 col-md-4 col-sm-6 col-12 product-box' onmouseover='showButtons(this)' onmouseout='hideButtons(this)'>
                <a href='../product-detail/index.php?code=" . $row['ProductCode'] . "'>
                    <img class='card' src='" . $row['ImagePath'] . "' alt='" . $row['NameProduct'] . "' width='100%'>
                </a>
                <h4>" . $row['NameProduct'] . "</h4>
                <p>Giá: " . number_format($row['Price']) . " VNĐ</p>";
        if (!empty($row['DiscountPrice'])) {
            echo "<del>" . number_format($row['DiscountPrice']) . " VNĐ</del>";
        }
        echo "
              <div class='product-buttons' style='display: none;'>
                  <button class='btn btn-success' onclick='addToCart(\"" . $row['ProductCode'] . "\")'>Thêm vào giỏ hàng</button>
                  <button class='btn btn-primary' onclick='buyNow(\"" . $row['ProductCode'] . "\")'>Mua ngay</button>
                  <button class='btn btn-info' onclick='productInfo(\"" . $row['ProductCode'] . "\")'>Thông tin sản phẩm</button>
              </div>
            </div>";
    }
} else {
    echo "<p>Không tìm thấy sản phẩm có số lượng lớn hơn 1.</p>";
}

// Đóng kết nối
$conn->close();
?>
<script>
function showButtons(element) {
    element.querySelector('.product-buttons').style.display = 'block';
}

function hideButtons(element) {
    element.querySelector('.product-buttons').style.display = 'none';
}
</script>