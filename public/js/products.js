document.addEventListener("DOMContentLoaded", function () {
    // Load featured products on homepage
    const featuredProductsContainer =
        document.getElementById("featured-products");
    if (featuredProductsContainer) {
        loadFeaturedProducts();
    }

    // Load products on products page
    const productsContainer = document.getElementById("products-container");
    if (productsContainer) {
        loadProducts();

        // Initialize filter functionality
        initializeFilters();

        // Initialize search functionality
        const searchForm = document.getElementById("product-search-form");
        if (searchForm) {
            searchForm.addEventListener("submit", function (e) {
                e.preventDefault();
                loadProducts();
            });
        }
    }

    // Load product details on product detail page
    const productDetailContainer = document.getElementById("product-detail");
    if (productDetailContainer) {
        const urlParams = new URLSearchParams(window.location.search);
        const productId = urlParams.get("id");

        if (productId) {
            loadProductDetail(productId);
        }
    }
});

// Dummy products data (in a real application, this would come from an API)
// const dummyProducts = [
//     {
//         id: "1",
//         name: "Wireless Headphones",
//         price: 99.99,
//         originalPrice: 129.99,
//         image: "https://pixabay.com/get/gb860b2d47d46ddc7c32054d53e364441fb78272798ad11d8fbf756fbf4d6434595ee67efbf2d5da95b33418a7b73f35c201065255dfe1b271598eb8601d5bbc4_1280.jpg",
//         category: "electronics",
//         rating: 4.5,
//         reviews: 128,
//         description:
//             "High-quality wireless headphones with noise cancellation and long battery life. Perfect for music lovers and professionals alike.",
//         features: [
//             "Active Noise Cancellation",
//             "30-hour battery life",
//             "Built-in microphone",
//             "Bluetooth 5.0 connectivity",
//             "Comfortable over-ear design",
//         ],
//         inStock: true,
//         featured: true,
//         discount: 20,
//         isNew: false,
//     },
//     {
//         id: "2",
//         name: "Smart Watch",
//         price: 199.99,
//         originalPrice: 249.99,
//         image: "https://pixabay.com/get/g77d28bb703eb90ad67d416dbfbb37e0d25d78b288e7a2dbb07e1a1277546810c02d0df5915592518c44fd7c7b6eaa4a3_1280.jpg",
//         category: "electronics",
//         rating: 4.2,
//         reviews: 74,
//         description:
//             "Smart watch with health tracking features, notifications, and a stylish design. Stay connected and monitor your fitness goals.",
//         features: [
//             "Heart rate monitoring",
//             "Sleep tracking",
//             "Water resistant",
//             "Customizable watch faces",
//             "Compatibility with iOS and Android",
//         ],
//         inStock: true,
//         featured: true,
//         discount: 20,
//         isNew: true,
//     },
//     {
//         id: "3",
//         name: "Designer Sunglasses",
//         price: 149.99,
//         originalPrice: 179.99,
//         image: "https://pixabay.com/get/ge8c65c6ffd4a1893d9e9d79ccd4df8786e0825744e313c2e61cbbe64064d40008d0526b362ac7301d266846cfe1853b265fbf9f55a81a56218c96bbee9766ffc_1280.jpg",
//         category: "fashion",
//         rating: 4.7,
//         reviews: 56,
//         description:
//             "Stylish designer sunglasses offering 100% UV protection. The perfect accessory to elevate your summer look while protecting your eyes.",
//         features: [
//             "100% UV protection",
//             "Polarized lenses",
//             "Durable frame",
//             "Includes protective case",
//             "One-year warranty",
//         ],
//         inStock: true,
//         featured: false,
//         discount: 15,
//         isNew: false,
//     },
//     {
//         id: "4",
//         name: "Indoor Plant Collection",
//         price: 49.99,
//         originalPrice: 59.99,
//         image: "https://pixabay.com/get/g9151457f1e816b2a3125f211ce2a1b12404331ebe9dc40540ee3111a96613c280ffa83748babac7a01125d12c078cba21c7af3d5f1ff106cbbc08c990f0a28f0_1280.jpg",
//         category: "home",
//         rating: 4.8,
//         reviews: 92,
//         description:
//             "A collection of beautiful indoor plants to bring nature into your home. Includes care instructions for beginners.",
//         features: [
//             "Set of 3 different plants",
//             "Decorative pots included",
//             "Air purifying varieties",
//             "Low maintenance",
//             "Detailed care instructions",
//         ],
//         inStock: true,
//         featured: true,
//         discount: 0,
//         isNew: false,
//     },
//     {
//         id: "5",
//         name: "Professional DSLR Camera",
//         price: 799.99,
//         originalPrice: 999.99,
//         image: "https://pixabay.com/get/g0cf884484f7fcbde980ce3c9dcfeef84d6d2edb51666c8bdb53618e6dc5f80c80e27d98a3274dd06f34b5a6c04d496cf7910bd7cfe9ef8f8cdc2499a82960ac7_1280.jpg",
//         category: "electronics",
//         rating: 4.9,
//         reviews: 45,
//         description:
//             "Professional-grade DSLR camera for photography enthusiasts and professionals. Capture stunning images with exceptional clarity.",
//         features: [
//             "24.1 megapixel sensor",
//             "4K video recording",
//             "Interchangeable lenses",
//             "Built-in Wi-Fi",
//             "Long battery life",
//         ],
//         inStock: true,
//         featured: true,
//         discount: 20,
//         isNew: false,
//     },
//     {
//         id: "6",
//         name: "Premium Coffee Maker",
//         price: 129.99,
//         originalPrice: 159.99,
//         image: "https://pixabay.com/get/gf0083228e0e3147280f058b46ef58cd9951dc6f47baae19d36f6636ea72fa53346e639c67564115400f72a2c9a3540d3c90d4d8c9efdaa09efe0f7d41fc08bad_1280.jpg",
//         category: "home",
//         rating: 4.3,
//         reviews: 62,
//         description:
//             "Premium coffee maker with multiple brewing options for the perfect cup of coffee every morning. Programmable timer included.",
//         features: [
//             "Programmable timer",
//             "Multiple brew strengths",
//             "Built-in grinder",
//             "Thermal carafe",
//             "Easy cleaning",
//         ],
//         inStock: true,
//         featured: false,
//         discount: 15,
//         isNew: true,
//     },
//     {
//         id: "7",
//         name: "Leather Wallet",
//         price: 39.99,
//         originalPrice: 49.99,
//         image: "https://pixabay.com/get/gb17bc8d4167e60e236b77719b292400bf3b10bdb7ae6ef1cc69e64f15adf3f8fd0d10b9beb233d07d334efef56095db718f5db103dabe351360c4767f91f94d3_1280.jpg",
//         category: "fashion",
//         rating: 4.6,
//         reviews: 83,
//         description:
//             "Genuine leather wallet with RFID blocking technology. Slim design with plenty of card slots and a coin pocket.",
//         features: [
//             "Genuine leather",
//             "RFID blocking technology",
//             "Multiple card slots",
//             "Coin pocket",
//             "Slim design",
//         ],
//         inStock: true,
//         featured: false,
//         discount: 0,
//         isNew: false,
//     },
//     {
//         id: "8",
//         name: "Aromatherapy Diffuser",
//         price: 34.99,
//         originalPrice: 44.99,
//         image: "https://pixabay.com/get/g75634d7098846626b2a45c2c4db5ab36e3c24ecefc910f8dd9e38ab24987b3cdec99006e4b1eacc59d9b20e3a19ae9ce134abeb98f627d46dbe276fa6fd9f05f_1280.jpg",
//         category: "home",
//         rating: 4.4,
//         reviews: 117,
//         description:
//             "Aromatherapy diffuser with LED lights and multiple mist settings. Create a relaxing atmosphere in your home or office.",
//         features: [
//             "Ultrasonic technology",
//             "Color-changing LED lights",
//             "Auto shut-off",
//             "Multiple mist settings",
//             "Quiet operation",
//         ],
//         inStock: true,
//         featured: true,
//         discount: 20,
//         isNew: false,
//     },
// ];
// console.log(dummyProducts);

