window.addEventListener("DOMContentLoaded", () => {

    function calcuTotalPrice() {
        const productPrice = document.getElementById("productPrice").value;
        const quantityInput = document.getElementById('quantity');
        const quantity = parseInt(quantityInput.value) || 0;
        const totalPriceQuantity = productPrice * quantity;
        document.getElementById("totalprice").value = totalPriceQuantity.toFixed(2);
    }

    function calculateChange() {
        const totalPrice = parseFloat(document.getElementById("totalprice").value) || 0;
        const payment = parseFloat(document.getElementById("payment").value) || 0;
        const calc = payment - totalPrice;
        document.getElementById("change").value = calc.toFixed(2);
    }

    document.getElementById("totalprice").addEventListener("input", calculateChange);
    document.getElementById("payment").addEventListener("input", calculateChange);
    document.getElementById("quantity").addEventListener("input", calcuTotalPrice);

    // Click event for quantity increment
    document.getElementById("quantity-increment").addEventListener("click", function () {
        document.getElementById("quantity").value = parseInt(document.getElementById("quantity").value) + 1;
        calcuTotalPrice();
    });

    // Click event for quantity decrement
    document.getElementById("quantity-decrement").addEventListener("click", function () {
        const currentQuantity = parseInt(document.getElementById("quantity").value);
        document.getElementById("quantity").value = currentQuantity > 1 ? currentQuantity - 1 : 1;
        calcuTotalPrice();
    });
});
