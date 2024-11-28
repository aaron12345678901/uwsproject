<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> 
</head>
<body>

             <!-- Header Section -->
  <header class="header-main">
    <div class="logo">
        <img src="{{ asset('images/logo.png') }}" alt="Logo of Recipe Site"> 
    </div>
    <h1>Recipe</h1> 
</header>

    <div class="bg-gradient"> 
        
        <h1 class="title">Welcome Back!</h1>
        <p class="subtitle">Please log in to your account.</p>
 

            <div class="login-container"> 
                {{ $slot }} 
             </div>

       
    </div>
</body>
</html>