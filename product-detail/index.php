
<?php

session_start(); // Bắt đầu phiên

// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: ../LOGIN-REGISTER/index.html"); // Chuyển hướng về trang đăng nhập nếu chưa đăng nhập
    exit;
}
// Kết nối cơ sở dữ liệu
$servername = "localhost";
$username = "root";  
$password = "";
$dbname = "web";  

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$productCode = isset($_GET['ProductCode']) ? $_GET['ProductCode'] : '';

$sql = "SELECT NameProduct, Price, DiscountPrice, ImagePath, ImagePathSP1, ImagePathSP2, SKU, Color, Dimensions, Material, Policies FROM `product-info` WHERE ProductCode = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $productCode);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nameProduct = $row["NameProduct"];
    $price = $row["Price"];
    $discountPrice = $row["DiscountPrice"];
    $imagePath = 'images/' . basename($row["ImagePath"]);
    $imagePathSP1 = !empty($row["ImagePathSP1"]) ? 'images/' . basename($row["ImagePathSP1"]) : '';
    $imagePathSP2 = !empty($row["ImagePathSP2"]) ? 'images/' . basename($row["ImagePathSP2"]) : '';
    $sku = $row["SKU"];
    $color = $row["Color"];
    $dimensions = $row["Dimensions"];
    $material = $row["Material"];
    $policies = $row["Policies"];
} else {
    echo "Không tìm thấy sản phẩm.";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>shopping cart</title>
  <!-- Link CSS Bootstrap -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Link Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
 <link href="cart-css/style.css" rel="stylesheet">
</head>
<body>

<div class="wrapper" style="width: 100%;">

  <header>
  
    <nav class="navbar navbar-expand-lg navbar-light  container-fluid">
      <div class="container-fluid">
        <a class="navbar-brand logo" href="../product list/Product list.html"><img src="../img/logo.jpg"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
               <li class="nav-item active">
              <a class="nav-link" href="../main-product">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../product-list">Product</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../contact">contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../product-cart">Cart</a>
            </li>>
          </ul>
           <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    My account
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                        <!-- Hiện thị mục đăng xuất nếu đã đăng nhập -->
                        <a class="dropdown-item" href="../LOGIN-REGISTER/logout.php">Đăng xuất</a>
                    <?php else: ?>
                        <!-- Hiện thị mục đăng nhập và đăng ký nếu chưa đăng nhập -->
                        <a class="dropdown-item" href="../LOGIN-REGISTER/index.html">Login</a>
                        <a class="dropdown-item" href="../LOGIN-REGISTER/index.html">Sign Up</a>
                    <?php endif; ?>
                </div>
            </li>
        </ul>
        </div>
      </div>
    </nav>
  </header>

  <main style="background-color: #52d3d8;">
                   
   
       <div class="container">
        <div class="product-main">
            <div class="image-gallery">
                <img src="<?php echo $imagePath; ?>" alt="<?php echo $nameProduct; ?>" onclick="changeMainImage('<?php echo $imagePath; ?>')">
                <?php if ($imagePathSP1): ?>
                    <img src="<?php echo $imagePathSP1; ?>" alt="<?php echo $nameProduct; ?> - 1" onclick="changeMainImage('<?php echo $imagePathSP1; ?>')">
                <?php endif; ?>
                <?php if ($imagePathSP2): ?>
                    <img src="<?php echo $imagePathSP2; ?>" alt="<?php echo $nameProduct; ?> - 2" onclick="changeMainImage('<?php echo $imagePathSP2; ?>')">
                <?php endif; ?>
            </div>

            <div class="main-image">
                <img id="mainImage" src="<?php echo $imagePath; ?>" alt="<?php echo $nameProduct; ?>">
            </div>
        </div>

        <div class="product-details">
            <h2><?php echo $nameProduct; ?></h2>
            <p class="sku">SKU: <?php echo $sku; ?></p>
            <p class="price">
                <?php if ($discountPrice && $discountPrice < $price): ?>
                    <span class="discount">-<?php echo round((($price - $discountPrice) / $price) * 100); ?>%</span>
                    <span class="current-price"><?php echo number_format($discountPrice); ?>₫</span>
                    <span class="original-price"><?php echo number_format($price); ?>₫</span>
                <?php else: ?>
                    <span class="current-price"><?php echo number_format($price); ?>₫</span>
                <?php endif; ?>
            </p>
            <p class="color">Màu: <span class="color-dot" style="background-color: <?php echo $color; ?>;"></span> <?php echo ucfirst($color); ?></p>

            <h3>Kích thước:</h3>
            <p><?php echo $dimensions; ?></p>

            <h3>Chất liệu:</h3>
            <ul>
                <?php
                $materials = explode("\n", $material);
                foreach ($materials as $mat) {
                    echo "<li>$mat</li>";
                }
                ?>
            </ul>

            <div class="quantity-buy">
                <input type="number" min="1" value="1">
                <button class="add-to-cart">THÊM VÀO GIỎ</button>
                <button class="buy-now">MUA NGAY</button>
            </div>

            <div class="policy">
                <?php
                $policyList = explode("\n", $policies);
                foreach ($policyList as $policy) {
                    echo "<p>$policy</p>";
                }
                ?>
            </div>
        </div>
    </div>


      
    
  </main>

   <footer>
      <!-- Footer content here -->
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="contact-info">
              <h5>Contact Information</h5>
              <P> trần thanh thái</P>
              <p>Hai Ba Trung - Ha noi</p>
              <p>Email: tranthai2309hg@gmail.com</p>
              <p>Phone: +84 86 7747 280</p>
              <p> DHTI15A9HN</p>
            </div>
          </div>
        
        </div>
      </div>
    </footer>

</div>

<!-- Link JS Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="js/script.js"></script>


</body>
</html>