const dummyProducts = JSON.parse(
    document.getElementById("clear-filters").getAttribute("data-products")
);
console.log(dummyProducts);

// Load featured products on homepage
function loadFeaturedProducts() {
    const featuredProductsContainer =
        document.getElementById("featured-products");
    if (!featuredProductsContainer) return;

    const featuredProducts = dummyProducts.filter(
        (product) => product.featured
    );

    // Clear container
    featuredProductsContainer.innerHTML = "";

    // Add products
    featuredProducts.forEach((product) => {
        const productCard = createProductCard(product);
        featuredProductsContainer.appendChild(productCard);
    });
}

// Load products on products page
function loadProducts() {
    const productsContainer = document.getElementById("products-container");
    if (!productsContainer) return;

    // Get filter values
    const categorySelect = document.getElementById("category-filter");
    const priceRange = document.getElementById("price-range");
    const sortBy = document.getElementById("sort-by");
    const searchInput = document.getElementById("product-search-input");

    let filteredProducts = [...dummyProducts];

    // Apply category filter
    if (categorySelect && categorySelect.value !== "all") {
        filteredProducts = filteredProducts.filter(
            (product) => product.category.category === categorySelect.value
        );
    }

    // Apply price filter
    if (priceRange && priceRange.value) {
        const maxPrice = parseInt(priceRange.value, 10);
        filteredProducts = filteredProducts.filter(
            (product) => product.price <= maxPrice
        );
    }

    // Apply search filter
    if (searchInput && searchInput.value.trim() !== "") {
        const searchTerm = searchInput.value.trim().toLowerCase();
        filteredProducts = filteredProducts.filter(
            (product) =>
                product.name.toLowerCase().includes(searchTerm) ||
                product.category.category.toLowerCase().includes(searchTerm) ||
                product.description.toLowerCase().includes(searchTerm)
        );
    }

    // Apply URL query parameters (for category links from homepage)
    const urlParams = new URLSearchParams(window.location.search);
    const categoryParam = urlParams.get("category");
    const discountParam = urlParams.get("discount");

    if (categoryParam) {
        filteredProducts = filteredProducts.filter(
            (product) => product.category.category === categoryParam
        );
        if (categorySelect) {
            categorySelect.value = categoryParam;
        }
    }

    if (discountParam === "true") {
        filteredProducts = filteredProducts.filter(
            (product) => product.discount > 0
        );
    }

    // Apply sorting
    if (sortBy && sortBy.value) {
        switch (sortBy.value) {
            case "price-low":
                filteredProducts.sort((a, b) => a.price - b.price);
                break;
            case "price-high":
                filteredProducts.sort((a, b) => b.price - a.price);
                break;
            case "rating":
                filteredProducts.sort((a, b) => b.rating - a.rating);
                break;
            case "newest":
                filteredProducts.sort(
                    (a, b) => (b.isNew ? 1 : 0) - (a.isNew ? 1 : 0)
                );
                break;
            default:
                // Default sort by featured
                filteredProducts.sort(
                    (a, b) => (b.featured ? 1 : 0) - (a.featured ? 1 : 0)
                );
        }
    }

    // Update UI
    productsContainer.innerHTML = "";

    if (filteredProducts.length === 0) {
        productsContainer.innerHTML =
            '<div class="no-products">No products found. Try adjusting your filters.</div>';
        return;
    }

    filteredProducts.forEach((product) => {
        const productCard = createProductCard(product);
        productsContainer.appendChild(productCard);
    });

    // Update filter UI elements
    const productCountElement = document.getElementById("product-count");
    if (productCountElement) {
        productCountElement.textContent = filteredProducts.length;
    }

    // Update price range label
    const priceRangeLabel = document.getElementById("price-range-value");
    if (priceRangeLabel && priceRange) {
        priceRangeLabel.textContent = `$${priceRange.value}`;
    }
}

