<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php



session_start(); // Bắt đầu phiên

// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: ../LOGIN-REGISTER/index.html"); // Chuyển hướng về trang đăng nhập nếu chưa đăng nhập
    exit;
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$sql = "SELECT SUM(Quantity) AS total_quantity FROM cart";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_quantity = isset($row['total_quantity']) ? $row['total_quantity'] : 0;
?>

    




  


  <header>
  
    <nav class="navbar navbar-expand-lg navbar-light  container-fluid" style="background-color: #38419d;">
      <div class="container-fluid">
        <a class="navbar-brand logo" href="../product list/Product list.html"><img src="img/logo.jpg"></a>
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
            </li>
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

  <main>
         <div class="row" style="
    width: -webkit-fill-available;
    padding: 10px 10px 10px 10px;
    background: linear-gradient(45deg, black, transparent);
">
        <div class="col-md-8 col-lg-8 cart">
            <div class="title">
                <div class="row">
                    <div class="col"><h4><b>Shopping Cart</b></h4></div>
                    <div class="col align-self-center text-right text-muted">
                        <?php echo $total_quantity . " items"; ?>
                    </div>
                </div>
            </div>

            <?php
            $sql = "SELECT * FROM cart";
            $result = $conn->query($sql);
            $total_price = 0;

            while($row = $result->fetch_assoc()) {
                $item_total_price = $row['Price'] * $row['Quantity'];
                $total_price += $item_total_price;
            ?>
            <div class="row border-top border-bottom">
                <div class="row main align-items-center">
                    <div class="col-2">
                        <img class="img-fluid" src="<?php echo $row['ImagePath']; ?>" alt="Product Image">
                    </div>
                    <div class="col">
                        <div class="row"><?php echo $row['NameProduct']; ?></div>
                    </div>
                    <div class="col d-flex justify-content-center align-items-center">
                        <button class="btn-quantity btn-sm btn-light quantity-btn" data-action="decrease" data-id="<?php echo $row['SKU']; ?>">-</button>
                        <input type="text" class="text-center quantity-input mx-2" value="<?php echo $row['Quantity']; ?>" data-price="<?php echo $row['Price']; ?>" readonly>
                        <button class="btn-quantity btn-sm btn-light quantity-btn" data-action="increase" data-id="<?php echo $row['SKU']; ?>">+</button>
                    </div>
                    <div class="col">
                        &euro; <span class="item-total-price"><?php echo number_format($item_total_price, 2); ?></span>
                        <span class="close" data-id="<?php echo $row['SKU']; ?>">&times;</span>
                    </div>
                </div>
            </div>
            <?php } ?>

            <div class="back-to-shop">
                <a href="#">&leftarrow;</a><span class="text-muted">Back to shop</span>
            </div>
        </div>

        <div class="col-md-4 col-lg-4 summary">
            <div class="table-responsive">
                <table class="table table-centered mb-0 table-nowrap">
                    <thead>
                        <tr>
                            <th class="border-top-0" style="width: 110px;" scope="col">Product</th>
                            <th class="border-top-0" scope="col">Product Desc</th>
                            <th class="border-top-0" scope="col">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  
                        // Kết nối tới cơ sở dữ liệu
                       

                        // Truy vấn sản phẩm từ bảng 'cart'
                        $query = "SELECT ImagePath, NameProduct, Price, Quantity, (Price * Quantity) AS totalPrice FROM cart";
                        $result = mysqli_query($conn, $query);

                        // Kiểm tra xem truy vấn có thành công không
                        if (!$result) {
                            die("Query failed: " . mysqli_error($conn));
                        }

                        // Tổng giá trị các sản phẩm
                        $totalPrice = 0;

                        // Hiển thị từng sản phẩm trong bảng
                        while ($row = mysqli_fetch_assoc($result)) {
                            $totalPrice += $row['totalPrice'];
                            echo "<tr>
                                <th scope='row'><img src='{$row['ImagePath']}' alt='product-img' title='product-img' class='avatar-lg rounded'></th>
                                <td>
                                    <h5 class='font-size-16 text-truncate'><a href='#' class='text-dark'>{$row['NameProduct']}</a></h5>
                                    <p class='text-muted mb-0'>\${$row['Price']} x {$row['Quantity']}</p>
                                </td>
                                <td>\${$row['totalPrice']}</td>
                            </tr>";
                        }
                        ?>

                        <!-- Tổng phụ -->
                        <tr>
                            <td colspan="2">
                                <h5 class="font-size-14 m-0">Sub Total :</h5>
                            </td>
                            <td>
                                $<?php echo number_format($totalPrice, 2); ?>
                            </td>
                        </tr>

                        <!-- Giảm giá -->
                        <tr>
                            <td colspan="2">
                                <h5 class="font-size-14 m-0">Discount :</h5>
                            </td>
                            <td>
                                - $10
                            </td>
                        </tr>

                        <!-- Phí vận chuyển -->
                        <tr>
                            <td colspan="2">
                                <h5 class="font-size-14 m-0">Shipping Charge :</h5>
                            </td>
                            <td>
                                $25
                            </td>
                        </tr>

                        <!-- Thuế ước tính
                        <tr>
                            <td colspan="2">
                                <h5 class="font-size-14 m-0">Estimated Tax :</h5>
                            </td>
                            <td>
                                $18.20
                            </td>
                        </tr> -->

                        <!-- Tổng cộng -->
                        <tr class="bg-light">
                            <td colspan="2">
                                <h5 class="font-size-14 m-0">Total:</h5>
                            </td>
                            <td>
                                <?php
                                    $discount = 10;
                                    $shippingCharge = 25;
                                 //   $estimatedTax = 18.20;
                                    $total = $totalPrice - $discount + $shippingCharge   ;/* + $estimatedTax;*/
                                    echo "$" . number_format($total, 2);
                                ?>
                            </td>
                        </tr>

                    </tbody>

                </table>
                <button style="border-radius: 10px;
    margin: 5px 5px 5px 115px;">check out</button>
            </div>
        </div>
    </div>           
  
  </main>

   <footer style="background-color: #200e3a;
    color: white;">
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



<!-- Link JS Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script type="text/javascript" src="cart-css/"></script>





<script src="script.js"></script>
</body>
</html>
