<header class="header-main">
    <div class="logo">
        <img src="{{ asset('images/logo.png') }}" alt="Logo of Recipe Site">
    </div>
    <h1>Recipe</h1>
</header>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="profile-body">
       
            <div class="update-username">
                    @include('profile.partials.update-profile-information-form')
            </div>

            <div class="update-password">
               
                    @include('profile.partials.update-password-form')
            </div>

            <div class="delete-account">
                    @include('profile.partials.delete-user-form')
            </div>




            <h1>Your Recipes</h1>


            <!-- Recipes Section -->

<div class="recipe-wraps">
            @foreach($recipes as $recipe)
            <div class="profile-recipe">
                <h2>Title</h2>
                <h4>{{ $recipe->title }}</h4>
                <h3>Recipe</h3>
                <p>{{ $recipe->excerpt }}</p>
                <a href="{{ route('recipes.edit', $recipe->id) }}" class="edit-btn">Edit</a>
            </div>
        @endforeach
</div>

        
    </div>
</x-app-layout>