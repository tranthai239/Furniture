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
  <style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,200;0,300;0,400;0,500;0,600;1,300;1,400;1,500&display=swap');







    .home .hero {
      min-height: 60vh;
      background: url(../test-intro/bg-image.jpg) no-repeat;
      background-size: cover;
      background-position: center;
      display: flex;
      align-items: center;
    }

    .home .row {
      margin: 0;
    }

    .home .hero .text1 {
      font-size: 5rem;
      width: 45rem;
      background: #fff;
      padding: 1rem;
      text-align: center;
      opacity: .8;
    }

    .home .hero .text2 {
      font-size: 3rem;
      width: 35rem;
      background: var(--orange);
      padding: 1rem;
      text-align: center;
      opacity: .8;
      margin-top: 1rem;
      color: #fff;
    }


    .home .counting {
      min-height: 40vh;
      padding: 2rem 0;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-wrap: wrap;
    }

    .home .counting .box {
      margin: 2rem 4rem;
      text-align: center;
    }

    .home .counting .box .count {
      font-size: 7rem;
      color: #444;
    }

    .home .counting .box h3 {
      font-size: 0.5rem;
      color: var(--orange);
    }

    .about {
      min-height: 100vh;
      padding-bottom: 40px;
    }

    .about .image {
      padding: 2rem;
    }

    .about .image img {
      height: 45rem;
      object-fit: cover;
      box-shadow: 2.5rem 2.5rem 0 1rem var(--orange);
    }

    .about .info {
      padding: 2rem;
      margin-top: 3rem;
    }

    .about .info h2 {
      color: var(--orange);
      font-size: 3rem;
    }

    .about .info p {
      font-size: 1.4rem;
      color: #444;
      margin: 2rem 0;
    }

    .about .info .icons a {
      font-size: 2rem;
      height: 4rem;
      width: 4rem;
      line-height: 4rem;
      text-align: center;
      background: #333;
      color: #fff;
      border-radius: .5rem;
      margin-right: 1rem;
      text-decoration: none;
    }

    .about .info .icons a:hover {
      background: var(--orange);
    }

    .service {
      min-height: fit-content;
    }

    .service .box-container {
      width: 90%;
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
    }

    .service .box-container .box {
      height: 15rem;
      width: 15rem;
      box-shadow: 0 .2rem .5rem rgba(0, 0, 0, .3);
      border-left: .5rem solid var(--orange);
      border-right: .5rem solid var(--orange);
      border-radius: .5rem;
      text-align: center;
      padding-top: 1rem;
      margin: 1rem 2rem;
    }

    .service .box-container .box .fas {
      color: var(--orange);
      font-size: 2rem;
    }

    .service .box-container .box p {
      color: #333;
      font-size: 1.1rem;
      margin: 2rem 0;
    }

    .project {
      min-height: 100vh;

    }

    .project .heading {
      color: #fff;
    }

    .project .box-container {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
    }

    .project .box-container .box {
      height: 20rem;
      width: 30rem;
      border-radius: .5rem;
      margin: 2rem;
      overflow: hidden;
      box-shadow: 0 .3rem .5rem #000;
    }

    .project .box-container .box img {
      height: 100%;
      width: 100%;
      object-fit: cover;
    }

    .project .box-container .box:hover img {
      transform: scale(1.3);
    }


    .contact {
      min-height: 100vh;
    }

    .contact-box-container {
      width: 93%;
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
    }

    .contact-box-container .contact-box {
      height: 15rem;
      flex: 1 0 30rem;
      margin: 2rem;
      box-shadow: 0 .3rem .5rem rgba(0, 0, 0, .2);
      border-radius: .5rem;
      text-align: center;
      padding-top: 4rem;
    }

    .contact-box-container .contact-box i {
      color: var(--orange);
      font-size: 4rem;
    }

    .contact-box-container .contact-box h3 {
      font-size: 1.8rem;
      color: #444;
      margin: 2rem 0;
    }

    .contact .form-container {
      width: 90%;
      box-shadow: 0 .3rem .5rem rgba(0, 0, 0, .2);
      border-radius: .5rem;
      padding: 1rem 3rem;
      margin-bottom: 40px;
    }

    .contact .form-container form input,
    textarea {
      height: 4.5rem;
      padding: 0 1rem;
      margin: 2rem 0;
      font-size: 1.5rem;
      box-shadow: 0 .3rem .5rem rgba(0, 0, 0, .2);
      border: none;
      outline: none;
      color: #333;
    }

    .contact .form-container form .inputBox {
      display: flex;
      justify-content: space-between;
    }

    .contact .form-container form input[type="text"] {
      width: 49%;
    }

    .contact .form-container form input[type="email"] {
      width: 100%;
    }

    .contact .form-container form textarea {
      width: 100%;
      height: 20rem;
      padding: 1rem;
      resize: none;
      overflow-y: auto;
    }

    .contact .form-container form input[type="submit"] {
      background: var(--orange);
      width: 15rem;
      color: #fff;
      font-size: 2rem;
    }

    .contact .form-container form input[type="submit"]:hover {
      opacity: .8;
    }














    .fa-times {
      transform: rotate(180deg);
    }

    /* media queries  */

    @media (max-width:768px) {

      html {
        font-size: 50%;
      }








    }

    @media (max-width:400px) {
      .home .hero .text1 {
        font-size: 3.5rem;
        width: 33rem;
      }

      .home .hero .text2 {
        font-size: 2.5rem;
        width: 30rem;
      }
    }

 /*  .float-menu {
            position: fixed;
            top: 50%;
            left: 0;
            transform: translateY(-50%);
            background-color: #f8f9fa;
            padding: 20px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            width: 250px;
            z-index: 1000;
        }
        
        .toggle-button {
            margin: 10px 0;
        }

        /* Mobile view toggle icon 
        .menu-toggle-btn {
            position: fixed;
            top: 50%;
            left: 0;
            transform: translateY(-50%);
            z-index: 1001;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 50%;
            padding: 10px;
            display: none;
        }

        @media (max-width: 768px) {
            .menu-toggle-btn {
                display: block;
            }
            .float-menu {
                display: none;
            }
        }
        }   */
       
