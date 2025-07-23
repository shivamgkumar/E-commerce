  <!-- Header Section -->
    <header>
        <meta name="csrf-token" id="metaCsrf" content="{{ csrf_token() }}">
        <div class="container">
            <div class="header-wrapper">
                <div class="logo">
                    <a href="{{ route('index.page') }}">ShopEase</a>
                </div>
                <div class="search-bar">
                    <form>
                        <input type="text" placeholder="Search for products...">
                        <button type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>
                <div class="header-right">
                    <nav class="desktop-nav">
                        <ul>
                            <li><a href="{{ route('index.page') }}">Home</a></li>
                            <li><a href="{{ route('product.page') }}">Products</a></li>
                            <li><a href="{{ route('category.page') }}">Categories</a></li>
                            <li><a href="#">Deals</a></li>
                        </ul>
                    </nav>
                    <div class="header-icons">
                        <a href="{{ route('login.page') }}" class="icon-link active"><i class="fas fa-user"></i>  @if(Auth::user())
                        <a href="{{ route('user.logout', ['name' => 'user']) }}">Logout</a>
                        @else
                        <p>Login</p>
                        @endif</a>
                      
                        <a href="{{ route('cart.page') }}" class="icon-link cart-icon">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="cart-count">0</span>
                        </a>
                    </div>
                    <div class="mobile-menu-toggle">
                        <i class="fas fa-bars"></i>
                    </div>
                </div>
            </div>
        </div>
    </header>
