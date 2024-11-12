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
  
    <nav class="navbar navbar-expand-lg navbar-light  container-fluid">
      <div class="container-fluid">
        <a class="navbar-brand logo" href="../product list/Product list.html"><img src="img/logo.jpg"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="../product list/Product list.html">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Product</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../product-list/index.php">Product</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../product-cart/index.php">Cart</a>
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
    margin: 20px 80px 20px 80px;
    padding: 20px 80px 80px 80px;
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
                        <div class="row text-muted"><?php echo $row['SKU']; ?></div>
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
            <div><h5><b>Summary</b></h5></div>
            <hr>
            <div class="row">
                <div class="col" style="padding-left:0;">ITEMS <?php echo $total_quantity; ?></div>
                <div class="col text-right">&euro; <span class="total-price"><?php echo number_format($total_price, 2); ?></span></div>
            </div>
            <form>
                <p>SHIPPING</p>
                <select>
                    <option class="text-muted">Standard-Delivery- &euro;5.00</option>
                </select>
                <p>GIVE CODE</p>
                <input id="code" placeholder="Enter your code">
            </form>
            <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                <div class="col">TOTAL PRICE</div>
                <div class="col text-right">&euro; <span class="final-total-price"><?php echo number_format($total_price + 5, 2); ?></span></div>
            </div>
            <button class="btn">CHECKOUT</button>
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
            <p>123 Street Name, City, Country</p>
            <p>Email: example@example.com</p>
            <p>Phone: +123 456 789</p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="feedback">
            <h5>Send Feedback</h5>
            <form>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Name">
              </div>
              <div class="form-group">
                <input type="email" class="form-control" placeholder="Your Email">
              </div>
              <div class="form-group">
                <textarea class="form-control" rows="3" placeholder="Your Message"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Send</button>
            </form>
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
