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
 <style type="text/css"></style>
 
</head>
<body>

<div class="wrapper" style="width: 100%;">

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

  <main style=" margin: 0 auto;
    width: 100%;
    width: max-content;
    min-width: 400px;
    margin-top: 40px;
    margin-bottom: 80px;">
                   
   <div class="contact-form">
        <h2>Liên hệ với chúng tôi</h2>
        <form action="contact-handler.php" method="POST">
            <label for="username">Tên người dùng:</label>
            <input type="text" id="username" name="username" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Lý do/Y kiến liên quan:</label>
            <textarea id="message" name="message" rows="4" required></textarea>

            <button type="submit" name="submit">Gửi</button>
        </form>
    </div>
      
    
  </main>

  <footer style="
    width: -webkit-fill-available;
   
    bottom: 0%;
">
    <!-- Footer content here -->
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
