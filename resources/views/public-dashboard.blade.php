<x-app-layout>
    <!-- Header Section -->
    <header class="header-main">
        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="Logo of Recipe Site"> 
        </div>
        <h1>Recipe</h1> 
    </header>

    <div class="back-link-category">
        <a href="/" class="back-link-text-category">
            Home
        </a>
    </div>

    <!-- Search Bar Section -->
    <div class="search-bar-container">
        <form action="{{ route('public_dashboard') }}" method="GET" class="search-form">
            <input 
                type="text" 
                name="search" 
                placeholder="Search for recipes..." 
                value="{{ request('search') }}" 
                class="search-input"
            >
            <button type="submit" class="search-button">Search</button>
        </form>
    </div>

    <div class="dashboard-container">
        <div class="dashboard-content">
            <!-- Dashboard content section for displaying latest recipes -->
            <div class="latest-recipes">
                <h3 class="recipes-title">Latest Recipes</h3>
                <p class="recipes-subtitle">Discover the newest additions below</p>
            </div>

            <!-- Grid layout for displaying recipe cards -->
            <div class="recipes-grid">
                @forelse ($recipes as $recipe)
                    <div class="recipe-card">
                        <div class="recipe-image-container">
                            <!-- Display the recipe image if it exists; otherwise, show a fallback logo -->
                            @if ($recipe->image)
                                <img src="{{ asset('storage/' . $recipe->image) }}" alt="{{ $recipe->title }}" class="recipe-image">
                            @else
                                <img src="{{ asset('images/logo.png') }}" alt="Fallback logo" class="recipe-image">
                            @endif
                        </div>
                        <article class="recipe-details">
                            <p class="author-info">by 
                                <a href="/authors/{{ $recipe->author->id }}" class="author-link">
                                    {{ $recipe->author->name }}
                                </a>
                            </p>
                            <h2 class="recipe-title">
                                <a href="/recipes/{{ $recipe->id }}" class="recipe-link">
                                    {{ $recipe->title }}
                                </a>
                            </h2>
                            <p class="category-info">
                                Category: 
                                <a href="/categories/{{ $recipe->category->slug }}" class="category-link">
                                    {{ $recipe->category->name }}
                                </a>
                            </p>
                            <div class="excerpt-info">
                                <p class="excerpt-label">Excerpt:</p>  
                                <p class="excerpt-text">{{ $recipe->excerpt }}</p>
                            </div>
                        </article>
                    </div>
                @empty
                    <p class="no-results">No recipes found. Try a different search.</p>
                @endforelse
            </div>

            <div class="back-home">
                <a href="/" class="back-link">← Back to Home</a>
            </div>
        </div>
    </div>
</x-app-layout>