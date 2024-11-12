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
</style>
 <script src="main-js/script.js"></script>


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

              <div class="container">
        <section id="project" class="project">

          <div class="heading" style="background-color: black; width: fit-content; border-radius: 10px;padding: 10px;margin: 0 auto;"><h1>our projects</h1></div>

          <div class="box-container mx-auto">

            <div class="box">
              <a href="images/i1.jpg" title="house">
                <img src="images/i1.jpg" alt="">
              </a>
            </div>

            <div class="box">
              <a href="i2.jpg" title="hall">
                <img src="images/i2.jpg" alt="">
              </a>
            </div>

            <div class="box">
              <a href="i3.jpg" title="pole">
                <img src="images/i3.jpg" alt="">
              </a>
            </div>

            <div class="box">
              <a href="../images/i4.jpg" title="kitchen">
                <img src="images/i4.jpg" alt="">
              </a>
            </div>

            <div class="box">
              <a href="i5.jpg" title="bath">
                <img src="images/i5.jpg" alt="">
              </a>
            </div>

            <div class="box">
              <a href="i6.jpg" title="toilet">
                <img src="images/i6.jpg" alt="">
              </a>
            </div>

          </div>

        </section>
                <section id="about" class="about container">

     <div class="heading" style="background-color: black; width: fit-content; border-radius: 10px;padding: 10px;margin: 0 auto;"><h1>our projects</h1></div>
    <div class="row align-items-center">

      <div class="col-md-6 image">
        <img src="images/home-bg.jpg" width="90%" alt="">
      </div>

      <div class="col-md-6 info">
        <p>Showrooms nội thất lớn nhất thành </p>
        <p>Showroom không chỉ là nơi để các doanh nghiệp trưng bày sản phẩm mà còn là nơi giúp các doanh nghiệp có thể dễ dàng quảng bá thương hiệu. Bởi vậy, hầu hết các doanh nghiệp đều chú trọng đầu tư thiết kế nội thất showroom. Nhưng thiết kế nội thất như thế nào thì sẽ đem lại hiệu quả cao nhất? Bài viết dưới đây sẽ cho bạn câu trả lời hay nhất.</p>
        <p>là đơn vị thi công và thiết kế nội thất showroom chuyên nghiệp. Với nhiều năm kinh nghiệm trong thiết kế và thi công nội thất, chúng tôi hiện là đơn vị dẫn đầu trong việc Mix & Match các phong cách nội thất. Những thiết kế mà chúng tôi thực hiện hướng đến sự sáng tạo, thu hút và mang dấu ấn riêng của thương hiệu doanh nghiệp. Để đảm bảo chất lượng, Housedesign cung cấp dịch vụ thi công nội thất trọn gói chỉnh chu trong từng chi tiết, biến ý tưởng sáng tạo nhất thành hiện thực.

Nếu bạn đang muốn tìm một đối tác thiết kế phong cách nội thất showroom chuyên nghiệp, uy tín, xin vui lòng liên hệ ngay với chúng tôi, hotline 0973 990 339. Chúng tôi sẽ hỗ trợ bạn tốt nhất có thể.</p>
        <div class="icons">
          <a href="#" class="fab fa-facebook-f"></a>
          <a href="#" class="fab fa-twitter"></a>
          <a href="#" class="fab fa-instagram"></a>
          <a href="#" class="fab fa-pinterest "></a>
        </div>
      </div>

    </div>

  </section>

  <!-- service section starts  -->

  <section id="service" class="service">

      <div class="heading" style="background-color: black; width: fit-content; border-radius: 10px;padding: 10px;margin: 0 auto;"><h1>our projects</h1></div>

    <div class="box-container mx-auto">

      <div class="box">
        <div class="fas fa-palette"></div>
        <p>màu sắc đa dạng , phù hợp với mọi nhu cầu</p>
      </div>

      <div class="box">
        <div class="fas fa-tools"> </div>
        <p> bảo hành , sửa chữa chuyên</p>
      </div>

      <div class="box">
        <div class="fas fa-house-user"></div>
        <p> thiết kế sang trọng , tối giản , hiện đại </p>
      </div>

      <div class="box">
        <div class="fas fa-couch"></div>
        <p> lựa chọn tuyệt vời cho không gian phòng khách  </div>

      <div class="box">
        <div class="fas fa-bed"></div>
        <p> êm ái , thư giãn 
        </p>
      </div>

      <div class="box">
        <div class="fas fa-bath"></div>
        <p>  công nghệ tích hợp tiện lợi</p>
      </div>

    </div>

  </section>
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
             <div ><h1 class="heading" style="background-color: black; width: fit-content; border-radius: 10px;padding: 10px;margin: 0 auto;">our product</h1>
             <?php include 'product.php'; ?></div>
            
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
              <p> DHTIA9HN</p>
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
      




 function addToCart(ProductCode) {

           $.post('product.php', { ProductCode: ProductCode }, function(response) {
                // Hiển thị thông báo dựa trên phản hồi từ server
               if (response.success) {
                    showAlert('Sản phẩm đã được thêm vào giỏ hàng.', 'success');
                } else {
                    showAlert('Không tìm thấy sản phẩm.', 'danger');
                }
            }, 'json');
                
        }
  
      function buyNow(ProductCode) {
        alert("Bạn đang mua sản phẩm " + ProductCode + ".");
      }

      function viewDetail(ProductCode) {
        window.location.href = "product-detail.php?ProductCode=" + ProductCode;
      }
    </script>

   </body>

</html>