// Create a product card element
function createProductCard(product) {
    const productCard = document.createElement("div");
    productCard.className = "product-card";
    productCard.dataset.id = product.id;

    const discountBadge =
        product.discount > 0
            ? `<span class="product-badge product-discount">-${product.discount}%</span>`
            : "";

    const newBadge = product.isNew
        ? '<span class="product-badge">New</span>'
        : "";

    const oldPriceHtml =
        product.originalPrice > product.price
            ? `<span class="old-price">$${product.originalPrice.toFixed(
                  2
              )}</span>`
            : "";

    const ratingStars = generateRatingStars(product.rating);

    productCard.innerHTML = `
        <div class="product-img">
            <img src="images/${product.product_img}" alt="${product.name}">
            ${discountBadge}
            ${newBadge}
            <div class="product-actions">
                <a href="product-detail.html?id=${
                    product.id
                }" class="action-btn">
                    <i class="fas fa-eye"></i>
                </a>
                <div class="action-btn">
                    <i class="fas fa-heart"></i>
                </div>
                <div class="action-btn">
                    <i class="fas fa-sync-alt"></i>
                </div>
            </div>
        </div>
        <div class="product-info">
            <div class="product-category">${product.category.category}</div>
            <h3 class="product-title">${product.name}</h3>
            <div class="product-price">
                <span class="current-price">$${product.price.toFixed(2)}</span>
                ${oldPriceHtml}
            </div>
            <div class="product-rating">
                <div class="rating-stars">${ratingStars}</div>
                <span class="rating-count">(${product.reviews})</span>
            </div>
            <div class="add-to-cart">
                <button class="add-to-cart-btn">Add to Cart</button>
            </div>
        </div>
    `;

    return productCard;
}

