<?php




/*session_start(); // Bắt đầu phiên

// Kiểm tra xem người dùng đã đăng nhập và có quyền admin chưa
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || !isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("location: ../LOGIN-REGISTER/index.html"); // Chuyển hướng về trang đăng nhập nếu chưa đăng nhập hoặc không phải admin
    exit; 
}*/




include 'db_connection.php'; // Kết nối đến cơ sở dữ liệu

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $action = $_POST['action'];
  $table = $_POST['table']; // Bảng nào được chọn

  if ($action == "clear") {
    // Xóa tất cả dữ liệu trong ô input
    header("Location: index.php");
    exit();
  }

  // Các biến cho bảng product-info
  if ($table == "product_info") {
    $ProductCode = mysqli_real_escape_string($conn, $_POST['ProductCode']);
    $NameProduct = mysqli_real_escape_string($conn, $_POST['NameProduct']);
    $Price = mysqli_real_escape_string($conn, $_POST['Price']);
    $DiscountPrice = mysqli_real_escape_string($conn, $_POST['DiscountPrice']);
    $ImagePath = mysqli_real_escape_string($conn, $_POST['ImagePath']);
    $SKU = mysqli_real_escape_string($conn, $_POST['SKU']);
    $Color = mysqli_real_escape_string($conn, $_POST['Color']);
    $Dimensions = mysqli_real_escape_string($conn, $_POST['Dimensions']);
    $Material = mysqli_real_escape_string($conn, $_POST['Material']);
    $Policies = mysqli_real_escape_string($conn, $_POST['Policies']);
    $ImagePathSP1 = mysqli_real_escape_string($conn, $_POST['ImagePathSP1']);
    $ImagePathSP2 = mysqli_real_escape_string($conn, $_POST['ImagePathSP2']);
    $Quantity = mysqli_real_escape_string($conn, $_POST['Quantity']);

    if ($action == "add") {
      $sql = "INSERT INTO `product-info` (ProductCode, NameProduct, Price, DiscountPrice, ImagePath, SKU, Color, Dimensions, Material, Policies, ImagePathSP1, ImagePathSP2, Quantity) 
                    VALUES ('$ProductCode', '$NameProduct', '$Price', '$DiscountPrice', '$ImagePath', '$SKU', '$Color', '$Dimensions', '$Material', '$Policies', '$ImagePathSP1', '$ImagePathSP2', '$Quantity')";
      if (!$conn->query($sql)) {
        echo "Error: " . $conn->error;
      }
    } elseif ($action == "edit") {
      $sql = "UPDATE `product-info` SET 
                    NameProduct='$NameProduct', Price='$Price', DiscountPrice='$DiscountPrice', ImagePath='$ImagePath', SKU='$SKU', 
                    Color='$Color', Dimensions='$Dimensions', Material='$Material', Policies='$Policies', ImagePathSP1='$ImagePathSP1', ImagePathSP2='$ImagePathSP2', Quantity='$Quantity' 
                    WHERE ProductCode='$ProductCode'";
      if (!$conn->query($sql)) {
        echo "Error: " . $conn->error;
      }
    } elseif ($action == "delete") {
      $sql = "DELETE FROM `product-info` WHERE ProductCode='$ProductCode'";
      if (!$conn->query($sql)) {
        echo "Error: " . $conn->error;
      }
    } elseif ($action == "add_to_demo") {
      // Các biến cho bảng product-demo từ bảng product-info
      $ProductCode = mysqli_real_escape_string($conn, $_POST['ProductCode']);
      $NameProduct = mysqli_real_escape_string($conn, $_POST['NameProduct']);
      $Price = mysqli_real_escape_string($conn, $_POST['Price']);
      $DiscountPrice = mysqli_real_escape_string($conn, $_POST['DiscountPrice']);
      $ImagePath = mysqli_real_escape_string($conn, $_POST['ImagePath']);
      $SKU = mysqli_real_escape_string($conn, $_POST['SKU']);
      $Color = mysqli_real_escape_string($conn, $_POST['Color']);
      $Dimensions = mysqli_real_escape_string($conn, $_POST['Dimensions']);
      $Material = mysqli_real_escape_string($conn, $_POST['Material']);
      $Policies = mysqli_real_escape_string($conn, $_POST['Policies']);
      $Quantity = mysqli_real_escape_string($conn, $_POST['Quantity']); // Sử dụng Quantity từ product-info hoặc giá trị mặc định

      $sql = "INSERT INTO `product-demo` (ProductCode, NameProduct, Price, DiscountPrice, ImagePath, SKU, Color, Dimensions, Material, Policies, Quantity) 
                    VALUES ('$ProductCode', '$NameProduct', '$Price', '$DiscountPrice', '$ImagePath', '$SKU', '$Color', '$Dimensions', '$Material', '$Policies', '$Quantity')";
      if (!$conn->query($sql)) {
        echo "Error: " . $conn->error;
      }
    }
  } elseif ($table == "product_demo") {
    // Các biến cho bảng product-demo
    $ProductCode = mysqli_real_escape_string($conn, $_POST['ProductCode']);
    $NameProduct = mysqli_real_escape_string($conn, $_POST['NameProduct']);
    $Price = mysqli_real_escape_string($conn, $_POST['Price']);
    $DiscountPrice = mysqli_real_escape_string($conn, $_POST['DiscountPrice']);
    $ImagePath = mysqli_real_escape_string($conn, $_POST['ImagePath']);
    $SKU = mysqli_real_escape_string($conn, $_POST['SKU']);
    $Color = mysqli_real_escape_string($conn, $_POST['Color']);
    $Dimensions = mysqli_real_escape_string($conn, $_POST['Dimensions']);
    $Material = mysqli_real_escape_string($conn, $_POST['Material']);
    $Policies = mysqli_real_escape_string($conn, $_POST['Policies']);
    $Quantity = mysqli_real_escape_string($conn, $_POST['DemoQuantity']);

    if ($action == "add") {
      $sql = "INSERT INTO `product-demo` (ProductCode, NameProduct, Price, DiscountPrice, ImagePath, SKU, Color, Dimensions, Material, Policies, Quantity) 
                    VALUES ('$ProductCode', '$NameProduct', '$Price', '$DiscountPrice', '$ImagePath', '$SKU', '$Color', '$Dimensions', '$Material', '$Policies', '$Quantity')";
      if (!$conn->query($sql)) {
        echo "Error: " . $conn->error;
      }
    } elseif ($action == "edit") {
      $sql = "UPDATE `product-demo` SET 
                    NameProduct='$NameProduct', Price='$Price', DiscountPrice='$DiscountPrice', ImagePath='$ImagePath', SKU='$SKU', 
                    Color='$Color', Dimensions='$Dimensions', Material='$Material', Policies='$Policies', Quantity='$Quantity' 
                    WHERE ProductCode='$ProductCode'";
      if (!$conn->query($sql)) {
        echo "Error: " . $conn->error;
      }
    } elseif ($action == "delete") {
      $sql = "DELETE FROM `product-demo` WHERE ProductCode='$ProductCode'";
      if (!$conn->query($sql)) {
        echo "Error: " . $conn->error;
      }
    }
  } elseif ($table == "contact_form") {
    // Các biến cho bảng contact_form
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    if ($action == "add") {
      $sql = "INSERT INTO `contact_form` (username, email, message) VALUES ('$username', '$email', '$message')";
      if (!$conn->query($sql)) {
        echo "Error: " . $conn->error;
      }
    } elseif ($action == "delete") {
      // Xóa bằng ID
      $id = mysqli_real_escape_string($conn, $_POST['id']);
      $sql = "DELETE FROM `contact_form` WHERE id='$id'";
      if (!$conn->query($sql)) {
        echo "Error: " . $conn->error;
      }
    }
  }

  header("Location: index.php");
  exit();
}
?>


