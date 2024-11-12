const updateTotal = () => {
    let totalPrice = 0;
    document.querySelectorAll('.item-total-price').forEach(item => {
        totalPrice += parseFloat(item.textContent);
    });
    document.querySelector('.total-price').textContent = totalPrice.toFixed(2);
    document.querySelector('.final-total-price').textContent = (totalPrice + 5).toFixed(2);
};

document.querySelectorAll('.quantity-btn').forEach(button => {
    button.addEventListener('click', () => {
        const action = button.getAttribute('data-action');
        const input = button.parentElement.querySelector('.quantity-input');
        let quantity = parseInt(input.value);
        const price = parseFloat(input.getAttribute('data-price'));

        if (action === 'increase') {
            quantity++;
        } else if (action === 'decrease' && quantity > 1) {
            quantity--;
        }

        input.value = quantity;
        button.closest('.main').querySelector('.item-total-price').textContent = (price * quantity).toFixed(2);
        updateTotal();
    });
});

document.querySelectorAll('.close').forEach(closeButton => {
    closeButton.addEventListener('click', () => {
        const productId = closeButton.getAttribute('data-id');

        if (confirm("Are you sure you want to remove this item?")) {
            fetch('remove_from_cart.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: 'ProductCode=' + encodeURIComponent(productId)
            })
            .then(response => response.text())
            .then(data => {
                if (data === 'success') {
                    closeButton.closest('.row.main').remove();
                    alert('Item removed from cart.');
                    updateTotal();
                } else {
                    alert('Error: ' + data);
                }
            })
            .catch(error => console.error('Error:', error));
        }
    });
});

updateTotal();
