<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - ShopEase</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href={{asset("css/style.css")}}>
    <link rel="stylesheet" href={{ asset('css/responsive.css') }}>
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
            <h1>Products</h1>
            <div class="breadcrumb">
                <a href="../index.html">Home</a> / <span>Products</span>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section class="products-section">
        <div class="container">
            <div class="products-wrapper">
                <!-- Filters Sidebar -->
                <aside class="filters-sidebar">
                    <div class="filter-section">
                        <h3>Categories</h3>
                        <select id="category-filter" class="filter-select">
                            <option value="all">All Categories</option>
                            <option value="electronics">Electronics</option>
                            <option value="fashion">Fashion</option>
                            <option value="home">Home & Living</option>
                            <option value="beauty">Beauty</option>
                            <option value="sports">Sports</option>
                            <option value="books">Books</option>
                        </select>
                    </div>
                    
                    <div class="filter-section">
                        <h3>Price Range</h3>
                        <div class="price-range-control">
                            <input type="range" id="price-range" min="0" max="1000" value="1000" step="10">
                            <span id="price-range-value">$1000</span>
                        </div>
                    </div>
                    
                    <div class="filter-section">
                        <button id="clear-filters" data-products="{{ $products }}"  class="btn btn-secondary">Clear Filters</button>
                    </div>
                </aside>
                
                <!-- Products Content -->
                <div class="products-content">
                    <!-- Products Header -->
                    <div class="products-header">
                        <div class="products-count">
                            <span id="product-count">0</span> Products
                        </div>
                        <div class="products-search">
                            <form id="product-search-form">
                                <input type="text" id="product-search-input" placeholder="Search products...">
                                <button type="submit"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                        <div class="products-sort">
                            <select id="sort-by" class="sort-select">
                                <option value="featured">Featured</option>
                                <option value="price-low">Price: Low to High</option>
                                <option value="price-high">Price: High to Low</option>
                                <option value="rating">Rating</option>
                                <option value="newest">Newest</option>
                            </select>
                        </div>
                    </div>
                    
                    <!-- Products Grid -->
                    <div class="product-grid" id="products-container">
                        <!-- Products will be loaded dynamically with JavaScript -->
                    </div>
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
                    <input type="email" name="email" placeholder="Enter your email" required>
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
</body>
</html>
