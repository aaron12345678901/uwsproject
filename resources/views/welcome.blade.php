<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    
   
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
    <title>Recipe Site</title> 
</head>
<body>

    <!-- Header Section -->
    <header class="header-main">
        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="Logo of Recipe Site"> 
        </div>
        <h1>Recipe</h1> 
    </header>

     <!-- Action Buttons Section -->
     <div class="action-buttons">
        <a href="{{ route('login') }}" class="button button-login">Log In</a> 
        <a href="{{ route('register') }}" class="button button-register">Register</a> 
    </div>

    <div class="normal-user-button">
        <a href="{{ route('public_dashboard') }}" class="button">Enter to View Recipes</a>
    </div>

    <!-- Welcome Text Section -->
    <main class="welcome-text">
        <h1>Welcome</h1> 
        <p>
            Welcome to Recipe, your ultimate destination for discovering and sharing delicious recipes! Whether you're 
            a seasoned chef or a beginner in the kitchen, our platform offers a diverse collection of user-generated 
            recipes, culinary tips, and cooking inspiration from home cooks around the world. Join our community to 
            explore, create, and share your favorite dishes, and make cooking an enjoyable adventure for everyone. 
            Let's bring people together through the joy of cooking!
        </p> 
    </main>

  
</body>
</html>