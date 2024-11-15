@extends('layout') <!-- Extends the main layout of the application -->

<!-- Link to external CSS file for styling -->
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

@section('content') <!-- Begin the content section -->

<div class="container"> <!-- Main container for the recipe card content -->
    <article class="recipe-card"> <!-- Recipe card styling for visual appeal -->
        
        {{-- Author Information --}}
        <p class="author-info">Author: 
            <a href="/authors/{{ $recipe->author->id }}" class="author-link">
                {{ $recipe->author->name }}
            </a>
        </p>

        {{-- Recipe Title --}}
        <h1 class="recipe-title">Recipe Title</h1>
        <h2 class="recipe-name">
            {!! $recipe->title !!} <!-- Display recipe title, allowing for any HTML content -->
        </h2>

        {{-- Recipe Excerpt --}}
        <h3 class="section-title">Recipe Excerpt</h3>
        <p class="recipe-excerpt">{{ $recipe->excerpt }}</p> <!-- Display recipe summary -->

        {{-- Category --}}
        <h3 class="section-title">Category</h3>
        <p>
            <a href="/categories/{{ $recipe->category->slug }}" class="category-link">
                {{ $recipe->category->name }} <!-- Link to the recipe category page -->
            </a>
        </p>

        {{-- Recipe Body --}}
        <h3 class="section-title">Recipe Details</h3>
        <div class="recipe-body">{!! $recipe->body !!}</div> <!-- Display full recipe details, allowing HTML content -->

        {{-- Back Link --}}
        <div class="back-link">
            <a href="/" class="back-link-text">
                ← Go back <!-- Link to return to the homepage -->
            </a>
        </div>

    </article>
</div>

@endsection <!-- End the content section -->