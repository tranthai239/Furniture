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
 <link href="cart-css/style.css" rel="stylesheet">
 <style type="text/css">
        body {
            
            background-color: #f1f3f7;
        }

        .card {
            margin-bottom: 24px;
            -webkit-box-shadow: 0 2px 3px #e4e8f0;
            box-shadow: 0 2px 3px #e4e8f0;
        }

        .card {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid #eff0f2;
            border-radius: 1rem;
        }

        .activity-checkout {
            list-style: none
        }

        .activity-checkout .checkout-icon {
            position: absolute;
            top: -4px;
            left: -24px
        }

        .activity-checkout .checkout-item {
            position: relative;
            padding-bottom: 24px;
            padding-left: 35px;
            border-left: 2px solid #f5f6f8
        }

        .activity-checkout .checkout-item:first-child {
            border-color: #3b76e1
        }

        .activity-checkout .checkout-item:first-child:after {
            background-color: #3b76e1
        }

        .activity-checkout .checkout-item:last-child {
            border-color: transparent
        }

        .activity-checkout .checkout-item.crypto-activity {
            margin-left: 50px
        }

        .activity-checkout .checkout-item .crypto-date {
            position: absolute;
            top: 3px;
            left: -65px
        }



        .avatar-xs {
            height: 1rem;
            width: 1rem
        }

        .avatar-sm {
            height: 2rem;
            width: 2rem
        }

        .avatar {
            height: 3rem;
            width: 3rem
        }

        .avatar-md {
            height: 4rem;
            width: 4rem
        }

        .avatar-lg {
            height: 5rem;
            width: 5rem
        }

        .avatar-xl {
            height: 6rem;
            width: 6rem
        }

        .avatar-title {
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            background-color: #3b76e1;
            color: #fff;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            font-weight: 500;
            height: 100%;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            width: 100%
        }

        .avatar-group {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            padding-left: 8px
        }

        .avatar-group .avatar-group-item {
            margin-left: -8px;
            border: 2px solid #fff;
            border-radius: 50%;
            -webkit-transition: all .2s;
            transition: all .2s
        }

        .avatar-group .avatar-group-item:hover {
            position: relative;
            -webkit-transform: translateY(-2px);
            transform: translateY(-2px)
        }

        .card-radio {
            background-color: #fff;
            border: 2px solid #eff0f2;
            border-radius: .75rem;
            padding: .5rem;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            display: block
        }

        .card-radio:hover {
            cursor: pointer
        }

        .card-radio-label {
            display: block
        }

        .edit-btn {
            width: 35px;
            height: 35px;
            line-height: 40px;
            text-align: center;
            position: absolute;
            right: 25px;
            margin-top: -50px
        }

        .card-radio-input {
            display: none
        }

        .card-radio-input:checked+.card-radio {
            border-color: #3b76e1 !important
        }


        .font-size-16 {
            font-size: 16px !important;
        }

        .text-truncate {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        a {
            text-decoration: none !important;
        }


        .form-control {
            display: block;
            width: 100%;
            padding: 0.47rem 0.75rem;
            font-size: .875rem;
            font-weight: 400;
            line-height: 1.5;
            color: #545965;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #e2e5e8;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-radius: 0.75rem;
            -webkit-transition: border-color .15s ease-in-out, -webkit-box-shadow .15s ease-in-out;
            transition: border-color .15s ease-in-out, -webkit-box-shadow .15s ease-in-out;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out, -webkit-box-shadow .15s ease-in-out;
        }

        .edit-btn {
            width: 35px;
            height: 35px;
            line-height: 40px;
            text-align: center;
            position: absolute;
            right: 25px;
            margin-top: -50px;
        }

        .ribbon {
            position: absolute;
            right: -26px;
            top: 20px;
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
            color: #fff;
            font-size: 13px;
            font-weight: 500;
            padding: 1px 22px;
            font-size: 13px;
            font-weight: 500
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
                Account
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="../login&signup/logsign.html">Login</a>
                <a class="dropdown-item" href="../login&signup/logsign.html">Sign Up</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <main>
                   
     <div class="container">

        <div class="row">
            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body">
                        <ol class="activity-checkout mb-0 px-4 mt-3">
                            <li class="checkout-item">
                                <div class="avatar checkout-icon p-1">
                                    <div class="avatar-title rounded-circle bg-primary">
                                        <i class="bx bxs-receipt text-white font-size-20"></i>
                                    </div>
                                </div>
                                <div class="feed-item-list">
                                    <div>
                                        <h5 class="font-size-16 mb-1">Billing Info</h5>
                                        <p class="text-muted text-truncate mb-4">điền thông tin nhận hàng</p>
                                        <div class="mb-3">
                                            <form>
                                                <div>
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="mb-3">
                                                                <label class="form-label"
                                                                    for="billing-name">Name</label>
                                                                <input type="text" class="form-control"
                                                                    id="billing-name" placeholder="Enter name">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="mb-3">
                                                                <label class="form-label"
                                                                    for="billing-email-address">Email Address</label>
                                                                <input type="email" class="form-control"
                                                                    id="billing-email-address"
                                                                    placeholder="Enter email">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="mb-3">
                                                                <label class="form-label"
                                                                    for="billing-phone">Phone</label>
                                                                <input type="text" class="form-control"
                                                                    id="billing-phone" placeholder="Enter Phone no.">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label" for="billing-address">Address</label>
                                                        <textarea class="form-control" id="billing-address" rows="3"
                                                            placeholder="Enter full address"></textarea>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="mb-4 mb-lg-0">
                                                                <label class="form-label">Country</label>
                                                                <select class="form-control form-select"
                                                                    title="Country">
                                                                    <option value="0">Select Country</option>
                                                                    <option value="AF">VietNam</option>
                                                                    <option value="AL">China</option>
                                                                    <option value="DZ">ThaiLand</option>
                                                                    <option value="AS">Campuchia</option>
                                                                    <option value="AD">Indonesia</option>
                                                                    <option value="AO">Japan</option>
                                                                    <option value="AI">India</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4">
                                                            <div class="mb-4 mb-lg-0">
                                                                <label class="form-label"
                                                                    for="billing-city">City</label>
                                                                <input type="text" class="form-control"
                                                                    id="billing-city" placeholder="Enter City">
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                </div>
                    </div>
                    </li>
                   
                    <li class="checkout-item">
                        <div class="avatar checkout-icon p-1">
                            <div class="avatar-title rounded-circle bg-primary">
                                <i class="bx bxs-wallet-alt text-white font-size-20"></i>
                            </div>
                        </div>
                        <div class="feed-item-list">
                          
                            <div>
                                <h5 class="font-size-14 mb-3">Payment method :</h5>
                                <div class="row">
                                    <div class="col-lg-3 col-sm-6">
                                        <div data-bs-toggle="collapse">
                                            <label class="card-radio-label">
                                                <input type="radio" name="pay-method" id="pay-methodoption1"
                                                    class="card-radio-input">
                                                <span class="card-radio py-3 text-center text-truncate">
                                                    <i class="bx bx-credit-card d-block h2 mb-3"></i>
                                                    Credit / Debit Card
                                                </span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-sm-6">
                                        <div>
                                            <label class="card-radio-label">
                                                <input type="radio" name="pay-method" id="pay-methodoption2"
                                                    class="card-radio-input">
                                                <span class="card-radio py-3 text-center text-truncate">
                                                    <i class="bx bxl-paypal d-block h2 mb-3"></i>
                                                    Paypal
                                                </span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-sm-6">
                                        <div>
                                            <label class="card-radio-label">
                                                <input type="radio" name="pay-method" id="pay-methodoption3"
                                                    class="card-radio-input" checked="">

                                                <span class="card-radio py-3 text-center text-truncate">
                                                    <i class="bx bx-money d-block h2 mb-3"></i>
                                                    <span>Cash on Delivery</span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </li>
                    </ol>
                </div>
            </div>

            <div class="row my-4">
                <div class="col">
                    <a href="../product-list" class="btn btn-link text-muted">
                        <i class="mdi mdi-arrow-left me-1"></i> Continue Shopping </a>
                </div> <!-- end col -->
                <div class="col">
                    <div class="text-end mt-2 mt-sm-0">
                        <a href="#" class="btn btn-success">
                            <i class="mdi mdi-cart-outline me-1"></i> Procced </a>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row-->
        </div>
        <div class="col-xl-4">
    <div class="card checkout-order-summary">
        <div class="card-body">
            <div class="p-3 bg-light mb-3">
                <h5 class="font-size-16 mb-0">Order Summary <span class="float-end ms-2">#MN0124</span></h5>
            </div>
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
                        include 'db_connection.php';

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

</div>

<!-- Link JS Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



</body>
</html>
