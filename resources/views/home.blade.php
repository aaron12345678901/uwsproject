
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app.css">
    <title>recipe site</title>
</head>
<body>



<div class="header-main">
        <div class="logo"><img src="{{ asset('images/logo.png') }}" alt="Logo of Recipe Site"></div>
        <h1>Recipe</h1>
</div>



<div class="welcome-text">
    <h1>welcome</h1>
    <p>Welcome to Recipe , your ultimate destination for discovering and sharing delicious recipes!
         Whether you're a seasoned chef or a beginner in the kitchen, our platform offers a
          diverse collection of user-generated recipes, culinary tips, and cooking inspiration from 
          home cooks around the world. Join our community to explore, create, and share your favorite dishes
          , and make cooking an enjoyable adventure for everyone. Let's bring people together through the joy 
          of cooking!</p>
</div>

<div class="detail-container">

<div class="login-container">
    <h2>existing user Login</h2>
    <form action="/login" method="POST">
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <button type="submit">Login</button>
        </div>
    </form>
</div>

<div class="register-container">
    <h2>new user register</h2>
    <form action="/register" method="POST">
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <button type="submit">register</button>
        </div>
    </form>
</div>



<h1><a href="recipes"> first</a> </h1>



</div>
</body>
</html>

