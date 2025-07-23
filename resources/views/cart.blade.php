<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart - ShopEase</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    
    <style>
        /* Additional CSS for cart page */
        .cart-section {
            padding: 60px 0;
        }
        
        .cart-wrapper {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 30px;
        }
        
        .cart-items-container {
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        
        .cart-header {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 0.5fr;
            padding-bottom: 15px;
            border-bottom: 1px solid #e9ecef;
            font-weight: 600;
        }
        
        .cart-header-product {
            grid-column: 1 / 2;
        }
        
        .cart-header-price {
            grid-column: 2 / 3;
            text-align: center;
        }
        
        .cart-header-quantity {
            grid-column: 3 / 4;
            text-align: center;
        }
        
        .cart-header-subtotal {
            grid-column: 4 / 5;
            text-align: right;
        }
        
        .cart-item {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 0.5fr;
            align-items: center;
            padding: 20px 0;
            border-bottom: 1px solid #e9ecef;
        }
        
        .cart-item-details {
            grid-column: 1 / 2;
            display: flex;
            align-items: center;
        }
        
        .cart-item-image {
            width: 80px;
            height: 80px;
            margin-right: 15px;
            border-radius: 5px;
            overflow: hidden;
        }
        
        .cart-item-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .cart-item-name {
            font-weight: 500;
            margin-bottom: 5px;
        }
        
        .cart-item-price {
            grid-column: 2 / 3;
            text-align: center;
            font-weight: 500;
            color: #3f51b5;
        }
        
        .cart-item-quantity {
            grid-column: 3 / 4;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .quantity-btn {
            width: 30px;
            height: 30px;
            background-color: #f8f9fa;
            border: 1px solid #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }
        
        .quantity-btn.decrease {
            border-radius: 3px 0 0 3px;
        }
        
        .quantity-btn.increase {
            border-radius: 0 3px 3px 0;
        }
        
        .cart-item-quantity input {
            width: 40px;
            height: 30px;
            border: 1px solid #e9ecef;
            border-left: none;
            border-right: none;
            text-align: center;
            font-size: 14px;
        }
        
        .cart-item-subtotal {
            grid-column: 4 / 5;
            text-align: right;
            font-weight: 600;
        }
        
        .remove-item {
            background: none;
            border: none;
            color: #dc3545;
            cursor: pointer;
            margin-left: 10px;
        }
        
        .cart-empty {
            padding: 40px 0;
            text-align: center;
            display: none;
        }
        
        .cart-empty i {
            font-size: 48px;
            color: #6c757d;
            margin-bottom: 15px;
        }
        
        .cart-empty h3 {
            margin-bottom: 15px;
        }
        
        .cart-summary {
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        
        .cart-summary h2 {
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #e9ecef;
        }
        
        .summary-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        
        .summary-item.total {
            font-weight: 600;
            font-size: 18px;
            border-top: 1px solid #e9ecef;
            padding-top: 15px;
            margin-top: 15px;
        }
        
        .checkout-button {
            display: block;
            width: 100%;
            padding: 12px;
            margin-top: 20px;
            background-color: #3f51b5;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        .checkout-button:hover {
            background-color: #2c3e9e;
        }
        
        .checkout-button:disabled {
            background-color: #6c757d;
            cursor: not-allowed;
        }
        
        .continue-shopping {
            display: inline-block;
            margin-top: 20px;
            color: #3f51b5;
            font-weight: 500;
        }
        
        .continue-shopping i {
            margin-right: 5px;
        }
        
        @media (max-width: 991.98px) {
            .cart-wrapper {
                grid-template-columns: 1fr;
            }
        }
        
        @media (max-width: 767.98px) {
            .cart-header {
                display: none;
            }
            
            .cart-item {
                grid-template-columns: 1fr;
                position: relative;
                padding: 20px 0;
            }
            
            .cart-item-details {
                grid-column: 1;
                margin-bottom: 15px;
            }
            
            .cart-item-price {
                grid-column: 1;
                text-align: left;
                margin-bottom: 10px;
            }
            
            .cart-item-quantity {
                grid-column: 1;
                justify-content: flex-start;
                margin-bottom: 10px;
            }
            
            .cart-item-subtotal {
                grid-column: 1;
                text-align: left;
            }
            
            .remove-item {
                position: absolute;
                top: 20px;
                right: 0;
            }
        }
    </style>
</head>
<body>
    <!-- Header Section -->
     @include('header')

    <!-- Mobile Menu -->
    <div class="mobile-menu">
        <div class="close-menu">
            <i class="fas fa-times"></i>
        </div>
        <nav>
            <ul>
                <li><a href="{{ route('index.page') }}">Home</a></li>
                <li><a href="{{ route('product.page') }}">Products</a></li>
                <li><a href="#">Categories</a></li>
                <li><a href="#">Deals</a></li>
                <li><a href="{{ route('login.page') }}">Login / Register</a></li>
                <li><a href="{{ route('cart.page') }}" class="active">Cart</a></li>
            </ul>
        </nav>
    </div>

    <!-- Page Title -->
    <section class="page-title">
        <div class="container">
            <h1>Shopping Cart</h1>
            <div class="breadcrumb">
                <a href="../index.html">Home</a> / <span>Cart</span>
            </div>
        </div>
    </section>

    <!-- Cart Section -->
    <section class="cart-section">
        <div class="container">
            <div class="cart-wrapper">
                <div class="cart-items-container">
                    <div class="cart-header">
                        <div class="cart-header-product">Product</div>
                        <div class="cart-header-price">Price</div>
                        <div class="cart-header-quantity">Quantity</div>
                        <div class="cart-header-subtotal">Subtotal</div>
                    </div>
                    
                    <div id="cart-items">
                        <!-- Cart items will be loaded dynamically with JavaScript -->
                    </div>
                    
                    <div class="cart-empty" id="cart-empty">
                        <i class="fas fa-shopping-cart"></i>
                        <h3>Your cart is empty</h3>
                        <p>Looks like you haven't added any items to your cart yet.</p>
                        <a href="{{ route('product.page') }}" class="btn btn-primary">Start Shopping</a>
                    </div>
                    
                    <a href="products.html" class="continue-shopping">
                        <i class="fas fa-arrow-left"></i> Continue Shopping
                    </a>
                </div>
                
                <div class="cart-summary">
                    <h2>Cart Summary</h2>
                    <div class="summary-item">
                        <div>Subtotal</div>
                        <div id="cart-total">$0.00</div>
                    </div>
                    <div class="summary-item">
                        <div>Shipping</div>
                        <div>Calculated at checkout</div>
                    </div>
                    <div class="summary-item total">
                        <div>Total</div>
                        <div id="cart-total-with-shipping">$0.00</div>
                    </div>
                    
                    <button id="checkout-button" class="checkout-button" disabled>Proceed to Checkout</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    @include('footer')

    <script src="{{ asset('js/cart.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Update cart total with shipping calculation
            const cartTotal = document.getElementById('cart-total');
            const cartTotalWithShipping = document.getElementById('cart-total-with-shipping');
            
            if (cartTotal && cartTotalWithShipping) {
                const totalText = cartTotal.textContent;
                const total = parseFloat(totalText.replace('$', ''));
                
                // Calculate shipping (free for orders over $50)
                const shipping = total > 50 || total === 0 ? 0 : 10;
                const totalWithShipping = total + shipping;
                
                cartTotalWithShipping.textContent = `$${totalWithShipping.toFixed(2)}`;
            }
            
            // Checkout button redirect
            const checkoutButton = document.getElementById('checkout-button');
            if (checkoutButton) {
                checkoutButton.addEventListener('click', function() {
                    window.location.href = 'checkout.html';
                });
            }
        });
    </script>
</body>
</html>