.sort-options {
  display: flex;
  align-items: center;
}

.sort-options span {
  font-weight: bold;
  margin-right: 10px;
  color: #333;
}
.row1{
  display: flex;
  flex-wrap: wrap;
}

/* Bố cục mặc định sử dụng Flexbox */
.product-list {
    display: flex;
    flex-wrap: wrap; /* Các sản phẩm sẽ tự động xuống dòng khi không đủ không gian */
    justify-content: flex-start; /* Căn lề các sản phẩm về phía bên trái */
}

/* Mỗi sản phẩm chiếm một phần của dòng */
.product-card {
  
}

/* Đảm bảo các sản phẩm tự động thay đổi bố cục khi xem trên điện thoại */
@media (max-width: 768px) {
    .product-list {
        flex-direction: column; /* Hiển thị sản phẩm theo chiều dọc khi trên màn hình nhỏ */
    }
    .product-card {
        width: 200px; /* Mỗi sản phẩm chiếm toàn bộ chiều rộng khi trên màn hình nhỏ */
    }
}
.filter-section {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}
.filter-section form {
    display: flex;
    gap: 10px;
    width: 100%;
}



  </style>
 
    

  

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

  <div class="wrapper">

    <!-- Banner -->
    
                    
        <!-- Color Filter -->
       

      
    <main>

    
   <div  class="row1">

              


        <!-- Filter Dropdown -->
                  <div class="col-lg-12 col-md-9 p-3">

           
<div class="container mt-4">
        <div class="row mb-4">
            <div class="col-md-4">
                <input type="text" id="searchInput" class="form-control" placeholder="Enter product name or SKU">
            </div>
            <div class="col-md-3">
                <select id="searchBy" class="form-control">
                    <option value="all">Show All</option>
                    <option value="NameProduct">Search by Name</option>
                    <option value="SKU">Search by SKU</option>
                </select>
            </div>
            <div class="col-md-2">
                <button id="searchButton" class="btn btn-primary">Search</button>
            </div>
        </div>
    <div id="productList" style="display: flex;flex-wrap:wrap; "> <?php include 'product.php'; ?></div>

  </div>
</div>





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

    <!-- Link JS Bootstrap -->


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
     <script>
    

    
  
   





</script>
<script src="main-js/filter.js"></script>

    <script src="main-js/script.js"></script>
</body>

</html>