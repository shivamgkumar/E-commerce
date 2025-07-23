<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - ShopEase</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
     <link rel="stylesheet" href={{asset("css/style.css")}}>
    <link rel="stylesheet" href={{ asset('css/responsive.css') }}>
    <style>
        /* Additional CSS for login page */
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
            align-items: center;
            margin-bottom: 20px;
        }
        
        .auth-form .form-check input {
            width: auto;
            margin-right: 10px;
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
        
        .forgot-password {
            text-align: right;
            margin-bottom: 20px;
        }
        
        .forgot-password a {
            color: #6c757d;
            font-size: 14px;
        }
        
        .forgot-password a:hover {
            color: #3f51b5;
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
            <h1>Login</h1>
            <div class="breadcrumb">
                <a href="../index.html">Home</a> / <span>Login</span>
            </div>
        </div>
    </section>

    <!-- Login Section -->
    <section class="auth-section">
        <div class="container">
            <div class="auth-container">
                <div class="auth-header">
                    <h2>Login to Your Account</h2>
                    <p>Welcome back! Please enter your details to access your account.</p>
                </div>
                
                <form id="login-form" class="auth-form">
                    <div class="form-group">
                        <label for="login-email">Email Address</label>
                        <input type="email" id="login-email" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="form-group">
                        <label for="login-password">Password</label>
                        <input type="password" id="login-password" name="email" placeholder="Enter your password" required>
                    </div>
                    
                    <div class="form-options">
                        <div class="form-check">
                            <input type="checkbox" id="remember-me">
                            <label for="remember-me">Remember me</label>
                        </div>
                        <div class="forgot-password">
                            <a href="#">Forgot password?</a>
                        </div>
                    </div>
                    
                    <button type="submit">Login</button>
                </form>
                
                <div class="social-login">
                    <div class="social-login-title">
                        <span>Or login with</span>
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
                    <p>Don't have an account? <a href="{{ route('registar.page') }}">Register</a></p>
                </div>
            </div>
        </div>
    </section>
       <div id="indexpage">
        {{ route('index.page') }}
    </div>

  @if (session('flash_message'))
    <div id="logout_session" data-message="{{ session('flash_message') }}" style="display: none;"></div>
@endif


    <!-- Footer -->
    @include('footer')
    @include('include_js')


    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset("js/auth.js") }}"></script>
</body>
</html>
