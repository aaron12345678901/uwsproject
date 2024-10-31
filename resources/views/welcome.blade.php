<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Recipe Site</title>
</head>
<body class="bg-gradient-to-br from-purple-400 to-red-300 text-gray-900 font-sans">

    <!-- Header Section -->
    <div class="header-main flex items-center justify-center p-8 shadow-lg bg-white">
        <div class="logo mr-4">
            <img src="{{ asset('images/logo.png') }}" alt="Logo of Recipe Site" class="w-16 h-16">
        </div>
        <h1 class="text-5xl font-bold text-purple-800">Recipe</h1>
    </div>

    <!-- Welcome Text Section -->
    <div class="welcome-text max-w-4xl mx-auto text-center mt-12 p-8 bg-white rounded-lg shadow-lg">
        <h1 class="text-4xl font-semibold text-pink-700 mb-4">Welcome</h1>
        <p class="text-lg leading-relaxed text-gray-700">
            Welcome to Recipe, your ultimate destination for discovering and sharing delicious recipes! Whether you're 
            a seasoned chef or a beginner in the kitchen, our platform offers a diverse collection of user-generated 
            recipes, culinary tips, and cooking inspiration from home cooks around the world. Join our community to 
            explore, create, and share your favorite dishes, and make cooking an enjoyable adventure for everyone. 
            Let's bring people together through the joy of cooking!
        </p>
    </div>

   

    <!-- Action Buttons Section -->
    <div class="mt-10 flex justify-center space-x-4">
        <a href="{{ route('login') }}" class="px-6 py-3 text-lg text-white font-semibold bg-blue-600 rounded-full hover:bg-blue-700 transition-colors shadow-lg">
            Log In
        </a>
        <a href="{{ route('register') }}" class="px-6 py-3 text-lg text-white font-semibold bg-green-600 rounded-full hover:bg-green-700 transition-colors shadow-lg">
            Register
        </a>
    </div>

</body>
</html>