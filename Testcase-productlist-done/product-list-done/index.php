<?php 

session_start(); // Bắt đầu phiên

// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: ../LOGIN-REGISTER/index.html"); // Chuyển hướng về trang đăng nhập nếu chưa đăng nhập
    exit;
}

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

 <link href="style.css" rel="stylesheet">
  <style>
        /* Style for filter button and panel */
        .filter-icon {
            position: fixed;
            left: 0;
            top: 28%;
            transform: translateY(-50%);
            background-color: #007bff;
            color: white;
            padding: 10px;
            border-radius: 50%;
            cursor: pointer;
            z-index: 1050;
        }

        .filter-panel {
            position: fixed;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            background-color: #f8f9fa;
            padding: 15px;
            width: 300px;
            max-height: 80vh;
            overflow-y: auto;
            box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.2);
            z-index: 1040;
            display: none;
        }

        /* Toggle visibility */
        .filter-panel.active {
            display: block;
        }

        /* Responsive product display 
        .product-box {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            margin: 10px;
            text-align: center;
            height: 100%;
        }*/
        .product-buttons {
    display: flex;
    flex-direction: column; /* Sắp xếp các nút theo cột dọc */
    gap: 10px; /* Khoảng cách giữa các nút */
    margin-top: 10px; /* Khoảng cách phía trên các nút */
}

.product-buttons button {
    width: 100%; /* Đặt các nút rộng đầy đủ */
}

    </style>
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
              <a class="nav-link" href="../product list/Product list.html">Home <span class="sr-only">(current)</span></a>
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

  <main>
                   
           

   <div class="container-fluid">
    <div class="row">
        <!-- Icon and filter panel -->
        <div class="filter-icon" onclick="toggleFilter()">☰</div>
        <div class="filter-panel" id="filterPanel">
            <h5>Bộ Lọc Sản Phẩm</h5>
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
        </div>

        <!-- Product List -->
        <div class="col-lg-10 offset-lg-2 col-md-9 offset-md-3 p-3">
            <h3>Danh Sách Sản Phẩm</h3>
            <div class="row" style="justify-content: space-evenly;">
                <?php
                include 'product.php';
                ?>
            </div>
        </div>
    </div>
</div>






      
    
  </main>

  <footer style="
    width: -webkit-fill-available;
    bottom: 0%;
">
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

</div>

<!-- Link JS Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    // Toggle filter panel
    function toggleFilter() {
        var filterPanel = document.getElementById("filterPanel");
        filterPanel.classList.toggle("active");
    }
</script>


</body>
</html>
