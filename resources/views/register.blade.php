<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body class="antialiased">
    <div class="flex flex-col items-center justify-center min-h-screen py-6 bg-gray-100">
        <div>
            <h1 class="text-4xl font-bold text-gray-800">Register</h1>
        </div>

        <div class="mt-6">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div>
                    <label for="name">Name</label>
                    <input type="text" name="name" required autofocus>
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="email" name="email" required>
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" name="password" required>
                </div>
                <div>
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" required>
                </div>
                <div>
                    <button type="submit">Register</button>
                </div>
            </form>
        </div>

        <div class="mt-4">
            <a href="{{ route('login') }}">Already have an account? Log in</a>
        </div>
    </div>
</body>
</html>