// Generate HTML for rating stars
function generateRatingStars(rating) {
    const fullStars = Math.floor(rating);
    const halfStar = rating % 1 >= 0.5;
    const emptyStars = 5 - fullStars - (halfStar ? 1 : 0);

    let starsHtml = "";

    // Add full stars
    for (let i = 0; i < fullStars; i++) {
        starsHtml += '<i class="fas fa-star"></i>';
    }

    // Add half star if needed
    if (halfStar) {
        starsHtml += '<i class="fas fa-star-half-alt"></i>';
    }

    // Add empty stars
    for (let i = 0; i < emptyStars; i++) {
        starsHtml += '<i class="far fa-star"></i>';
    }

    return starsHtml;
}

// Initialize filter functionality
function initializeFilters() {
    const categorySelect = document.getElementById("category-filter");
    const priceRange = document.getElementById("price-range");
    const sortBy = document.getElementById("sort-by");
    const priceRangeLabel = document.getElementById("price-range-value");
    const clearFiltersButton = document.getElementById("clear-filters");

    // Set initial price range label
    if (priceRangeLabel && priceRange) {
        priceRangeLabel.textContent = `$${priceRange.value}`;
    }

    // Add event listeners
    if (categorySelect) {
        categorySelect.addEventListener("change", loadProducts);
    }

    if (priceRange) {
        priceRange.addEventListener("input", function () {
            if (priceRangeLabel) {
                priceRangeLabel.textContent = `$${this.value}`;
            }
        });

        priceRange.addEventListener("change", loadProducts);
    }

    if (sortBy) {
        sortBy.addEventListener("change", loadProducts);
    }

    if (clearFiltersButton) {
        clearFiltersButton.addEventListener("click", function () {
            if (categorySelect) categorySelect.value = "all";
            if (priceRange) {
                priceRange.value = priceRange.max;
                if (priceRangeLabel) {
                    priceRangeLabel.textContent = `$${priceRange.max}`;
                }
            }
            if (sortBy) sortBy.value = "featured";

            const searchInput = document.getElementById("product-search-input");
            if (searchInput) searchInput.value = "";

            // Remove URL parameters
            window.history.replaceState(
                {},
                document.title,
                window.location.pathname
            );

            loadProducts();
        });
    }
}

