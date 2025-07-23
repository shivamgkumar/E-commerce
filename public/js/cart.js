document.addEventListener('DOMContentLoaded', function() {
    // Initialize cart from localStorage
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    
    // Add to cart functionality for product cards on all pages
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('add-to-cart-btn')) {
            const productCard = e.target.closest('.product-card');
            if (productCard) {
                const productId = productCard.dataset.id;
                const productName = productCard.querySelector('.product-title').textContent;
                const productPrice = parseFloat(productCard.querySelector('.current-price').textContent.replace('$', ''));
                const productImage = productCard.querySelector('.product-img img').src;
                
                addToCart(productId, productName, productPrice, productImage, 1);
                showNotification(`${productName} added to cart!`, 'success');
            }
        }
    });
    
    // Initialize cart page if we're on it
    const cartContainer = document.getElementById('cart-items');
    if (cartContainer) {
        renderCartPage();
    }
    
    // Update cart total in checkout page
    const checkoutCartSummary = document.getElementById('checkout-cart-summary');
    if (checkoutCartSummary) {
        renderCheckoutSummary();
    }
});

// Add item to cart
function addToCart(id, name, price, image, quantity) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    
    // Check if item already exists in cart
    const existingItemIndex = cart.findIndex(item => item.id === id);
    
    if (existingItemIndex > -1) {
        // Update quantity if item exists
        cart[existingItemIndex].quantity += quantity;
    } else {
        // Add new item if it doesn't exist
        cart.push({
            id,
            name,
            price,
            image,
            quantity
        });
    }
    
    // Save cart to localStorage
    localStorage.setItem('cart', JSON.stringify(cart));
    
    // Update cart count
    updateCartCount();
}

// Remove item from cart
function removeFromCart(id) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    
    // Filter out the item to remove
    cart = cart.filter(item => item.id !== id);
    
    // Save cart to localStorage
    localStorage.setItem('cart', JSON.stringify(cart));
    
    // Update cart count
    updateCartCount();
    
    // Re-render cart if on cart page
    const cartContainer = document.getElementById('cart-items');
    if (cartContainer) {
        renderCartPage();
    }
    
    // Update checkout summary if on checkout page
    const checkoutCartSummary = document.getElementById('checkout-cart-summary');
    if (checkoutCartSummary) {
        renderCheckoutSummary();
    }
}

// Update item quantity in cart
function updateCartItemQuantity(id, quantity) {
    if (quantity < 1) return;
    
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    
    // Find the item to update
    const itemIndex = cart.findIndex(item => item.id === id);
    
    if (itemIndex > -1) {
        cart[itemIndex].quantity = quantity;
        
        // Save cart to localStorage
        localStorage.setItem('cart', JSON.stringify(cart));
        
        // Update cart count
        updateCartCount();
        
        // Re-render cart if on cart page
        const cartContainer = document.getElementById('cart-items');
        if (cartContainer) {
            renderCartPage();
        }
        
        // Update checkout summary if on checkout page
        const checkoutCartSummary = document.getElementById('checkout-cart-summary');
        if (checkoutCartSummary) {
            renderCheckoutSummary();
        }
    }
}

// Calculate cart total
function calculateCartTotal() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    
    return cart.reduce((total, item) => {
        return total + (item.price * item.quantity);
    }, 0);
}

