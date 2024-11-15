

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
    $.ajax({
      url: 'add_to_cart.php',
      type: 'POST',
      data: { ProductCode: ProductCode },
      success: function(response) {
        // Chuyển đến trang giỏ hàng sau khi thêm vào giỏ hàng
        window.location.href = '../product-cart/index.php';
      }
    });
  }


      function viewDetail(productCode) {
        window.location.href = "product-detail.php?ProductCode=" + ProductCode;
      }


    










 function toggleMenu() {
            var menu = document.getElementById("floatMenu");
            if (menu.style.display === "none" || menu.style.display === "") {
                menu.style.display = "block";
            } else {
                menu.style.display = "none";
            }
        }