// Load product detail
function loadProductDetail(productId) {
    const product = dummyProducts.find((p) => p.id === productId);

    if (!product) {
        window.location.href = "products.html";
        return;
    }

    // Update page title
    document.title = `${product.name} - ShopEase`;

    // Update product detail elements
    const productImage = document.getElementById("product-image");
    const productTitle = document.getElementById("product-title");
    const productPrice = document.getElementById("product-price");
    const productOldPrice = document.getElementById("product-old-price");
    const productRating = document.getElementById("product-rating");
    const productReviews = document.getElementById("product-reviews");
    const productDescription = document.getElementById("product-description");
    const productFeatures = document.getElementById("product-features");
    const productCategory = document.getElementById("product-category");
    const productQuantityInput = document.getElementById("product-quantity");
    const addToCartButton = document.getElementById("add-to-cart-button");

    if (productImage) productImage.src = product.image;
    if (productTitle) productTitle.textContent = product.name;
    if (productPrice) productPrice.textContent = `$${product.price.toFixed(2)}`;

    if (productOldPrice) {
        if (product.originalPrice > product.price) {
            productOldPrice.textContent = `$${product.originalPrice.toFixed(
                2
            )}`;
            productOldPrice.style.display = "inline-block";
        } else {
            productOldPrice.style.display = "none";
        }
    }

    if (productRating)
        productRating.innerHTML = generateRatingStars(product.rating);
    if (productReviews)
        productReviews.textContent = `(${product.reviews} reviews)`;
    if (productDescription)
        productDescription.textContent = product.description;
    if (productCategory)
        productCategory.textContent = product.category.category;

    if (productFeatures) {
        productFeatures.innerHTML = "";
        product.features.forEach((feature) => {
            const li = document.createElement("li");
            li.textContent = feature;
            productFeatures.appendChild(li);
        });
    }

    // Add to cart functionality
    if (addToCartButton && productQuantityInput) {
        addToCartButton.addEventListener("click", function () {
            const quantity = parseInt(productQuantityInput.value, 10);
            if (quantity > 0) {
                addToCart(
                    product.id,
                    product.name,
                    product.price,
                    product.image,
                    quantity
                );
                showNotification(`${product.name} added to cart!`, "success");
            }
        });
    }

    // Product quantity buttons
    const decreaseBtn = document.querySelector(".quantity-btn.decrease");
    const increaseBtn = document.querySelector(".quantity-btn.increase");

    if (decreaseBtn && increaseBtn && productQuantityInput) {
        decreaseBtn.addEventListener("click", function () {
            const currentValue = parseInt(productQuantityInput.value, 10);
            if (currentValue > 1) {
                productQuantityInput.value = currentValue - 1;
            }
        });

        increaseBtn.addEventListener("click", function () {
            const currentValue = parseInt(productQuantityInput.value, 10);
            productQuantityInput.value = currentValue + 1;
        });

        productQuantityInput.addEventListener("change", function () {
            if (this.value < 1) {
                this.value = 1;
            }
        });
    }

    // Related products
    loadRelatedProducts(product.category.category, product.id);
}

// Load related products
function loadRelatedProducts(category, currentProductId) {
    const relatedProductsContainer =
        document.getElementById("related-products");
    if (!relatedProductsContainer) return;

    const relatedProducts = dummyProducts
        .filter((p) => p.category === category && p.id !== currentProductId)
        .slice(0, 4);

    relatedProductsContainer.innerHTML = "";

    relatedProducts.forEach((product) => {
        const productCard = createProductCard(product);
        relatedProductsContainer.appendChild(productCard);
    });
}
