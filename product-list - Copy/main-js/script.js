

// Function to render rateline based on stars

 


/*
 /*banner
 let currentBannerIndex = 0;
 const banners = document.querySelectorAll('.banner');

 function showBanner(index) {
   if (index < 0) {
     currentBannerIndex = banners.length - 1;
   } else if (index >= banners.length) {
     currentBannerIndex = 0;
   }

   banners.forEach((banner, i) => {
     if (i === currentBannerIndex) {
       banner.style.display = 'block';
     } else {
       banner.style.display = 'none';
     }
   });
 }

 function nextBanner() {
   currentBannerIndex++;
   showBanner(currentBannerIndex);
 }

 function prevBanner() {
   currentBannerIndex--;
   showBanner(currentBannerIndex);
 }

 // Auto change banner every 3 seconds
 setInterval(nextBanner, 3000);

 // Show the first banner initially
 showBanner(currentBannerIndex);*/
 /*function showAlert(message, type) {
      const alertBox = $('#alertBox');
      alertBox.removeClass('alert-success alert-danger').addClass('alert-' + type);
      alertBox.text(message);
      alertBox.fadeIn().delay(2000).fadeOut(); // Hiện thông báo rồi ẩn sau 2 giây
    }
*/

  function addToCart(ProductCode) {
    $.ajax({
      url: '../add_to_cart.php',
      type: 'POST',
      data: { ProductCode: ProductCode },
      success: function(response) {
        // Hiển thị thông báo sau khi thêm vào giỏ hàng
        $('#alertBox').text(response).fadeIn().delay(2000).fadeOut();
      }
    });
  }

  function buyNow(ProductCode) {
    $.ajax({
      url: '../add_to_cart.php',
      type: 'POST',
      data: { ProductCode: ProductCode },
      success: function(response) {
        // Chuyển đến trang giỏ hàng sau khi thêm vào giỏ hàng
        window.location.href = '../product-cart/index.php';
      }
    });
  }












