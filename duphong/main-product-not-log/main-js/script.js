// Dummy product data (you can replace it with your actual data)
var products = [
  { //category:pants, shirt, shoes,hats
    name: "Coolmate Hat", 
    category: "Hats", 
    price: "100.000 vnd",
    salePrice: "80.000 vnd", 
    imagePath: "img/mu.jpg",
        rating: { 
      average: 4.5, 
      totalReviews: 200 
    },
    rateline: { 
      stars: [true, true, true, true, false], 
      totalRatings: 200 
    }
 } ,
  { 
    name: "Coolmate Shirt", 
    category: "Shirts", 
    price: "200.000 vnd",
    salePrice: "80.000 vnd", 
    imagePath: "img/ao.jpg",

    rating: { 
      average: 4.2, 
      totalReviews: 150 
    },
    rateline: { 
      stars: [true, true, true, false, false], 
      totalRatings: 150 
    }
  },
  { 
    name: "Coolmate Shoe", 
    category: "Shoes", 
    price: "200.000 vnd",
    salePrice: "80.000 vnd", 
    imagePath: "img/giay.jpg",

    rating: { 
      average: 2.9, 
      totalReviews: 1590 
    },
    rateline: { 
      stars: [true, true, true, false, false], 
      totalRatings: 150 
    }
  },
  
  
];

// Function to render products
function renderProducts(products) {
  var productList = $('#product-list');
  productList.empty();

  products.forEach(function (product) {
    productList.append(`
    <div class="col-lg-3 col-md-4 col-sm-6  ">
      <div class=PRspace>
        <div class="product-box">
          <div class="product">
            <img src="${product.imagePath}" class="img-fluid" alt="Product Image">
            <div class="product-content">
              <h2 class="product-title">${product.name}</h2>
              <div class="rateLine">   
                <div class="product-rating">
                  ${renderRateline(product.rateline.stars)} <!-- Thay đổi thành hiển thị rateline -->
                </div>
                <div>  
                  <span>${product.rateline.totalRatings} reviews</span> <!-- Hiển thị số lượng đánh giá -->
                </div>
              </div>
              <div class="product-price">
                <div class="ori-price"><p>${product.price}</p></div>
                <div class="sale-price"><p>${product.salePrice}</p></div>
              </div>
             
              <div class="purchase-info">
              
              <button type="button" class="btn" > Add To Cart <i class="fa-solid fa-cart-shopping"></i></button>
              
              <button type="button" class="btn"> Buy It Now</button>
               </div>   
              
              
            </div>
          </div>
        </div>
      </div>
    </div>
    `);
  });
}

// Function to render rateline based on stars
function renderRateline(stars) {
  let ratelineHTML = '';
  stars.forEach(star => {
    if (star) {
      ratelineHTML += '<i class="fa fa-star"></i>';
    } else {
      ratelineHTML += '<i class="far fa-star"></i>';
    }
  });
  return ratelineHTML;
}

// Initial rendering
renderProducts(products);
 

 // Event listener for color buttons
 $('.btn-color').click(function () {
   var selectedColor = $(this).data('color');
   // Handle color selection
 });

 // Function to render pagination
 function renderPagination(totalPages) {
   var pagination = $('#pagination');
   pagination.empty();

   for (var i = 1; i <= totalPages; i++) {
     pagination.append(`<li class="page-item"><a class="page-link" href="#">${i}</a></li>`);
   }
 }

 // Function to handle category filter
 $('#category-filter').change(function () {
   var selectedCategory = $(this).val();
   var filteredProducts = products.filter(function (product) {
     return selectedCategory === '' || product.category === selectedCategory;
   });
   renderProducts(filteredProducts);
 });

 // Initial rendering
 renderProducts(products);
 renderPagination(5); // Assuming there are 5 pages
 /*banner*/
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
 showBanner(currentBannerIndex);







