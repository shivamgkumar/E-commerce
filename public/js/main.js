document.addEventListener("DOMContentLoaded", function () {
    // Mobile Menu Toggle
    const mobileMenuToggle = document.querySelector(".mobile-menu-toggle");
    const mobileMenu = document.querySelector(".mobile-menu");
    const closeMenu = document.querySelector(".close-menu");
    const body = document.body;

    if (mobileMenuToggle) {
        mobileMenuToggle.addEventListener("click", function () {
            mobileMenu.classList.add("active");
            body.style.overflow = "hidden";
        });
    }

    if (closeMenu) {
        closeMenu.addEventListener("click", function () {
            mobileMenu.classList.remove("active");
            body.style.overflow = "";
        });
    }

    // Carousel Functionality
    initCarousel();

    // Newsletter Form Submission
    const newsletterForm = document.querySelector(".newsletter-form");
    if (newsletterForm) {
        newsletterForm.addEventListener("submit", function (e) {
            e.preventDefault();
            const emailInput = this.querySelector('input[type="email"]');
            if (emailInput.value.trim() === "") {
                showNotification(
                    "Please enter a valid email address.",
                    "error"
                );
                return;
            }

            // In a real application, you would send this to your backend
            // For now, we'll just show a success message
            const data = new FormData(this);
            const token = document
                .getElementById("metaCsrf")
                .getAttribute("content");

            const api = window.location.origin + "/admin/add_sub_user";

            fetch(api, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": token,
                    Accept: "application/json",
                },
                body: data,
            })
                .then((response) => response.json())

                .then((data) => {
                    if (data.success) {
                        showNotification(
                            "Thank you for subscribing to our newsletter!"
                        );
                    } else if (data.error) {
                        showNotification(data.message, (type = "warning"));
                        return;
                    }
                })
                .catch((error) => {
                    console.error(error);
                    // toastr.error(response.message);
                });

            emailInput.value = "";
        });
    }

    // Load cart count from localStorage
    updateCartCount();
});

// Carousel functionality
function initCarousel() {
    const carouselTrack = document.querySelector(".carousel-track");
    const carouselSlides = document.querySelectorAll(".carousel-slide");
    const dots = document.querySelectorAll(".dot");
    const prevButton = document.querySelector(".carousel-arrow.prev");
    const nextButton = document.querySelector(".carousel-arrow.next");

    if (!carouselTrack || carouselSlides.length === 0) return;

    let currentSlide = 0;
    let slideInterval;

    // Set initial position
    updateCarousel();

    // Start automatic sliding
    startAutoSlide();

    // Event listeners for controls
    if (prevButton) {
        prevButton.addEventListener("click", () => {
            prevSlide();
            resetAutoSlide();
        });
    }

    if (nextButton) {
        nextButton.addEventListener("click", () => {
            nextSlide();
            resetAutoSlide();
        });
    }

    dots.forEach((dot, index) => {
        dot.addEventListener("click", () => {
            currentSlide = index;
            updateCarousel();
            resetAutoSlide();
        });
    });

    function updateCarousel() {
        // Update track position
        carouselTrack.style.transform = `translateX(-${currentSlide * 100}%)`;

        // Update active dot
        dots.forEach((dot, index) => {
            dot.classList.toggle("active", index === currentSlide);
        });
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % carouselSlides.length;
        updateCarousel();
    }

    function prevSlide() {
        currentSlide =
            (currentSlide - 1 + carouselSlides.length) % carouselSlides.length;
        updateCarousel();
    }

    function startAutoSlide() {
        slideInterval = setInterval(nextSlide, 5000);
    }

    function resetAutoSlide() {
        clearInterval(slideInterval);
        startAutoSlide();
    }
}

// Show notification
function showNotification(message, type = "success") {
    // Create notification element
    const notification = document.createElement("div");
    notification.className = `notification ${type}`;
    notification.textContent = message;

    // Add to body
    document.body.appendChild(notification);

    // Style the notification
    notification.style.position = "fixed";
    notification.style.bottom = "20px";
    notification.style.right = "20px";
    notification.style.padding = "15px 20px";
    notification.style.borderRadius = "5px";
    notification.style.color = "white";
    notification.style.zIndex = "1000";
    notification.style.opacity = "0";
    notification.style.transform = "translateY(20px)";
    notification.style.transition = "opacity 0.3s, transform 0.3s";

    if (type === "success") {
        notification.style.backgroundColor = "#28a745";
    } else if (type === "error") {
        notification.style.backgroundColor = "#dc3545";
    } else if (type === "warning") {
        notification.style.backgroundColor = "#ffc107";
        notification.style.color = "#343a40";
    }

    // Animate in
    setTimeout(() => {
        notification.style.opacity = "1";
        notification.style.transform = "translateY(0)";
    }, 10);

    // Remove after delay
    setTimeout(() => {
        notification.style.opacity = "0";
        notification.style.transform = "translateY(20px)";

        // Remove from DOM after fade out
        setTimeout(() => {
            document.body.removeChild(notification);
        }, 300);
    }, 3000);
}

// Update cart count badge
function updateCartCount() {
    const cartCountElements = document.querySelectorAll(".cart-count");
    let cart = JSON.parse(localStorage.getItem("cart")) || [];

    let count = 0;
    cart.forEach((item) => {
        count += item.quantity;
    });

    cartCountElements.forEach((element) => {
        element.textContent = count;
    });
}
