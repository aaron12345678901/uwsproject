@extends('layout') 


<link rel="stylesheet" href="{{ asset('css/app.css') }}">

<header class="header-main">
    <div class="logo">
        <img src="{{ asset('images/logo.png') }}" alt="Logo of Recipe Site"> 
    </div>
    <h1>Recipe</h1> 
</header>



@section('content') 

<div class="container"> <!-- Main container for the recipe card content -->
    <article class="recipe-card"> 
        

        <div class="image-container"> 
            @if ($recipe->image)
                <!-- Display the recipe image, fallback to default logo if image fails to load -->
                <img src="{{ asset('storage/' . $recipe->image) }}" alt="{{ $recipe->title }}" class="recipe-image" onerror="this.onerror=null; this.src='{{ asset('images/logo.png') }}';">
            @else
                <img src="{{ asset('images/logo.png') }}" alt="Fallback logo" class="recipe-image"> <!-- Default image if none is provided -->
            @endif
        </div>


        {{-- Author Information --}}
        <p class="author-info">Author: 
            <a href="/authors/{{ $recipe->author->id }}" class="author-link">
                {{ $recipe->author->name }}
            </a>
        </p>

        {{-- Recipe Title --}}
        <h1 class="recipe-title">Recipe Title</h1>
        <h2 class="recipe-name">
            {!! $recipe->title !!} 
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
        <div class="recipe-body">{!! $recipe->body !!}</div> 

        {{-- Back Link --}}
        <div class="back-link">
            <a href="{{ url()->previous() }}" class="back-link-text">
                ← Go back <!-- Link to return to the homepage -->
            </a>
        </div>

    </article>
</div>

@endsection 