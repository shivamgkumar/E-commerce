<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category - ShopEase</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href={{asset("css/style.css")}}>
    <link rel="stylesheet" href={{ asset('css/responsive.css') }}>
    <style>
        /* Additional CSS for category page */
        .category-hero {
            background: linear-gradient(135deg, #3f51b5, #ff4081);
            color: white;
            padding: 80px 0;
            text-align: center;
            margin-bottom: 60px;
        }
        
        .category-hero h1 {
            font-size: 48px;
            margin-bottom: 15px;
            font-weight: 700;
        }
        
        .category-hero p {
            font-size: 18px;
            max-width: 600px;
            margin: 0 auto;
        }
        
        .category-stats {
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }
        
        .category-info {
            display: flex;
            align-items: center;
        }
        
        .category-icon {
            width: 60px;
            height: 60px;
            background-color: #3f51b5;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-right: 20px;
        }
        
        .category-details h2 {
            margin-bottom: 5px;
            font-size: 24px;
        }
        
        .category-details p {
            color: #6c757d;
            margin: 0;
        }
        
        .category-actions {
            display: flex;
            gap: 15px;
            align-items: center;
        }
        
        .view-toggle {
            display: flex;
            background-color: #f8f9fa;
            border-radius: 5px;
            overflow: hidden;
        }
        
        .view-btn {
            padding: 8px 12px;
            border: none;
            background: none;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .view-btn.active {
            background-color: #3f51b5;
            color: white;
        }
        
        .subcategories {
            margin-bottom: 40px;
        }
        
        .subcategory-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }
        
        .subcategory-card {
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .subcategory-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
        }
        
        .subcategory-image {
            height: 150px;
            background: linear-gradient(45deg, #3f51b5, #ff4081);
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .subcategory-image i {
            font-size: 48px;
            color: white;
        }
        
        .subcategory-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: rgba(255, 255, 255, 0.9);
            color: #3f51b5;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .subcategory-content {
            padding: 20px;
        }
        
        .subcategory-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 8px;
        }
        
        .subcategory-description {
            color: #6c757d;
            font-size: 14px;
            margin-bottom: 10px;
        }
        
        .subcategory-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 12px;
            color: #6c757d;
        }
        
        .filters-section {
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 30px;
        }
        
        .filter-group {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            align-items: center;
        }
        
        .filter-group label {
            font-weight: 500;
            margin-right: 10px;
        }
        
        .filter-select,
        .filter-input {
            padding: 8px 12px;
            border: 1px solid #e9ecef;
            border-radius: 5px;
            font-family: 'Poppins', sans-serif;
        }
        
        .price-range-filter {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .price-range-filter input {
            width: 100px;
        }
        
        .products-grid-view {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
        }
        
        .products-list-view {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        
        .product-list-item {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            display: grid;
            grid-template-columns: 120px 1fr auto;
            gap: 20px;
            align-items: center;
        }
        
        .product-list-image {
            width: 120px;
            height: 120px;
            border-radius: 10px;
            overflow: hidden;
        }
        
        .product-list-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .product-list-details h3 {
            margin-bottom: 8px;
            font-size: 18px;
        }
        
        .product-list-details p {
            color: #6c757d;
            margin-bottom: 10px;
            line-height: 1.5;
        }
        
        .product-list-meta {
            display: flex;
            gap: 15px;
            font-size: 14px;
            color: #6c757d;
        }
        
        .product-list-actions {
            display: flex;
            flex-direction: column;
            gap: 10px;
            align-items: end;
        }
        
        .product-list-price {
            font-size: 20px;
            font-weight: 600;
            color: #3f51b5;
            margin-bottom: 10px;
        }
        
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 40px;
            gap: 5px;
        }
        
        .pagination a,
        .pagination span {
            padding: 8px 12px;
            border: 1px solid #e9ecef;
            color: #6c757d;
            text-decoration: none;
            border-radius: 5px;
            transition: all 0.3s;
        }
        
        .pagination a:hover,
        .pagination .active {
            background-color: #3f51b5;
            color: white;
            border-color: #3f51b5;
        }
        
        @media (max-width: 991.98px) {
            .category-hero h1 {
                font-size: 36px;
            }
            
            .category-stats {
                flex-direction: column;
                gap: 20px;
                text-align: center;
            }
            
            .category-actions {
                justify-content: center;
            }
            
            .filter-group {
                justify-content: center;
            }
            
            .product-list-item {
                grid-template-columns: 1fr;
                text-align: center;
            }
        }
        
        @media (max-width: 767.98px) {
            .category-hero {
                padding: 60px 0;
            }
            
            .category-hero h1 {
                font-size: 28px;
            }
            
            .subcategory-grid {
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            }
            
            .products-grid-view {
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
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
                <li><a href="category.html" class="active">Categories</a></li>
                <li><a href="#">Deals</a></li>
                <li><a href="{{ route('login.page') }}">Login / Register</a></li>
                <li><a href="{{ route('cart.page') }}">Cart</a></li>
            </ul>
        </nav>
    </div>

    <!-- Category Hero Section -->
    <section class="category-hero">
        <div class="container">
            <h1 id="category-title">Electronics</h1>
            <p id="category-description">Discover the latest technology and gadgets to enhance your digital lifestyle</p>
        </div>
    </section>

    <!-- Category Stats -->
    <section class="category-section">
        <div class="container">
            <div class="category-stats">
                <div class="category-info">
                    <div class="category-icon" id="category-icon">
                        <i class="fas fa-laptop"></i>
                    </div>
                    <div class="category-details">
                        <h2 id="category-name">Electronics</h2>
                        <p id="product-count">145 products available</p>
                    </div>
                </div>
                <div class="category-actions">
                    <div class="view-toggle">
                        <button class="view-btn active" data-view="grid">
                            <i class="fas fa-th-large"></i>
                        </button>
                        <button class="view-btn" data-view="list">
                            <i class="fas fa-list"></i>
                        </button>
                    </div>
                    <select class="filter-select" id="sort-products">
                        <option value="featured">Featured</option>
                        <option value="price-low">Price: Low to High</option>
                        <option value="price-high">Price: High to Low</option>
                        <option value="rating">Best Rating</option>
                        <option value="newest">Newest First</option>
                    </select>
                </div>
            </div>

            <!-- Subcategories Section -->
            <div class="subcategories" id="subcategories-section">
                <div class="section-title">
                    <h2>Browse by Subcategory</h2>
                    <p>Explore specific types of products in this category</p>
                </div>
                <div class="subcategory-grid" id="subcategories-container">
                    <!-- Subcategories will be loaded dynamically -->
                </div>
            </div>

            <!-- Filters Section -->
            <div class="filters-section">
                <div class="filter-group">
                    <label>Price Range:</label>
                    <div class="price-range-filter">
                        <input type="number" id="min-price" placeholder="Min" class="filter-input">
                        <span>to</span>
                        <input type="number" id="max-price" placeholder="Max" class="filter-input">
                    </div>
                    
                    <label>Brand:</label>
                    <select id="brand-filter" class="filter-select">
                        <option value="">All Brands</option>
                    </select>
                    
                    <label>Rating:</label>
                    <select id="rating-filter" class="filter-select">
                        <option value="">All Ratings</option>
                        <option value="4">4+ Stars</option>
                        <option value="3">3+ Stars</option>
                        <option value="2">2+ Stars</option>
                    </select>
                    
                    <button id="apply-filters" class="btn btn-primary">Apply Filters</button>
                    <button id="clear-filters" class="btn btn-secondary">Clear</button>
                </div>
            </div>

            <!-- Products Section -->
            <div class="products-container">
                <div class="product-grid products-grid-view" id="products-container">
                    <!-- Products will be loaded dynamically -->
                </div>
            </div>

            <!-- Pagination -->
            <div class="pagination" id="pagination">
                <a href="#" class="prev-page">&laquo; Previous</a>
                <span class="active">1</span>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                <a href="#">5</a>
                <a href="#" class="next-page">Next &raquo;</a>
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
    <script src="{{  asset('/js/cart.js')}}"></script>
    <script src="{{  asset('/js/product.js')}}"></script>

    <script>
        // Category data
        const categoryData = {
            electronics: {
                title: 'Electronics',
                description: 'Discover the latest technology and gadgets to enhance your digital lifestyle',
                icon: 'fas fa-laptop',
                subcategories: [
                    {
                        name: 'Smartphones',
                        description: 'Latest smartphones and accessories',
                        icon: 'fas fa-mobile-alt',
                        productCount: 45,
                        trending: true
                    },
                    {
                        name: 'Laptops',
                        description: 'High-performance laptops for work and gaming',
                        icon: 'fas fa-laptop',
                        productCount: 32,
                        trending: false
                    },
                    {
                        name: 'Headphones',
                        description: 'Premium audio equipment and accessories',
                        icon: 'fas fa-headphones',
                        productCount: 28,
                        trending: true
                    },
                    {
                        name: 'Smart Watches',
                        description: 'Wearable technology for health and fitness',
                        icon: 'fas fa-clock',
                        productCount: 18,
                        trending: false
                    },
                    {
                        name: 'Cameras',
                        description: 'Professional and amateur photography equipment',
                        icon: 'fas fa-camera',
                        productCount: 22,
                        trending: false
                    }
                ]
            },
            fashion: {
                title: 'Fashion',
                description: 'Trendy clothing and accessories for every style and occasion',
                icon: 'fas fa-tshirt',
                subcategories: [
                    {
                        name: 'Men\'s Clothing',
                        description: 'Stylish clothing for men',
                        icon: 'fas fa-male',
                        productCount: 85,
                        trending: true
                    },
                    {
                        name: 'Women\'s Clothing',
                        description: 'Fashion-forward women\'s apparel',
                        icon: 'fas fa-female',
                        productCount: 92,
                        trending: true
                    },
                    {
                        name: 'Shoes',
                        description: 'Footwear for all occasions',
                        icon: 'fas fa-shoe-prints',
                        productCount: 67,
                        trending: false
                    },
                    {
                        name: 'Accessories',
                        description: 'Bags, jewelry, and fashion accessories',
                        icon: 'fas fa-gem',
                        productCount: 54,
                        trending: true
                    }
                ]
            },
            home: {
                title: 'Home & Living',
                description: 'Everything you need to make your house a beautiful home',
                icon: 'fas fa-home',
                subcategories: [
                    {
                        name: 'Furniture',
                        description: 'Quality furniture for every room',
                        icon: 'fas fa-couch',
                        productCount: 73,
                        trending: false
                    },
                    {
                        name: 'Kitchen',
                        description: 'Kitchen appliances and cookware',
                        icon: 'fas fa-utensils',
                        productCount: 89,
                        trending: true
                    },
                    {
                        name: 'Decor',
                        description: 'Home decoration and art pieces',
                        icon: 'fas fa-palette',
                        productCount: 45,
                        trending: true
                    },
                    {
                        name: 'Garden',
                        description: 'Outdoor and garden essentials',
                        icon: 'fas fa-seedling',
                        productCount: 38,
                        trending: false
                    }
                ]
            }
        };

        document.addEventListener('DOMContentLoaded', function() {
            // Get category from URL parameter
            const urlParams = new URLSearchParams(window.location.search);
            const category = urlParams.get('category') || 'electronics';
            
            // Load category data
            loadCategoryData(category);
            loadSubcategories(category);
            loadCategoryProducts(category);
            
            // View toggle functionality
            const viewButtons = document.querySelectorAll('.view-btn');
            const productsContainer = document.getElementById('products-container');
            
            viewButtons.forEach(button => {
                button.addEventListener('click', function() {
                    viewButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');
                    
                    const view = this.dataset.view;
                    if (view === 'grid') {
                        productsContainer.className = 'product-grid products-grid-view';
                    } else {
                        productsContainer.className = 'products-list-view';
                    }
                    loadCategoryProducts(category, view);
                });
            });
            
            // Filter functionality
            const applyFiltersBtn = document.getElementById('apply-filters');
            const clearFiltersBtn = document.getElementById('clear-filters');
            
            applyFiltersBtn.addEventListener('click', function() {
                loadCategoryProducts(category);
            });
            
            clearFiltersBtn.addEventListener('click', function() {
                document.getElementById('min-price').value = '';
                document.getElementById('max-price').value = '';
                document.getElementById('brand-filter').value = '';
                document.getElementById('rating-filter').value = '';
                loadCategoryProducts(category);
            });
            
            // Sort functionality
            const sortSelect = document.getElementById('sort-products');
            sortSelect.addEventListener('change', function() {
                loadCategoryProducts(category);
            });
        });

        function loadCategoryData(category) {
            const data = categoryData[category] || categoryData.electronics;
            
            document.getElementById('category-title').textContent = data.title;
            document.getElementById('category-description').textContent = data.description;
            document.getElementById('category-name').textContent = data.title;
            document.getElementById('category-icon').innerHTML = `<i class="${data.icon}"></i>`;
            
            // Update product count
            const totalProducts = data.subcategories.reduce((sum, sub) => sum + sub.productCount, 0);
            document.getElementById('product-count').textContent = `${totalProducts} products available`;
        }

        function loadSubcategories(category) {
            const data = categoryData[category] || categoryData.electronics;
            const container = document.getElementById('subcategories-container');
            
            container.innerHTML = '';
            
            data.subcategories.forEach(subcategory => {
                const subcategoryCard = document.createElement('div');
                subcategoryCard.className = 'subcategory-card';
                subcategoryCard.innerHTML = `
                    <div class="subcategory-image">
                        <i class="${subcategory.icon}"></i>
                        ${subcategory.trending ? '<div class="subcategory-badge">Trending</div>' : ''}
                    </div>
                    <div class="subcategory-content">
                        <h3 class="subcategory-title">${subcategory.name}</h3>
                        <p class="subcategory-description">${subcategory.description}</p>
                        <div class="subcategory-meta">
                            <span>${subcategory.productCount} products</span>
                            <span><i class="fas fa-arrow-right"></i></span>
                        </div>
                    </div>
                `;
                
                subcategoryCard.addEventListener('click', function() {
                    window.location.href = `products.html?category=${category}&subcategory=${subcategory.name.toLowerCase().replace(/\s+/g, '-')}`;
                });
                
                container.appendChild(subcategoryCard);
            });
        }

        function loadCategoryProducts(category, view = 'grid') {
            const container = document.getElementById('products-container');
            
            // Filter products from the existing products data based on category
            if (typeof dummyProducts !== 'undefined') {
                let filteredProducts = dummyProducts.filter(product => product.category === category);
                
                // Apply filters
                const minPrice = parseFloat(document.getElementById('min-price').value) || 0;
                const maxPrice = parseFloat(document.getElementById('max-price').value) || Infinity;
                const brandFilter = document.getElementById('brand-filter').value;
                const ratingFilter = parseFloat(document.getElementById('rating-filter').value) || 0;
                
                filteredProducts = filteredProducts.filter(product => {
                    return product.price >= minPrice && 
                           product.price <= maxPrice && 
                           product.rating >= ratingFilter;
                });
                
                // Apply sorting
                const sortBy = document.getElementById('sort-products').value;
                switch (sortBy) {
                    case 'price-low':
                        filteredProducts.sort((a, b) => a.price - b.price);
                        break;
                    case 'price-high':
                        filteredProducts.sort((a, b) => b.price - a.price);
                        break;
                    case 'rating':
                        filteredProducts.sort((a, b) => b.rating - a.rating);
                        break;
                    case 'newest':
                        filteredProducts.sort((a, b) => (b.isNew ? 1 : 0) - (a.isNew ? 1 : 0));
                        break;
                }
                
                container.innerHTML = '';
                
                if (filteredProducts.length === 0) {
                    container.innerHTML = '<div class="no-products">No products found matching your criteria.</div>';
                    return;
                }
                
                filteredProducts.forEach(product => {
                    if (view === 'list') {
                        const productElement = createProductListItem(product);
                        container.appendChild(productElement);
                    } else {
                        const productElement = createProductCard(product);
                        container.appendChild(productElement);
                    }
                });
            }
        }

        function createProductListItem(product) {
            const productItem = document.createElement('div');
            productItem.className = 'product-list-item';
            productItem.dataset.id = product.id;
            
            const ratingStars = generateRatingStars(product.rating);
            const oldPriceHtml = product.originalPrice > product.price 
                ? `<span class="old-price">$${product.originalPrice.toFixed(2)}</span>` 
                : '';
            
            productItem.innerHTML = `
                <div class="product-list-image">
                    <img src="${product.image}" alt="${product.name}">
                </div>
                <div class="product-list-details">
                    <h3>${product.name}</h3>
                    <p>${product.description}</p>
                    <div class="product-list-meta">
                        <span class="rating-stars">${ratingStars}</span>
                        <span>(${product.reviews} reviews)</span>
                        <span>${product.inStock ? 'In Stock' : 'Out of Stock'}</span>
                    </div>
                </div>
                <div class="product-list-actions">
                    <div class="product-list-price">
                        $${product.price.toFixed(2)}
                        ${oldPriceHtml}
                    </div>
                    <button class="btn btn-primary add-to-cart-btn">Add to Cart</button>
                    <a href="product-detail.html?id=${product.id}" class="btn btn-secondary">View Details</a>
                </div>
            `;
            
            return productItem;
        }

        // Update navigation links to include category page
        document.addEventListener('DOMContentLoaded', function() {
            // Update cart count
            updateCartCount();
        });
    </script>
</body>
</html>