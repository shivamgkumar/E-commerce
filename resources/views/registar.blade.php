<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Register - ShopEase</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    @include('include')
    <style>
        /* Additional CSS for register page */
        .auth-section {
            padding: 60px 0;
        }
        
        .auth-container {
            max-width: 450px;
            margin: 0 auto;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 40px;
        }
        
        .auth-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .auth-header h2 {
            font-size: 26px;
            margin-bottom: 10px;
        }
        
        .auth-header p {
            color: #6c757d;
        }
        
        .auth-form .form-group {
            margin-bottom: 20px;
        }
        
        .auth-form label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
        }
        
        .auth-form input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #e9ecef;
            border-radius: 5px;
            font-family: 'Poppins', sans-serif;
        }
        
        .auth-form input:focus {
            outline: none;
            border-color: #3f51b5;
        }
        
        .auth-form .form-check {
            display: flex;
            align-items: flex-start;
            margin-bottom: 20px;
        }
        
        .auth-form .form-check input {
            width: auto;
            margin-right: 10px;
            margin-top: 3px;
        }
        
        .auth-form button {
            width: 100%;
            padding: 12px;
            background-color: #3f51b5;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        .auth-form button:hover {
            background-color: #2c3e9e;
        }
        
        .auth-footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e9ecef;
        }
        
        .auth-footer p {
            margin-bottom: 10px;
        }
        
        .auth-footer a {
            color: #3f51b5;
            font-weight: 500;
        }
        
        .social-login {
            margin-top: 30px;
        }
        
        .social-login-title {
            text-align: center;
            position: relative;
            margin-bottom: 20px;
        }
        
        .social-login-title::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            width: 45%;
            height: 1px;
            background-color: #e9ecef;
        }
        
        .social-login-title::after {
            content: '';
            position: absolute;
            right: 0;
            top: 50%;
            width: 45%;
            height: 1px;
            background-color: #e9ecef;
        }
        
        .social-login-buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
        }
        
        .social-login-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #f8f9fa;
            color: #6c757d;
            font-size: 20px;
            transition: all 0.3s;
        }
        
        .social-login-btn:hover {
            transform: translateY(-3px);
        }
        
        .social-login-btn.facebook:hover {
            background-color: #3b5998;
            color: white;
        }
        
        .social-login-btn.google:hover {
            background-color: #db4437;
            color: white;
        }
        
        .social-login-btn.twitter:hover {
            background-color: #1da1f2;
            color: white;
        }
        
        .password-strength {
            height: 5px;
            margin-top: 5px;
            background-color: #e9ecef;
            border-radius: 3px;
            position: relative;
            overflow: hidden;
        }
        
        .password-strength::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 0;
            transition: width 0.3s;
        }
        
        .password-strength.weak::before {
            width: 33%;
            background-color: #dc3545;
        }
        
        .password-strength.medium::before {
            width: 66%;
            background-color: #ffc107;
        }
        
        .password-strength.strong::before {
            width: 100%;
            background-color: #28a745;
        }
    </style>
</head>
<body>
    
     <!-- header section -->
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
                <li><a href="{{ route('category.page') }}">Categories</a></li>
                <li><a href="#">Deals</a></li>
                <li><a href="{{ route('login.page') }}" class="active">Login / Register</a></li>
                <li><a href="{{ route('cart.page') }}">Cart</a></li>
            </ul>
        </nav>
    </div>

    <!-- Page Title -->
    <section class="page-title">
        <div class="container">
            <h1>Register</h1>
            <div class="breadcrumb">
                <a href="{{ route('registar.page') }}">Home</a> / <span>Register</span>
            </div>
        </div>
    </section>

    <!-- Register Section -->
    <section class="auth-section">
        <div class="container">
            <div class="auth-container">
                <div class="auth-header">
                    <h2>Create an Account</h2>
                    <p>Join ShopEase to enjoy a personalized shopping experience.</p>
                </div>
                
                <form id="register-form" class="auth-form">
                    <div class="form-group">
                        <label for="register-name">Full Name</label>
                        <input type="text" id="register-name" name="name" placeholder="Enter your full name" required>
                    </div>
                    <div class="form-group">
                        <label for="register-email">Email Address</label>
                        <input type="email" name="email" id="register-email" placeholder="Enter your email" required>
                    </div>
                    <div class="form-group">
                        <label for="register-password">Password</label>
                        <input type="password" name="password" id="register-password" placeholder="Create a password" required>
                        <div class="password-strength" id="password-strength"></div>
                    </div>
                    <div class="form-group">
                        <label for="register-confirm-password">Confirm Password</label>
                        <input type="password" id="register-confirm-password" placeholder="Confirm your password" required>
                    </div>
                    
                    <div class="form-check">
                        <input type="checkbox" id="terms-agreement" required>
                        <label for="terms-agreement">I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a></label>
                    </div>
                    
                    <button type="submit">Create Account</button>
                </form>
                
                <div class="social-login">
                    <div class="social-login-title">
                        <span>Or sign up with</span>
                    </div>
                    <div class="social-login-buttons">
                        <a href="#" class="social-login-btn facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-login-btn google">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-login-btn twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </div>
                </div>
                
                <div class="auth-footer">
                    <p>Already have an account? <a href="{{ route('login.page') }}">Login</a></p>
                </div>
            </div>
        </div>
    </section>

      <div id="indexpage">
        {{ route('login.page') }}
    </div>

    <!-- Footer -->
     @include('footer')
     @include('include_js')


    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/auth.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Password strength indicator
            const passwordInput = document.getElementById('register-password');
            const strengthIndicator = document.getElementById('password-strength');
            
            if (passwordInput && strengthIndicator) {
                passwordInput.addEventListener('input', function() {
                    const password = this.value;
                    let strength = 0;
                    
                    // Check password length
                    if (password.length >= 8) {
                        strength += 1;
                    }
                    
                    // Check for mixed case
                    if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) {
                        strength += 1;
                    }
                    
                    // Check for numbers
                    if (password.match(/([0-9])/)) {
                        strength += 1;
                    }
                    
                    // Check for special characters
                    if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) {
                        strength += 1;
                    }
                    
                    // Update strength indicator
                    strengthIndicator.className = 'password-strength';
                    
                    if (password.length === 0) {
                        // Empty password
                        strengthIndicator.className = 'password-strength';
                    } else if (strength < 2) {
                        // Weak password
                        strengthIndicator.className = 'password-strength weak';
                    } else if (strength < 4) {
                        // Medium strength password
                        strengthIndicator.className = 'password-strength medium';
                    } else {
                        // Strong password
                        strengthIndicator.className = 'password-strength strong';
                    }
                });
            }
            
            // Password match validation
            const confirmPassword = document.getElementById('register-confirm-password');
            
            if (passwordInput && confirmPassword) {
                confirmPassword.addEventListener('input', function() {
                    if (this.value !== passwordInput.value) {
                        this.setCustomValidity('Passwords do not match');
                    } else {
                        this.setCustomValidity('');
                    }
                });
            }
        });
    </script>
</body>
</html>
