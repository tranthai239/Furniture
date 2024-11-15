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

    .left-menu {
      position: fixed;
      top: 0;
      left: 0;
      width: 200px;
      height: 100%;
      background-color: #f8f9fa;
      padding-top: 20px;
      box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
    }

    
    
  </style>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  

</script>
</head>

<body>

  <!-- Left menu -->
 

  <!-- Product display section -->
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

// Lấy tất cả sản phẩm trong cơ sở dữ liệu
$sql = "SELECT ProductCode, NameProduct, Price, DiscountPrice, ImagePath, Color, Dimensions, Material, Policies, SKU 
        FROM `product-info` WHERE Quantity > 1";
$result = $conn->query($sql);

echo "<div class='container mt-4'>";
echo "<h3>Danh sách sản phẩm</h3>";
echo "<div class='row'>";

// Hiển thị tất cả sản phẩm trong vòng lặp
if ($result && $result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo "<div class='col-lg-3 col-md-4 col-sm-12 mb-4'>
            <div class='card product-card' data-sku='" . $row['SKU'] . "'> <!-- Thêm data-sku vào đây -->
                <img class='card-img-top' src='" . $row['ImagePath'] . "' alt='" . $row['ProductCode'] . "'>
                <div class='card-body'>
                    <h5 class='card-title'>" . $row['NameProduct'] . "</h5>
                    <p class='card-text'>Giá: " . number_format($row['Price']) . " VNĐ</p>";
    if (!empty($row['DiscountPrice'])) {
      echo "<del>" . number_format($row['DiscountPrice']) . " VNĐ</del>";
    }
    echo "</div>
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
} else {
  echo "<p>Không có sản phẩm nào để hiển thị.</p>";
}


echo "</div>"; // Đóng div.row
echo "</div>"; // Đóng div.container

$conn->close();
?>


     <?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ProductCode'])) {
  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
  }

  $ProductCode = $_POST['ProductCode'];

  // Câu truy vấn sản phẩm dựa trên NameProduct
  $sql = "SELECT ProductCode, NameProduct, Price, ImagePath, SKU FROM `product-demo` WHERE ProductCode = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $ProductCode);
  $stmt->execute();
  $result = $stmt->get_result();

  // Kiểm tra kết quả truy vấn
  if ($result && $result->num_rows > 0) {
    $product = $result->fetch_assoc();

    // Phần còn lại của mã để thêm sản phẩm vào giỏ hàng
    $checkSql = "SELECT Quantity FROM `cart` WHERE ProductCode = ?";
    $checkStmt = $conn->prepare($checkSql);
    $checkStmt->bind_param("s", $ProductCode);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();

    if ($checkResult && $checkResult->num_rows > 0) {
      $updateSql = "UPDATE `cart` SET Quantity = Quantity + 1 WHERE ProductCode = ?";
      $updateStmt = $conn->prepare($updateSql);
      $updateStmt->bind_param("s", $ProductCode);
      $updateStmt->execute();
      $updateStmt->close();
    } else {
      $insertSql = "INSERT INTO `cart` (ProductCode, NameProduct, Price, ImagePath, SKU, Quantity) 
                    VALUES (?, ?, ?, ?, ?, 1)";
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
    }

    echo json_encode(['success' => true]);
  } else {
    echo json_encode(['success' => false]);
  }

  $stmt->close();
  $checkStmt->close();
  $conn->close();
  exit;
}
?>




  </div>
</body>

</html>
