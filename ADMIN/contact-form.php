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
    input[type="text"], input[type="number"], input[type="email"], input[type="password"] {
      width: 100%;
      padding: 12px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 16px;
      box-sizing: border-box;
      transition: all 0.3s ease-in-out;
    }

    /* Cải tiến cho các input khi focus */
    input[type="text"]:focus, input[type="number"]:focus, input[type="email"]:focus, input[type="password"]:focus {
      border-color: #007bff;
      outline: none;
      box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    /* Cải tiến cho label */
    label {
      display: block;
      font-size: 14px;
      margin-bottom: 8px;
      color: #333;
      font-weight: bold;
      text-transform: uppercase;
    }

    /* Cải tiến cho form container */
    form {
      padding: 30px;
      background-color: #f9f9f9;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      max-width: 700px;
      margin: 20px auto;
    }

    /* Các nút trong form */
    button {
      width: 100%;
      padding: 12px;
      margin-top: 15px;
      border: none;
      border-radius: 8px;
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

    /* Cải tiến cho bảng */
    .table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
      font-size: 16px;
          border:1px solid black;


    }
    th{
    border:1px solid black;
}
td{
    border:1px solid black;
}

    .table th, .table td {
      padding: 15px;
      text-align: left;
            border: 1px solid #ddd;

    }

    .table th {
      background-color: #f8f9fa;
      color: #495057;
    }

    table, th, td {
      border: 1px solid #ddd;
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

    /* Cải tiến cho checkbox */
    input[type="checkbox"] {
      transform: scale(1.2);
      margin: 0;
      cursor: pointer;
    }

    /* Thêm style cho các button của tab */
    .nav-link {
      padding: 10px 20px;
      font-weight: bold;
      text-transform: uppercase;
      color: #333;
    }

    .nav-link:hover {
      color: #007bff;
    }

    /* Thêm hiệu ứng hover cho form */
    form:hover {
      box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
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
    <?php include('contact.php'); ?>  <!-- Gọi mã PHP ở trên để hiển thị dữ liệu -->
  </div>
</body>

</html>
