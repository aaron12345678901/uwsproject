<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> <!-- Set language dynamically based on locale -->
<head>
    <meta charset="utf-8"> <!-- Character encoding for Unicode -->
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Responsive view settings -->
    <title>Register</title> <!-- Page title -->

    <!-- Link to compiled CSS file using Laravel Mix -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body class="antialiased"> <!-- Apply antialiasing for smoother fonts -->
    <div class="flex flex-col items-center justify-center min-h-screen py-6 bg-gray-100"> <!-- Centered, full-height container with background color -->

        <!-- Header for Registration -->
        <div>
            <h1 class="text-4xl font-bold text-gray-800">Register</h1> <!-- Main title for the page -->
        </div>

        <!-- Registration Form -->
        <div class="mt-6">
            <form method="POST" action="{{ route('register') }}"> <!-- Form POSTing to the register route -->
                @csrf <!-- CSRF protection for form submission -->

                <!-- Name Field -->
                <div>
                    <label for="name">Name</label>
                    <input type="text" name="name" required autofocus> <!-- Required name input -->
                </div>

                <!-- Email Field -->
                <div>
                    <label for="email">Email</label>
                    <input type="email" name="email" required> <!-- Required email input -->
                </div>

                <!-- Password Field -->
                <div>
                    <label for="password">Password</label>
                    <input type="password" name="password" required> <!-- Required password input -->
                </div>

                <!-- Password Confirmation Field -->
                <div>
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" required> <!-- Required confirmation password input -->
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit">Register</button> <!-- Register button to submit the form -->
                </div>
            </form>
        </div>

        <!-- Link to Login Page -->
        <div class="mt-4">
            <a href="{{ route('login') }}">Already have an account? Log in</a> <!-- Link to login page for existing users -->
        </div>
        
    </div>
</body>
</html>