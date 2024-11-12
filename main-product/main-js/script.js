

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

function addToCart(NameProduct) {
  fetch('product.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded'
    },
    body: 'NameProduct=' + encodeURIComponent(NameProduct)
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
      showAlert('Sản phẩm đã được thêm vào giỏ hàng.', 'success');
    } else {
      showAlert('Không tìm thấy sản phẩm.', 'danger');
    }
  })
  .catch(error => {
    showAlert('Có lỗi xảy ra khi thêm vào giỏ hàng.', 'danger');
  });
}




  function showAlert(message, type) {
    const alertBox = $('#alertBox');
    alertBox.removeClass('alert-success alert-danger').addClass('alert-' + type);
    alertBox.text(message);
    alertBox.fadeIn().delay(2000).fadeOut(); // Hiện thông báo rồi ẩn sau 2 giây
  }

  function addToCart(ProductCode) {
    fetch('product.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      body: 'NameProduct=' + ProductCode
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        showAlert('Sản phẩm đã được thêm vào giỏ hàng.', 'success');
      } else {
        showAlert('Không tìm thấy sản phẩm.', 'danger');
      }
    })
    .catch(error => {
      showAlert('Có lỗi xảy ra khi thêm vào giỏ hàng.', 'danger');
    });
  }










*/




