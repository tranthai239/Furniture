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
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
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
    <script src="js/myscript.js"></script>
</body>
</html>