// Render cart page
function renderCartPage() {
    const cartContainer = document.getElementById('cart-items');
    const cartTotalElement = document.getElementById('cart-total');
    const cartEmptyMessage = document.getElementById('cart-empty');
    const checkoutButton = document.getElementById('checkout-button');
    
    if (!cartContainer) return;
    
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    
    if (cart.length === 0) {
        cartContainer.innerHTML = '';
        cartTotalElement.textContent = '$0.00';
        cartEmptyMessage.style.display = 'block';
        checkoutButton.disabled = true;
        return;
    }
    
    cartEmptyMessage.style.display = 'none';
    checkoutButton.disabled = false;
    
    // Clear previous content
    cartContainer.innerHTML = '';
    
    // Add cart items
    cart.forEach(item => {
        const cartItem = document.createElement('div');
        cartItem.className = 'cart-item';
        cartItem.innerHTML = `
            <div class="cart-item-image">
                <img src="${item.image}" alt="${item.name}">
            </div>
            <div class="cart-item-details">
                <h3 class="cart-item-name">${item.name}</h3>
                <div class="cart-item-price">$${item.price.toFixed(2)}</div>
                <div class="cart-item-quantity">
                    <button class="quantity-btn decrease" data-id="${item.id}">-</button>
                    <input type="number" value="${item.quantity}" min="1" data-id="${item.id}">
                    <button class="quantity-btn increase" data-id="${item.id}">+</button>
                </div>
                <div class="cart-item-subtotal">$${(item.price * item.quantity).toFixed(2)}</div>
                <button class="remove-item" data-id="${item.id}">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        `;
        
        cartContainer.appendChild(cartItem);
    });
    
    // Update cart total
    const total = calculateCartTotal();
    cartTotalElement.textContent = `$${total.toFixed(2)}`;
    
    // Add event listeners to quantity buttons and remove buttons
    const decreaseButtons = document.querySelectorAll('.quantity-btn.decrease');
    const increaseButtons = document.querySelectorAll('.quantity-btn.increase');
    const quantityInputs = document.querySelectorAll('.cart-item-quantity input');
    const removeButtons = document.querySelectorAll('.remove-item');
    
    decreaseButtons.forEach(button => {
        button.addEventListener('click', () => {
            const id = button.dataset.id;
            const item = cart.find(item => item.id === id);
            if (item && item.quantity > 1) {
                updateCartItemQuantity(id, item.quantity - 1);
            }
        });
    });
    
    increaseButtons.forEach(button => {
        button.addEventListener('click', () => {
            const id = button.dataset.id;
            const item = cart.find(item => item.id === id);
            if (item) {
                updateCartItemQuantity(id, item.quantity + 1);
            }
        });
    });
    
    quantityInputs.forEach(input => {
        input.addEventListener('change', () => {
            const id = input.dataset.id;
            const newQuantity = parseInt(input.value, 10);
            if (newQuantity >= 1) {
                updateCartItemQuantity(id, newQuantity);
            } else {
                input.value = 1;
                updateCartItemQuantity(id, 1);
            }
        });
    });
    
    removeButtons.forEach(button => {
        button.addEventListener('click', () => {
            const id = button.dataset.id;
            removeFromCart(id);
            showNotification('Item removed from cart.', 'success');
        });
    });
}

// Render checkout summary
function renderCheckoutSummary() {
    const summaryContainer = document.getElementById('checkout-cart-summary');
    if (!summaryContainer) return;
    
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    const subtotal = calculateCartTotal();
    const shipping = subtotal > 0 ? 10 : 0;
    const total = subtotal + shipping;
    
    const summaryItemsContainer = document.getElementById('summary-items');
    const subtotalElement = document.getElementById('summary-subtotal');
    const shippingElement = document.getElementById('summary-shipping');
    const totalElement = document.getElementById('summary-total');
    
    // Clear previous content
    summaryItemsContainer.innerHTML = '';
    
    // Add cart items
    cart.forEach(item => {
        const summaryItem = document.createElement('div');
        summaryItem.className = 'summary-item';
        summaryItem.innerHTML = `
            <div class="summary-item-name">${item.name} x ${item.quantity}</div>
            <div class="summary-item-price">$${(item.price * item.quantity).toFixed(2)}</div>
        `;
        
        summaryItemsContainer.appendChild(summaryItem);
    });
    
    // Update summary totals
    subtotalElement.textContent = `$${subtotal.toFixed(2)}`;
    shippingElement.textContent = `$${shipping.toFixed(2)}`;
    totalElement.textContent = `$${total.toFixed(2)}`;
}

// Clear cart (used after successful checkout)
function clearCart() {
    localStorage.setItem('cart', JSON.stringify([]));
    updateCartCount();
}
