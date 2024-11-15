document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('searchInput');
    const searchBySelect = document.getElementById('searchBy');
    const searchButton = document.getElementById('searchButton');
    const resultContainer = document.getElementById('productList');

    function renderProducts(products) {
        resultContainer.innerHTML = '';

        if (products.length > 0) {
            products.forEach(product => {
                resultContainer.innerHTML += `
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                        <div class="card product-card h-100">
                            <img src="${product.ImagePath}" class="card-img-top" alt="${product.NameProduct}">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">${product.NameProduct}</h5>
                                <p class="card-text">Price: ${product.Price} VND</p>
                                <p class="card-text">Discount: ${product.DiscountPrice} VND</p>
                                <p class="card-text">SKU: ${product.SKU}</p>
                                <p class="card-text">Quantity: ${product.Quantity}</p>
                                <a href="#" class="btn btn-primary mt-auto">Add to Cart</a>
                            </div>
                        </div>
                    </div>`;
            });
        } else {
            resultContainer.innerHTML = `<div class="col-12"><p>No products found.</p></div>`;
        }
    }

    searchButton.addEventListener('click', function () {
        const searchTerm = searchInput.value.trim();
        const searchBy = searchBySelect.value;

        // Nếu chọn "Tất cả", bỏ qua từ khóa tìm kiếm
        const query = searchBy === 'all' ? `filter.php?searchBy=all` : `filter.php?search=${searchTerm}&searchBy=${searchBy}`;

        fetch(query)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(products => {
                if (products.error) {
                    console.error('Error from server:', products.error);
                    alert('Server error: ' + products.error);
                } else {
                    renderProducts(products);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred. Please try again later.');
            });
    });
});
