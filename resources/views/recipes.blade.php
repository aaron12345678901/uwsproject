@extends('layout') 


<link rel="stylesheet" href="{{ asset('css/app.css') }}">

  <!-- Header Section -->
  <header class="header-main">
    <div class="logo">
        <img src="{{ asset('images/logo.png') }}" alt="Logo of Recipe Site"> 
    </div>
    <h1>Recipe</h1> 
</header>

<div class="back-link-category">
    <a href="{{ url()->previous() }}" class="back-link-text-category">
        ← Go back 
    </a>
</div>

@section('content') 

<div class="main"> <!-- Main container for listing all recipes -->
    @foreach ($recipes as $recipe) <!-- Loop through each recipe -->
    <div class="recipes-articles"> 
        <article class="recipe-card"> 


              {{-- Recipe Image --}}
              <div class="image-container"> 
                @if ($recipe->image)
                    <!-- Display the recipe image, fallback to default logo if image fails to load -->
                    <img src="{{ asset('storage/' . $recipe->image) }}" alt="{{ $recipe->title }}" class="recipe-image" onerror="this.onerror=null; this.src='{{ asset('images/logo.png') }}';">
                @else
                    <img src="{{ asset('images/logo.png') }}" alt="Fallback logo" class="recipe-image"> 
                @endif
            </div>

            {{-- Author Information --}}
            <p class="author">Author by
                <a href="/authors/{{ $recipe->author->id }}">{{ $recipe->author->name }}</a>
            </p>

           
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
                <p>{{ $recipe->excerpt }}</p> 
            </div>

         
            
        </article>
    </div>
    @endforeach

    <div class="back-link-category">
        <a href="{{ url()->previous() }}" class="back-link-text-category">
            ← Go back 
        </a>
    </div>
</div>

@endsection 