<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Set character encoding and viewport settings for mobile responsiveness -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    
    <!-- Link to the app's CSS file for styling -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>



<body class="bg-gradient"> <!-- Body with background gradient for aesthetic effect -->
    <div class="login-wrapper"> <!-- Wrapper to center the login content on the page -->
        <div class="login-container"> <!-- Container for the login form and related content -->
            <h1 class="title">Welcome Back!</h1>
            <p class="subtitle">Please log in to your account.</p>

            <!-- Login form with POST method to handle login submission -->
            <form method="POST" action="{{ route('login') }}">
                @csrf <!-- CSRF token for security -->
                
                <!-- Email input field -->
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" required autofocus placeholder="you@example.com">
                </div>
                
                <!-- Password input field -->
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" required placeholder="••••••••">
                </div>
                
                <!-- Login button to submit the form -->
                <div class="button-group">
                    <button type="submit" class="submit-button">Log In</button>
                </div>
            </form>

            {{-- <!-- Link to registration page for users who don't have an account -->
            <div class="register-link">
                <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
            </div> --}}
        </div>
    </div>
</body>
</html>