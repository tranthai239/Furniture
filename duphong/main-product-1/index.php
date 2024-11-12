<?php
session_start(); // Bắt đầu phiên

// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: ../LOGIN-REGISTER/index.html"); // Chuyển hướng về trang đăng nhập nếu chưa đăng nhập
    exit;
}

// Phần còn lại của mã trong file
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Pricing</title>
  <!-- Link CSS Bootstrap -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Link Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="main-css/style.css">

</head>

<body>

  <header>

    <nav class="navbar navbar-expand-lg navbar-light  container-fluid">
      <div class="container-fluid">
        <a class="navbar-brand logo" href="#"><img src="img/logo.jpg"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Product</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Birthday-event</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About us</a>
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

  <div class="wrapper">

    <!-- Banner -->
    <main>

      <div class="container">
        <div class="banner-container">
          <div class="banner">
            <img src="img/banner.jpg" alt="Banner 1">
          </div>
          <div class="banner">
            <img src="img/banner2.jpg" alt="Banner 2">
          </div>
          <div class="banner">
            <img src="img/banner.jpg" alt="Banner 3">
          </div>
          <button class="prev-btn" onclick="prevBanner()">&#10094;</button>
          <button class="next-btn" onclick="nextBanner()">&#10095;</button>
        </div>



        

        <!-- Filter Dropdown -->


      </div>


      <div class="container-fluid">
        <div class="row">
          <!--    <div class="col-lg-2 col-md-3 bg-light p-3">
          <form method="POST" action="">
                <div class="mb-3">
                    <label class="form-label">Chọn loại sản phẩm (SKU)</label>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="filter[]" value="BED">
                        <label class="form-check-label">Giường (BED)</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="filter[]" value="CHAIR">
                        <label class="form-check-label">Ghế (CHAIR)</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="filter[]" value="TABLE">
                        <label class="form-check-label">Bàn (TABLE)</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="filter[]" value="SOFA">
                        <label class="form-check-label">Sofa (SOFA)</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Chọn khoảng giá</label>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="price_filter[]" value="under_200000">
                        <label class="form-check-label">Dưới 200.000 VNĐ</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="price_filter[]" value="200000_500000">
                        <label class="form-check-label">200.000 - 500.000 VNĐ</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="price_filter[]" value="500000_1000000">
                        <label class="form-check-label">500.000 - 1.000.000 VNĐ</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="price_filter[]" value="above_1000000">
                        <label class="form-check-label">Trên 1.000.000 VNĐ</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Áp Dụng Lọc</button>
            </form>
        </div>-->

          <div class="col-lg-12 col-md-9 p-3">
            <?php include 'product.php'; ?>
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
              <p>Hai Ba Trung - Ha noi</p>
              <p>Email: tranthai2309hg@gmail.com</p>
              <p>Phone: +84 86 7747 280</p>
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


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
     function addToCart(productCode) {
    alert("Sản phẩm " + productCode + " đã được thêm vào giỏ hàng.");
}

function buyNow(productCode) {
    alert("Bạn đang mua sản phẩm " + productCode + ".");
}

function viewDetail(productCode) {
    window.location.href = "product-detail.php?productCode=" + productCode;
}
    </script>

    <script src="main-js/script.js"></script>
</body>

</html>