document.addEventListener('DOMContentLoaded', function() {
    let cart = JSON.parse(localStorage.getItem('cart')) || {};

    window.addToCart = function(itemId, itemName, itemImage) {
        if (cart[itemId]) {
            cart[itemId].quantity += 1;
        } else {
            cart[itemId] = {
                name: itemName,
                image: itemImage,
                quantity: 1
            };
        }

        localStorage.setItem('cart', JSON.stringify(cart));
        alert(`${itemName} Telah ditambahkan ke keranjang. Jumlah: ${cart[itemId].quantity}`);
        updateCartCount();
    }

    window.removeFromCart = function(itemId) {
        if (cart[itemId]) {
            if (confirm(`Apakah Anda yakin ingin menghapus ${cart[itemId].name} dari keranjang?`)) {
                delete cart[itemId];
                localStorage.setItem('cart', JSON.stringify(cart));
                populateCartItems();
                updateCartCount();
            }
        }
    }

    function updateCartCount() {
        const cartCountElement = document.getElementById('cart-count');
        const totalItems = Object.values(cart).reduce((total, item) => total + item.quantity, 0);
        if (cartCountElement) {
            cartCountElement.textContent = totalItems;
        }
    }

    function populateCartItems() {
        const cartItems = document.getElementById('cart-items');
        if (cartItems) {
            cartItems.innerHTML = '';
            Object.keys(cart).forEach(itemId => {
                const item = cart[itemId];
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td><img src="${item.image}" alt="${item.name}" style="height: 50px; width: 50px; object-fit: cover;"></td>
                    <td>${item.name}</td>
                    <td>${item.quantity}</td>
                    <td><button class="btn btn-danger" onclick="removeFromCart('${itemId}')">Hapus</button></td>
                `;
                cartItems.appendChild(row);
            });
        }
    }

    updateCartCount();

    populateCartItems();
});