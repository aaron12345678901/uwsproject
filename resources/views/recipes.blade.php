@extends('layout') <!-- Extend the main layout of the application -->

<!-- Link to the CSS file for custom styling -->
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

@section('content') <!-- Begin the content section -->

<div class="main"> <!-- Main container for listing all recipes -->
    @foreach ($recipes as $recipe) <!-- Loop through each recipe -->
    <div class="recipes-articles"> <!-- Wrapper for each recipe article -->
        <article class="recipe-card"> <!-- Card styling for each individual recipe -->

            {{-- Author Information --}}
            <p class="author">Author by 
                <a href="/authors/{{ $recipe->author->id }}">{{ $recipe->author->name }}</a>
            </p>

            {{-- Recipe Title --}}
            <h1 class="recipe-title">
                Title: 
                <a href="/recipes/{{ $recipe->id }}">{{ $recipe->title }}</a> <!-- Link to the recipe's detailed page -->
            </h1>

            {{-- Category --}}
            <p class="category">
                Category: 
                <a href="/categories/{{ $recipe->Category->slug }}">{{ $recipe->Category->name }}</a> <!-- Link to category page -->
            </p>

            {{-- Excerpt --}}
            <div class="excerpt">
                <p>Excerpt:</p>
                <p>{{ $recipe->excerpt }}</p> <!-- Short description or summary of the recipe -->
            </div>

            {{-- Recipe Image --}}
            <div class="image-container"> 
                @if ($recipe->image)
                    <!-- Display the recipe image, fallback to default logo if image fails to load -->
                    <img src="{{ asset('storage/' . $recipe->image) }}" alt="{{ $recipe->title }}" class="recipe-image" onerror="this.onerror=null; this.src='{{ asset('images/logo.png') }}';">
                @else
                    <img src="{{ asset('images/logo.png') }}" alt="Fallback logo" class="recipe-image"> <!-- Default image if none is provided -->
                @endif
            </div>
            
        </article>
    </div>
    @endforeach

    
    <h1 class="home-link">
        <a href="/">Home</a>
    </h1>

   
    <p class="go-back">Go back</p>
</div>

@endsection <!-- End the content section -->