<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopEase - Your Online Shopping Destination</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href={{asset("css/style.css")}}>
    <link rel="stylesheet" href={{ asset('css/responsive.css') }}>
    <!-- toaster css -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css">
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
                <li><a href="{{ route('index.page') }}" class="active">Home</a></li>
                <li><a href="{{ route('product.page') }}">Products</a></li>
                <li><a href="{{ route('category.page') }}">Categories</a></li>
                <li><a href="#">Deals</a></li>
                <li><a href="{{ route('login.page') }}">Login / Register</a></li>
                <li><a href="{{ route('cart.page') }}">Cart</a></li>
            </ul>
        </nav>
    </div>

    <!-- Hero Carousel -->
    <section class="hero-carousel">
        <div class="carousel-container">
            <div class="carousel-track">
                <div class="carousel-slide active">
                    <img src="https://pixabay.com/get/g9efe8bbac2b55b5e2f0960c0de0ab570ce80229b6148c0785288fa82040833ca9259cd89777bb09aa62e493f7537e18df50ec46d42d3e6e5894ff4f6686656fb_1280.jpg" alt="Online Shopping">
                    <div class="carousel-content">
                        <h1>Summer Collection 2023</h1>
                        <p>Discover the latest trends for the season</p>
                        <a href="pages/products.html" class="btn btn-primary">Shop Now</a>
                    </div>
                </div>
                <div class="carousel-slide">
                    <img src="https://pixabay.com/get/g1aeec39829439881287ef32cf840e02266a66a522fe67a91d6f95f396e011d7b94c6592cf8ce179fbd0a4859dad02395178c66059f18512d4869f82326c1c611_1280.jpg" alt="Special Offers">
                    <div class="carousel-content">
                        <h1>Special Offers</h1>
                        <p>Up to 50% off on selected items</p>
                        <a href="pages/products.html" class="btn btn-primary">View Offers</a>
                    </div>
                </div>
                <div class="carousel-slide">
                    <img src="https://pixabay.com/get/g69a6dd6008ae45947785b8c12c995431963bdcc59c35bad8444195ee3faed83b5778f8c2423d4a7745ec247cef357aa497daa21a68a91d5ba9a24d4153491549_1280.jpg" alt="New Arrivals">
                    <div class="carousel-content">
                        <h1>New Arrivals</h1>
                        <p>Check out the latest products in our store</p>
                        <a href="pages/products.html" class="btn btn-primary">Explore</a>
                    </div>
                </div>
                <div class="carousel-slide">
                    <img src="https://pixabay.com/get/g80e8551ce0bac70dde5e6fc5d113d64e0c9f382d5e08b23f5debd8c040e2ee4237381d6bc91c7c5257f23d876daafba66f258baa8b404e66a1b2bffe3db93ec6_1280.jpg" alt="Free Shipping">
                    <div class="carousel-content">
                        <h1>Free Shipping</h1>
                        <p>On all orders above $50</p>
                        <a href="pages/products.html" class="btn btn-primary">Start Shopping</a>
                    </div>
                </div>
            </div>
            <div class="carousel-arrows">
                <button class="carousel-arrow prev"><i class="fas fa-chevron-left"></i></button>
                <button class="carousel-arrow next"><i class="fas fa-chevron-right"></i></button>
            </div>
            <div class="carousel-dots">
                <span class="dot active" data-slide="0"></span>
                <span class="dot" data-slide="1"></span>
                <span class="dot" data-slide="2"></span>
                <span class="dot" data-slide="3"></span>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="container">
            <div class="features-grid">
                <div class="feature">
                    <i class="fas fa-truck"></i>
                    <h3>Free Shipping</h3>
                    <p>On orders over $50</p>
                </div>
                <div class="feature">
                    <i class="fas fa-undo"></i>
                    <h3>Easy Returns</h3>
                    <p>30 days return policy</p>
                </div>
                <div class="feature">
                    <i class="fas fa-shield-alt"></i>
                    <h3>Secure Payment</h3>
                    <p>100% secure checkout</p>
                </div>
                <div class="feature">
                    <i class="fas fa-headset"></i>
                    <h3>24/7 Support</h3>
                    <p>Customer support</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="categories">
        <div class="container">
            <div class="section-title">
                <h2>Shop by Category</h2>
                <p>Browse our top categories</p>
            </div>

                <div class="category-grid">
                @foreach ($category as $categories )
                <a href="{{ route('product.page') }}?page=category" class="category-card">
                    <div class="category-icon">
                        <!-- <i class="fas fa-laptop"></i> -->
                         <img src="{{ asset('images/'.$categories['category_image'] ) }}" alt="category_logo">
                    </div>
                    <h3>{{ $categories['category'] }}</h3>
                </a>
                @endforeach
            </div>
            
        </div>
    </section>
    <div id="product_data" data-products='@json($products)'></div>
    <div id="product_detail_page" data-prduct_detail_url="{{ route('product.detail.page') }}"></div>

    <!-- Featured Products Section -->
    <section class="featured-products">
        <div class="container">
            <div class="section-title">
                <h2>Featured Products</h2>
                <p>Handpicked just for you</p>
            </div>
            <div class="product-grid" id="featured-products">
            <!-- Products will be loaded dynamically with JavaScript -->
            </div>
            <div class="view-all-container">
                <a href="{{ route('product.page') }}" class="btn btn-secondary">View All Products</a>
            </div>
        </div>
    </section>

    <!-- Special Offers -->
    <section class="special-offers">
        <div class="container">
            <div class="offers-wrapper">
                <div class="offer-content">
                    <h2>Special Offers</h2>
                    <p>Get up to 50% off on selected items. Limited time only!</p>
                    <a href="pages/products.html?discount=true" class="btn btn-primary">Shop Now</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials">
        <div class="container">
            <div class="section-title">
                <h2>What Our Customers Say</h2>
                <p>Real experiences from our satisfied customers</p>
            </div>
            <div class="testimonial-grid">
                <div class="testimonial">
                    <div class="testimonial-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="testimonial-text">"Excellent service and high-quality products. The delivery was faster than expected. Will definitely shop here again!"</p>
                    <div class="testimonial-author">
                        <h4>Sarah Johnson</h4>
                    </div>
                </div>
                <div class="testimonial">
                    <div class="testimonial-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="testimonial-text">"The customer service is outstanding. They helped me with an issue and resolved it immediately. Highly recommend!"</p>
                    <div class="testimonial-author">
                        <h4>Michael Brown</h4>
                    </div>
                </div>
                <div class="testimonial">
                    <div class="testimonial-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p class="testimonial-text">"Great prices and a wide selection of products. The website is easy to navigate and the checkout process is smooth."</p>
                    <div class="testimonial-author">
                        <h4>Emily Davis</h4>
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

    <!-- Payment Methods -->
    <section class="payment-methods">
        <div class="container">
            <div class="section-title">
                <h2>Secure Payment Methods</h2>
            </div>
            <div class="payment-icons">
                <img src="https://pixabay.com/get/g87aa6580f0fe4b14726e2b5409206c7ef8da5eb88808b1775fedf32110afa2cdee935e4ccb8fd84ef80edaef8471e9ddf39d7d2e4725071683baa278a70b2a28_1280.jpg" alt="Visa">
                <img src="https://pixabay.com/get/ge8d298d4f23921da12eef7448e0e9cf87166050857c71632283daaef615006375d94bacc562e9a068287e44f1f687a2670d2aee0fe748f2b3e5d695fcd68ef7a_1280.jpg" alt="Mastercard">
                <img src="https://pixabay.com/get/g2e5fda2782142068f90a96ce598fd41c93e6444ae0775b1310055a1b991d84e257d38327deaed410884c4deb75da55f4f036525186847c4cae22cd9406ba8073_1280.jpg" alt="PayPal">
                <img src="https://pixabay.com/get/ge24866148b665913038f9bca9b68f9851d8a80022175102bb8989aa87e330362e9f4ca286d3423d6d55e0b90e24c597c6e7ef53f319c5f0f45c06b90d7d6a75b_1280.jpg" alt="Apple Pay">
            </div>
        </div>
    </section>

    <!-- Footer -->
   @include('footer')
  <!-- toasters script -->
<script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/cart.js') }}"></script>
    <script src="{{ asset('js/products.js') }}"></script>
</body>
</html>
