let catalogContainers = document.querySelectorAll('.slider-block');

function addToCart(e) {
    if (!e.target) {
        return;
    }
    const button = e.target.closest('.add-to-cart-btn');
    if (button) {
        e.preventDefault();
        const url = button.parentElement.dataset.url;
        const productImage = button.closest('.catalog-item').querySelector('.image img');
        app.addToCart(url, productImage);
    }

}

catalogContainers.forEach((el) => {
    el.addEventListener('click', addToCart);
});