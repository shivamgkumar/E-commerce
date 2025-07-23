<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail - ShopEase</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href={{asset("css/style.css")}}>
    <link rel="stylesheet" href={{ asset('css/responsive.css') }}>
    <style>
        /* Additional CSS for product detail page */
        .product-detail-section {
            padding: 60px 0;
        }
        
        .product-detail-wrapper {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
        }
        
        .product-image-container {
            background-color: white;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .product-image-container img {
            width: 100%;
            height: auto;
            display: block;
        }
        
        .product-info-container {
            padding: 0 10px;
        }
        
        .product-title {
            font-size: 28px;
            margin-bottom: 10px;
        }
        
        .product-price-container {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .product-current-price {
            font-size: 26px;
            font-weight: 600;
            color: #3f51b5;
        }
        
        .product-old-price {
            margin-left: 10px;
            text-decoration: line-through;
            color: #6c757d;
            font-size: 18px;
        }
        
        .product-rating-container {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .product-rating {
            color: #ffc107;
            margin-right: 10px;
        }
        
        .product-reviews {
            color: #6c757d;
        }
        
        .product-category {
            display: inline-block;
            background-color: #f8f9fa;
            padding: 5px 10px;
            border-radius: 3px;
            margin-bottom: 20px;
            font-size: 14px;
        }
        
        .product-description {
            margin-bottom: 30px;
            line-height: 1.8;
        }
        
        .product-features {
            margin-bottom: 30px;
            padding-left: 20px;
        }
        
        .product-features li {
            margin-bottom: 8px;
        }
        
        .product-quantity-container {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .quantity-control {
            display: flex;
            align-items: center;
            margin-right: 20px;
        }
        
        .quantity-btn {
            width: 36px;
            height: 36px;
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
        
        .quantity-control input {
            width: 50px;
            height: 36px;
            border: 1px solid #e9ecef;
            border-left: none;
            border-right: none;
            text-align: center;
            font-size: 16px;
        }
        
        .add-to-cart-button {
            padding: 12px 25px;
            background-color: #3f51b5;
            color: white;
            border: none;
            border-radius: 3px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        .add-to-cart-button:hover {
            background-color: #2c3e9e;
        }
        
        .product-meta {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e9ecef;
        }
        
        .product-meta p {
            margin-bottom: 5px;
        }
        
        /* Responsive styles */
        @media (max-width: 991.98px) {
            .product-detail-wrapper {
                grid-template-columns: 1fr;
            }
        }
        
        /* Related products section */
        .related-products {
            margin-top: 60px;
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
                <li><a href="{{ route('product.page') }}" class="active">Products</a></li>
                <li><a href="{{ route('category.page') }}">Categories</a></li>
                <li><a href="#">Deals</a></li>
                <li><a href="{{ route('login.page') }}">Login / Register</a></li>
                <li><a href="{{ route('cart.page') }}">Cart</a></li>
            </ul>
        </nav>
    </div>

    <!-- Page Title -->
    <section class="page-title">
        <div class="container">
            <h1 id="product-title-breadcrumb">Product Detail</h1>
            <div class="breadcrumb">
                <a href="{{ route('index.page') }}" id="indexRoute">Home</a> / <a href="{{ route('product.page') }}">Products</a> / <span id="product-title-short">Product</span>
            </div>
        </div>
    </section>

    <!-- Product Detail Section -->
    <section class="product-detail-section">
        <div class="container">
            <div class="product-detail-wrapper" id="product-detail">
                <div class="product-image-container">
                    <img id="product-image" src="" alt="Product">
                </div>
                <div class="product-info-container">
                    <h1 id="product-title" class="product-title"></h1>
                    <div class="product-price-container">
                        <div id="product-price" class="product-current-price"></div>
                        <div id="product-old-price" class="product-old-price"></div>
                    </div>
                    <div class="product-rating-container">
                        <div id="product-rating" class="product-rating"></div>
                        <div id="product-reviews" class="product-reviews"></div>
                    </div>
                    <div class="product-category" id="product-category"></div>
                    <div class="product-description" id="product-description"></div>
                    <h3>Features</h3>
                    <ul class="product-features" id="product-features"></ul>
                    <div class="product-quantity-container">
                        <div class="quantity-control">
                            <div class="quantity-btn decrease">-</div>
                            <input type="number" id="product-quantity" value="1" min="1">
                            <div class="quantity-btn increase">+</div>
                        </div>
                        <button id="add-to-cart-button" class="add-to-cart-button">Add to Cart</button>
                    </div>
                    <div class="product-meta">
                        <p>Categories: <span id="meta-category"></span></p>
                        <p>SKU: <span id="meta-sku"></span></p>
                    </div>
                </div>
            </div>
            
            <!-- Related Products -->
            <div class="related-products">
                <div class="section-title">
                    <h2>Related Products</h2>
                    <p>You might also like</p>
                </div>
                <div class="product-grid" id="related-products">
                    <!-- Related products will be loaded dynamically with JavaScript -->
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="newsletter">
        <div class="container">
            <div class="newsletter-wrapper">
                <div class="newsletter-content">
                    <h2>Subscribe to Our Newsletter</h2>
                    <p>Get the latest updates on new products and special offers</p>
                </div>
                <form class="newsletter-form">
                    <input type="email" placeholder="Enter your email" required>
                    <button type="submit" class="btn btn-primary">Subscribe</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
     @include('footer')

    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/cart.js') }}"></script>
    <script src="{{ asset('js/products.js') }}"></script>

    <script>
        // Update breadcrumb and meta data based on URL parameters
        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            const productId = urlParams.get('id');
            
            if (productId) {
                // These will be updated by the loadProductDetail function
                const metaCategory = document.getElementById('meta-category');
                const metaSku = document.getElementById('meta-sku');
                const productTitleShort = document.getElementById('product-title-short');
                const productTitleBreadcrumb = document.getElementById('product-title-breadcrumb');
                
                if (metaCategory) metaCategory.textContent = '';
                if (metaSku) metaSku.textContent = `PRD-${productId}`;
            } else {
                // Redirect to products page if no ID provided
                const indexPage=document.getElementById('indexRoute').getAttribute('href');
                window.location.href = indexPage;
            }
        });
    </script>
</body>
</html>
