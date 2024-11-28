

    <header class="header-main">
        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="Logo of Recipe Site"> 
        </div>
        <h1>Recipe</h1> 
    </header>


<x-app-layout>


    
    <x-slot name="header">
        <h2 class="title">{{ __("Welcome Let's Share Some Recipes") }}</h2>
    </x-slot>

    <div class="dashboard-container">
        <div class="dashboard-content">

            {{-- Dashboard content section for displaying latest recipes --}}
            <div class="latest-recipes">
                <h3 class="recipes-title">Latest Recipes</h3>
                <p class="recipes-subtitle">Discover the newest additions below</p>
            </div>

            <!-- Button to navigate to the recipe creation page -->
            <div class="create-recipe-button">
                <a href="{{ route('recipes.create') }}" class="button">Create Recipe</a>
            </div>

           
            <div class="recipes-grid">
                <!-- Loop through each recipe to display its information -->
                @foreach ($recipes as $recipe)
                    <div class="recipe-card">
                        <div class="recipe-image-container">
                                   <!-- Display the recipe image if it exists; otherwise, show a fallback logo -->
        @if ($recipe->image)
            <img src="{{ asset('storage/images/' . basename($recipe->image)) }}" alt="{{ $recipe->title }}" class="recipe-image">
        @else
           <img src="{{ asset('images/logo.png') }}" alt="Fallback logo" class="recipe-image">
        @endif

                        </div>
                        <article class="recipe-details">
                            <!-- Display the author information with a link to their profile -->
                            <p class="author-info">by 
                                <a href="/authors/{{ $recipe->author->id }}" class="author-link">
                                    {{ $recipe->author->name }}
                                </a>
                            </p>

                            <!-- Recipe title with a link to the individual recipe page -->
                            <h2 class="recipe-title">
                                <a href="/recipes/{{ $recipe->id }}" class="recipe-link">
                                    {{ $recipe->title }}
                                </a>
                            </h2>

                            <!-- Display the recipe category with a link to the category page -->
                            <p class="category-info">
                                Category: 
                                <a href="/categories/{{ $recipe->category->slug }}" class="category-link">
                                    {{ $recipe->category->name }}
                                </a>
                            </p>

                            <!-- Excerpt section for displaying a brief description of the recipe -->
                            <div class="excerpt-info">
                                <p class="excerpt-label">Excerpt:</p>  
                                <p class="excerpt-text">{{ $recipe->excerpt }}</p>
                            </div>


                        </article>


                    </div>
                @endforeach
            </div>

            <!-- Link to navigate back to the home page -->
            <div class="back-home">
                <a href="/" class="back-link">← Back to Home</a>
            </div>
            
        </div>
    </div>
</x-app-layout>