<!-- Your existing HTML structure continues here -->


<!DOCTYPE html>
<html lang="en">

<head>
  <title>Quản lý sản phẩm</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css"> <!-- Thêm liên kết đến file CSS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>


  </script>
</head>

<body>
  <div class="container-fluid p-5 bg-primary text-white text-center">
    <h1>Quản lý sản phẩm</h1>
    <p>Quản lý thông tin sản phẩm dễ dàng!</p>
  </div>

  <div class="container mt-5">
    <!-- Tabs -->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <a class="nav-link active" id="product-info-tab" data-bs-toggle="tab" href="#product-info" role="tab"
          aria-controls="product-info" aria-selected="true">Quản lý sản phẩm</a>
      </li>
      <li class="nav-item" role="presentation">
        <a class="nav-link" id="product-demo-tab" data-bs-toggle="tab" href="#product-demo" role="tab"
          aria-controls="product-demo" aria-selected="false">Quản lý danh mục sản phẩm</a>
      </li>
      <li class="nav-item" role="presentation">
        <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab" aria-controls="contact"
          aria-selected="false">Quản lý liên hệ</a>
      </li>

    </ul>

    <div class="tab-content mt-3" id="myTabContent">
      <!-- Tab cho product-info -->
      <div class="tab-pane fade show active" id="product-info" role="tabpanel" aria-labelledby="product-info-tab">
        <div class="row">
          <div class="col-lg-4 col-sm-8">
            <form action="index.php" method="post">
              <input type="hidden" name="table" value="product_info">
              <label>Mã sản phẩm</label>
              <input type="text" name="ProductCode" required>

              <label>Tên sản phẩm</label>
              <input type="text" name="NameProduct" required>

              <label>Giá</label>
              <input type="number" name="Price" required>

              <label>Giá khuyến mãi</label>
              <input type="number" name="DiscountPrice" required>

              <label>Đường dẫn ảnh</label>
              <input type="text" name="ImagePath" required>

              <label>SKU</label>
              <input type="text" name="SKU" required>

              <label>Màu sắc</label>
              <input type="text" name="Color" required>

              <label>Kích thước</label>
              <input type="text" name="Dimensions" required>

              <label>Chất liệu</label>
              <input type="text" name="Material" required>

              <label>Chính sách</label>
              <input type="text" name="Policies" required>

              <label>Đường dẫn ảnh phụ 1</label>
              <input type="text" name="ImagePathSP1">

              <label>Đường dẫn ảnh phụ 2</label>
              <input type="text" name="ImagePathSP2">

              <label>Số lượng</label>
              <input type="number" name="Quantity" required>

              <button type="submit" name="action" value="add" class="btn btn-success">Thêm sản
                phẩm</button>
              <button type="submit" name="action" value="edit" class="btn btn-warning">Sửa sản
                phẩm</button>
              <button type="submit" name="action" value="delete" class="btn btn-danger">Xóa sản
                phẩm</button>

              <button type="submit" name="action" value="add_to_demo" class="btn btn-primary">Thêm vào sản
                phẩm demo</button>

              <button type="submit" name="action" value="clear" class="btn btn-secondary">Clear</button>
            </form>
          </div>

          <div class="col-lg-8 col-sm-12">
            <div class="table-container">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Chọn</th>
                    <th>Mã sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Giá khuyến mãi</th>
                    <th>Đường dẫn ảnh</th>
                    <th>Số lượng</th>
                    <th>SKU</th>
                    <th>Màu</th>
                    <th>Chất liệu</th>
                    <th>Đường dẫn ảnh phụ 1</th>
                    <th>Đường dẫn ảnh phụ 2</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql = "SELECT * FROM `product-info`";
                  $result = $conn->query($sql);
                  while ($row = $result->fetch_assoc()) {
                    echo '<tr onclick="fillFormProductInfo( \'' . $row['ProductCode'] . '\', \'' . $row['NameProduct'] . '\', ' . $row['Price'] . ', ' . $row['DiscountPrice'] . ', \'' . $row['ImagePath'] . '\', \'' . $row['SKU'] . '\', \'' . $row['Color'] . '\', \'' . $row['Dimensions'] . '\', \'' . $row['Material'] . '\', \'' . $row['Policies'] . '\', \'' . $row['ImagePathSP1'] . '\', \'' . $row['ImagePathSP2'] . '\', ' . $row['Quantity'] . ');">';
                    echo '<td><input type="checkbox" onclick="selectCheckboxProductInfo(this);"></td>';
                    echo '<td>' . $row['ProductCode'] . '</td>';
                    echo '<td>' . $row['NameProduct'] . '</td>';
                    echo '<td>' . $row['Price'] . '</td>';
                    echo '<td>' . $row['DiscountPrice'] . '</td>';
                    echo '<td>' . $row['ImagePath'] . '</td>';
                    echo '<td>' . $row['Quantity'] . '</td>';
                    echo '<td>' . $row['SKU'] . '</td>';
                    echo '<td>' . $row['Color'] . '</td>'; // Cột Màu
                    echo '<td>' . $row['Material'] . '</td>'; // Cột Chất liệu
                    echo '<td>' . $row['ImagePathSP1'] . '</td>'; // Cột Đường dẫn ảnh phụ 1
                    echo '<td>' . $row['ImagePathSP2'] . '</td>'; // Cột Đường dẫn ảnh phụ 2
                    echo '</tr>';
                  }



                  ?>
                </tbody>



              </table>
            </div>
          </div>

        </div>
      </div>


      <!-- Tab cho product-demo -->
      <div class="tab-pane fade" id="product-demo" role="tabpanel" aria-labelledby="product-demo-tab">
        <div class="row">
          <div class="col-lg-4 col-sm-8">
            <form action="index.php" method="post">
              <input type="hidden" name="table" value="product_demo">
              <label>Mã sản phẩm demo</label>
              <input type="text" name="ProductCodeDemo" id="ProductCode" required>

              <label>Tên sản phẩm demo</label>
              <input type="text" name="NameProductDemo" id="NameProduct" required>

              <label>Giá</label>
              <input type="number" name="Price" id="Price" required>

              <label>Giá khuyến mãi</label>
              <input type="number" name="DiscountPrice" id="DiscountPrice" required>

              <label>Đường dẫn ảnh</label>
              <input type="text" name="ImagePath" id="ImagePath" required>

              <label>SKU</label>
              <input type="text" name="SKU" id="SKU" required>

              <label>Màu sắc</label>
              <input type="text" name="Color" id="Color" required>

              <label>Kích thước</label>
              <input type="text" name="Dimensions" id="Dimensions" required>

              <label>Chất liệu</label>
              <input type="text" name="Material" id="Material" required>

              <label>Chính sách</label>
              <input type="text" name="Policies" id="Policies" required>

              <label>Số lượng</label>
              <input type="number" name="DemoQuantity" id="DemoQuantity" required>

              <button type="submit" name="action" value="add" class="btn btn-success">Thêm sản phẩm demo</button>
              <button type="submit" name="action" value="edit" class="btn btn-warning">Sửa sản phẩm demo</button>
              <button type="submit" name="action" value="delete" class="btn btn-danger">Xóa sản phẩm demo</button>
              <button type="submit" name="action" value="clear" class="btn btn-secondary">Clear</button>
            </form>
          </div>

          <div class="col-lg-8 col-sm-12">
            <div class="table-container">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Chọn</th>
                    <th>Mã sản phẩm demo</th>
                    <th>Tên sản phẩm demo</th>
                    <th>Giá</th>
                    <th>Giá khuyến mãi</th>
                    <th>Đường dẫn ảnh</th>
                    <th>SKU</th>
                    <th>Màu sắc</th>
                    <th>Kích thước</th>
                    <th>Chất liệu</th>
                    <th>Chính sách</th>
                    <th>Số lượng</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql = "SELECT * FROM `product-demo`";
                  $result = $conn->query($sql);
                  while ($row = $result->fetch_assoc()) {
                    echo '<tr onclick="fillFormProductDemo( \'' . $row['ProductCode'] . '\', \'' . $row['NameProduct'] . '\', ' . $row['Price'] . ', ' . $row['DiscountPrice'] . ', \'' . $row['ImagePath'] . '\', \'' . $row['SKU'] . '\', \'' . $row['Color'] . '\', \'' . $row['Dimensions'] . '\', \'' . $row['Material'] . '\', \'' . $row['Policies'] . '\', ' . $row['Quantity'] . ');">';
                    echo '<td><input type="checkbox" onclick="selectCheckboxProductDemo(this);"></td>';
                    echo '<td>' . $row['ProductCode'] . '</td>';
                    echo '<td>' . $row['NameProduct'] . '</td>';
                    echo '<td>' . $row['Price'] . '</td>';
                    echo '<td>' . $row['DiscountPrice'] . '</td>';
                    echo '<td>' . $row['ImagePath'] . '</td>';
                    echo '<td>' . $row['Quantity'] . '</td>';
                    echo '<td>' . $row['SKU'] . '</td>';
                    echo '<td>' . $row['Color'] . '</td>'; // Cột Màu
                    echo '<td>' . $row['Material'] . '</td>'; // Cột Chất liệu
                 
                    echo '</tr>';
                  }



                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- -->
      <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
        <div class="row">

          <div class="col-lg-12 col-sm-12">
            <!-- Cột hiển thị bảng -->
            <div class="table-container">
              <form method="POST" action="process_contact.php" style="max-width: fit-content;">
                <!-- Đặt action đến file xử lý -->
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Chọn</th> <!-- Thêm tiêu đề cho checkbox -->
                      <th>ID</th>
                      <th>Tên người dùng</th>
                      <th>Email</th>
                      <th>Thông điệp</th>
                      <th>Thời gian gửi</th>
                      <th>Trạng thái</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    // Truy vấn dữ liệu từ bảng contact_form
                    $sql = "SELECT * FROM `contact_form`";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                      echo '<tr>';
                      echo '<td><input type="checkbox" name="contact_ids[]" value="' . $row['id'] . '"></td>'; // Checkbox để chọn dòng
                      echo '<td>' . $row['id'] . '</td>';
                      echo '<td>' . $row['username'] . '</td>';
                      echo '<td>' . $row['email'] . '</td>';
                      echo '<td>' . $row['message'] . '</td>';
                      echo '<td>' . $row['submitted_at'] . '</td>';
                      echo '<td>' . $row['Status'] . '</td>';
                      echo '</tr>';
                    }
                    ?>
                  </tbody>
                </table>
                <button type="submit" name="delete" class="btn btn-danger">Xóa</button> <!-- Nút Xóa -->
                <button type="submit" name="update" class="btn btn-success">Đã xử lý</button> <!-- Nút Cập nhật -->
              </form>
            </div>
          </div>

        </div>
      </div>


    </div>
  </div>
  
      <script type="text/javascript" src="script.js"></script>

</body>
</html>