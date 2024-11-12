<?php




/*session_start(); // Bắt đầu phiên

// Kiểm tra xem người dùng đã đăng nhập và có quyền admin chưa
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || !isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("location: ../LOGIN-REGISTER/index.html"); // Chuyển hướng về trang đăng nhập nếu chưa đăng nhập hoặc không phải admin
    exit; 
}*/


session_start();

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit();
}




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
        // Các biến cho bảng product-info
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
        
    } elseif ($action == "delete") {
      $sql = "DELETE FROM `product-info` WHERE ProductCode='$ProductCode'";
      if (!$conn->query($sql)) {
          echo "Error: " . $conn->error;
      }
    } if ($action == "add_to_demo" && $table == "product_info") {
     $ProductCode = mysqli_real_escape_string($conn, $_POST['ProductCode']);

    // Lấy dữ liệu từ bảng `product-info` theo ProductCode
    $query_select = "SELECT ProductCode, NameProduct, Price, DiscountPrice, ImagePath, SKU, Color, Dimensions, Material, Policies, Quantity 
                     FROM product_info 
                     WHERE ProductCode = '$ProductCode'";

    $result = mysqli_query($conn, $query_select);

    if ($result && mysqli_num_rows($result) > 0) {
        // Lấy dữ liệu của sản phẩm
        $row = mysqli_fetch_assoc($result);

        // Lấy các trường từ dữ liệu của sản phẩm
        $NameProduct = $row['NameProduct'];
        $Price = $row['Price'];
        $DiscountPrice = $row['DiscountPrice'];
        $ImagePath = $row['ImagePath'];
        $SKU = $row['SKU'];
        $Color = $row['Color'];
        $Dimensions = $row['Dimensions'];
        $Material = $row['Material'];
        $Policies = $row['Policies'];
        $Quantity = $row['Quantity'];

        // Thêm sản phẩm vào bảng `product-demo`
        $query_insert = "INSERT INTO product_demo (ProductCode, NameProduct, Price, DiscountPrice, ImagePath, SKU, Color, Dimensions, Material, Policies, Quantity)
                         VALUES ('$ProductCode', '$NameProduct', '$Price', '$DiscountPrice', '$ImagePath', '$SKU', '$Color', '$Dimensions', '$Material', '$Policies', '$Quantity')";

        if (mysqli_query($conn, $query_insert)) {
            // Nếu thành công, chuyển hướng về trang khác hoặc trang hiện tại với thông báo thành công
            header('Location: product_demo.php?status=success');
            exit();
        } else {
            // Nếu có lỗi trong việc thực thi câu lệnh SQL
            echo "Lỗi khi thêm sản phẩm demo: " . mysqli_error($conn);
        }
    } else {
        echo "Sản phẩm không tồn tại.";
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
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản lý sản phẩm</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Hàm để chọn checkbox và điền thông tin vào form
    function selectCheckboxProductInfo(checkbox) {
      const row = checkbox.closest('tr');
      const cells = row.querySelectorAll('td');

      if (checkbox.checked) {
        document.querySelector('input[name="ProductCode"]').value = cells[1].textContent;
        document.querySelector('input[name="NameProduct"]').value = cells[2].textContent;
        document.querySelector('input[name="Price"]').value = cells[3].textContent;
        document.querySelector('input[name="DiscountPrice"]').value = cells[4].textContent;
        document.querySelector('input[name="ImagePath"]').value = cells[5].textContent;
        document.querySelector('input[name="Quantity"]').value = cells[6].textContent;
        document.querySelector('input[name="SKU"]').value = cells[7].textContent;
        document.querySelector('input[name="Color"]').value = cells[8].textContent;
        document.querySelector('input[name="Policies"]').value = cells[9].textContent;
        document.querySelector('input[name="Material"]').value = cells[10].textContent;


        document.querySelector('input[name="ImagePathSP1"]').value = cells[11].textContent;
        document.querySelector('input[name="ImagePathSP2"]').value = cells[12].textContent;
      } else {
        document.querySelector('input[name="ProductCode"]').value = '';
        document.querySelector('input[name="NameProduct"]').value = '';
        document.querySelector('input[name="Price"]').value = '';
        document.querySelector('input[name="DiscountPrice"]').value = '';
        document.querySelector('input[name="ImagePath"]').value = '';
        document.querySelector('input[name="Quantity"]').value = '';
        document.querySelector('input[name="SKU"]').value = '';
        document.querySelector('input[name="Color"]').value = '';
        document.querySelector('input[name="Material"]').value = '';
        document.querySelector('input[name="Policies"]').value = '';

        document.querySelector('input[name="ImagePathSP1"]').value = '';
        document.querySelector('input[name="ImagePathSP2"]').value = '';
      }
    }



     function selectCheckboxProductDemo(checkbox) {
    // Lấy dòng chứa checkbox
    var row = checkbox.closest('tr');

    // Lấy giá trị từ các cột trong dòng
    var productCode = row.cells[1].textContent.trim();  // Mã sản phẩm demo
    var nameProduct = row.cells[2].textContent.trim();  // Tên sản phẩm demo
    var price = row.cells[3].textContent.trim();  // Giá
    var discountPrice = row.cells[4].textContent.trim();  // Giá khuyến mãi
    var imagePath = row.cells[5].textContent.trim();  // Đường dẫn ảnh
    var quantity = row.cells[6].textContent.trim();  // Số lượng
    var sku = row.cells[7].textContent.trim();  // SKU
    var color = row.cells[8].textContent.trim();  // Màu
    var material = row.cells[9].textContent.trim();  // Chất liệu

    // Điền dữ liệu vào các input tương ứng
    document.getElementById('ProductCode').value = productCode;
    document.getElementById('NameProduct').value = nameProduct;
    document.getElementById('Price').value = price;
    document.getElementById('DiscountPrice').value = discountPrice;
    document.getElementById('ImagePath').value = imagePath;
    document.getElementById('Quantity').value = quantity;
    document.getElementById('SKU').value = sku;
    document.getElementById('Color').value = color;
    document.getElementById('Material').value = material;
}


  </script>
  <style type="text/css">
    /* Cải tiến cho các input */
input[type="text"], input[type="number"], input[type="email"] {
  width: 100%;
  padding: 10px;
  margin-bottom: 15px;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-size: 16px;
  box-sizing: border-box;
  transition: all 0.3s ease-in-out;
}

/* Cải tiến cho các input khi focus */
input[type="text"]:focus, input[type="number"]:focus, input[type="email"]:focus {
  border-color: #007bff;
  outline: none;
  box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

/* Cải tiến cho label */
label {
  display: block;
  font-size: 14px;
  margin-bottom: 5px;
  color: #333;
  font-weight: bold;
}

/* Cải tiến cho form container */
form {
  padding: 20px;
  background-color: #f9f9f9;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  max-width: 600px;
  margin: 0 auto;
}

/* Các nút trong form */
button {
  width: 100%;
  padding: 10px;
  margin-top: 10px;
  border: none;
  border-radius: 5px;
  font-size: 16px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

button.btn-success {
  background-color: #28a745;
  color: white;
}

button.btn-success:hover {
  background-color: #218838;
}

button.btn-warning {
  background-color: #ffc107;
  color: white;
}

button.btn-warning:hover {
  background-color: #e0a800;
}

button.btn-danger {
  background-color: #dc3545;
  color: white;
}

button.btn-danger:hover {
  background-color: #c82333;
}

/* Thêm padding cho các cột trong bảng */
.table-container td {
  padding: 10px;
}

/* Cải tiến cho bảng */
.table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
}

.table th, .table td {
  padding: 12px;
  text-align: left;
}

.table th {
  background-color: #f8f9fa;
  color: #495057;
}

.table-striped tbody tr:nth-of-type(odd) {
  background-color: #f9f9f9;
}

.table-striped tbody tr:nth-of-type(even) {
  background-color: #ffffff;
}

.table-container {
  max-height: 400px;
  overflow-y: auto;
}

/* Style cho các checkbox */
input[type="checkbox"] {
  transform: scale(1.2);
  margin: 0;
  cursor: pointer;
}

  </style>
</head>

<body>
  <div class="container-fluid p-5 bg-primary text-white text-center">
    <h1>Quản lý sản phẩm</h1>
    <p>Quản lý thông tin sản phẩm dễ dàng!</p>
    <a href="logout.php">Đăng xuất</a>
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
              <input type="text" name="ProductCode" required><br>

              <label>Tên sản phẩm</label>
              <input type="text" name="NameProduct" required><br>

              <label>Giá</label>
              <input type="number" name="Price" required><br>

              <label>Giá khuyến mãi</label>
              <input type="number" name="DiscountPrice" required><br>

              <label>Đường dẫn ảnh</label>
              <input type="text" name="ImagePath" required><br>

              <label>Số lượng</label>
              <input type="number" name="Quantity" required><br>

              <label>SKU</label>
              <input type="text" name="SKU" required><br>

              <label>Màu sắc</label>
              <input type="text" name="Color" required><br>

              <label>Chất liệu</label>
              <input type="text" name="Material" required><br>


              <label>bảo hành </label>
              <input type="text" name="Policies" required><br>

              <label>Đường dẫn ảnh phụ 1</label>
              <input type="text" name="ImagePathSP1"><br>

              <label>Đường dẫn ảnh phụ 2</label>
              <input type="text" name="ImagePathSP2"><br>

              <button type="submit" name="action" value="add" class="btn btn-success">Thêm sản phẩm</button>
              <button type="submit" name="action" value="edit" class="btn btn-warning">Sửa sản phẩm</button>
              <button type="submit" name="action" value="delete" class="btn btn-danger">Xóa sản phẩm</button>
              <button type="submit" name="action" value="add_to_demo" class="btn btn-primary">Thêm vào sản phẩm demo</button>
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
                    <th>bảo hành</th>
                    <th>Đường dẫn ảnh phụ 1</th>
                    <th>Đường dẫn ảnh phụ 2</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql = "SELECT * FROM `product-info`";
                  $result = $conn->query($sql);
                  while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td><input type="checkbox" onclick="selectCheckboxProductInfo(this);"></td>';
                    echo '<td>' . $row['ProductCode'] . '</td>';
                    echo '<td>' . $row['NameProduct'] . '</td>';
                    echo '<td>' . $row['Price'] . '</td>';
                    echo '<td>' . $row['DiscountPrice'] . '</td>';
                    echo '<td>' . $row['ImagePath'] . '</td>';
                    echo '<td>' . $row['Quantity'] . '</td>';
                    echo '<td>' . $row['SKU'] . '</td>';
                    echo '<td>' . $row['Color'] . '</td>';
                    echo '<td>' . $row['Material'] . '</td>';
                    echo '<td>' . $row['Policies'] . '</td>';
                    echo '<td>' . $row['ImagePathSP1'] . '</td>';
                    echo '<td>' . $row['ImagePathSP2'] . '</td>';
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
     <!-- Tab cho product-demo -->
<div class="tab-pane fade" id="product-demo" role="tabpanel" aria-labelledby="product-demo-tab">
  <div class="row">
    <div class="col-lg-4 col-sm-8">
      <form action="index.php" method="post">
        <input type="hidden" name="table" value="product_demo">
        
        <label>Mã sản phẩm demo</label>
        <input type="text" id="ProductCode" name="ProductCode" required> <br>

        <label>Tên sản phẩm demo</label>
        <input type="text" id="NameProduct" name="NameProduct" required><br>

        <label>Giá</label>
        <input type="number" id="Price" name="Price" required><br>

        <label>Giá khuyến mãi</label>
        <input type="number" id="DiscountPrice" name="DiscountPrice"><br>

        <label>Đường dẫn ảnh</label>
        <input type="text" id="ImagePath" name="ImagePath" required><br>

        <label>Số lượng</label>
        <input type="number" id="Quantity" name="Quantity" required><br>

        <label>SKU</label>
        <input type="text" id="SKU" name="SKU" required><br>

        <label>Màu sắc</label>
        <input type="text" id="Color" name="Color"><br>

        <label>Chất liệu</label>
        <input type="text" id="Material" name="Material"><br>

        <button type="submit" name="action" value="add" class="btn btn-success">Thêm sản phẩm demo</button>
        <button type="submit" name="action" value="edit" class="btn btn-warning">Sửa sản phẩm demo</button>
        <button type="submit" name="action" value="delete" class="btn btn-danger">Xóa sản phẩm demo</button>
      </form>
    </div>

    <div class="col-lg-8 col-sm-12">
      <div class="table-container">
        <table id="product-demo-table" class="table table-striped">
          <thead>
            <tr>
              <th>Chọn</th>
              <th>Mã sản phẩm demo</th>
              <th>Tên sản phẩm demo</th>
              <th>Giá</th>
              <th>Giá khuyến mãi</th>
              <th>Đường dẫn ảnh</th>
              <th>Số lượng</th>
              <th>SKU</th>
              <th>Màu</th>
              <th>Chất liệu</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // Lấy thông tin sản phẩm từ bảng `product-demo`
            $sql = "SELECT * FROM `product-demo`";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
              echo '<tr>';
              echo '<td><input type="checkbox" onclick="selectCheckboxProductDemo(this);"></td>';
              echo '<td>' . $row['ProductCode'] . '</td>';
              echo '<td>' . $row['NameProduct'] . '</td>';
              echo '<td>' . $row['Price'] . '</td>';
              echo '<td>' . $row['DiscountPrice'] . '</td>';
              echo '<td>' . $row['ImagePath'] . '</td>';
              echo '<td>' . $row['Quantity'] . '</td>';
              echo '<td>' . $row['SKU'] . '</td>';
              echo '<td>' . $row['Color'] . '</td>';
              echo '<td>' . $row['Material'] . '</td>';
              echo '</tr>';
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>



      <!-- Tab cho contact -->
      < <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
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
</body>

</html>
