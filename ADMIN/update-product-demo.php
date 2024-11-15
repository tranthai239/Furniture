

<!-- Your existing HTML structure continues here -->


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản lý sản phẩm</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  
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
      border:1px solid black;

}
  th{
    border:1px solid black;
}
td{
    border:1px solid black;
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
    .nav-link {
      padding: 10px 20px;
      font-weight: bold;
      text-transform: uppercase;
      color: #333;
    }

    .nav-link:hover {
      color: #007bff;
    }
  </style>
</head>

<body>

 


    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Quản lý sản phẩm</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="update-product-demo.php">Cập nhật sản phẩm</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact-form.php">Liên hệ</a>
          </li>
             <li class="nav-item">
            <a class="nav-link" href="logout.php">Đăng xuất</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
   

  <div class="container mt-5">
    <!-- Tabs -->
  
     

               <h2>Quản lý trạng thái sản phẩm</h2>
  <form method="post" action="">
    <label for="product_code">Mã sản phẩm:</label>
    <input type="text" id="product_code" name="product_code" required>
    <button type="submit" name="action" value="active">Active</button>
    <button type="submit" name="action" value="hidden">Hidden</button>
  </form>
  <br>
  <h2>Danh sách sản phẩm</h2>
  <table border="1">
    <tr>
      <th>Mã sản phẩm</th>
      <th>Tên sản phẩm</th>
      <th>Giá</th>
      <th>Giảm giá</th>
      <th>Hình ảnh</th>
      <th>SKU</th>
      <th>Màu sắc</th>
      <th>Kích thước</th>
      <th>Chất liệu</th>
      <th>Chính sách</th>
      <th>Hình SP1</th>
      <th>Hình SP2</th>
      <th>Số lượng</th>
      <th>Trạng thái</th>
    </tr>
    
    <?php
    // Kết nối tới cơ sở dữ liệu
    $conn = new mysqli("localhost", "root", "", "web");
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    // Kiểm tra nếu form được gửi
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $productCode = $_POST["product_code"];
        $action = $_POST["action"];
        $newStatus = ($action == "active") ? "demo-active" : "demo-inactive";

        // Cập nhật trạng thái `STA`
        $updateQuery = "UPDATE `product-info-test` SET `STA` = '$newStatus' WHERE `ProductCode` = '$productCode'";
        $conn->query($updateQuery);
    }

    // Truy vấn và hiển thị dữ liệu từ bảng `product-info`
    $query = "SELECT * FROM `product-info-test`";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
              <td>{$row['ProductCode']}</td>
              <td>{$row['NameProduct']}</td>
              <td>{$row['Price']}</td>
              <td>{$row['DiscountPrice']}</td>
              <td>{$row['ImagePath']}</td>
              <td>{$row['SKU']}</td>
              <td>{$row['Color']}</td>
              <td>{$row['Dimensions']}</td>
              <td>{$row['Material']}</td>
              <td>{$row['Policies']}</td>
              <td>{$row['ImagePathSP1']}</td>

              <td>{$row['ImagePathSP2']}</td>

              <td>{$row['Quantity']}</td>
              <td>{$row['STA']}</td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='14'>Không có sản phẩm nào.</td></tr>";
    }

    $conn->close();
    ?>
  </table>


    
   
  </div>
</body>

</html>





