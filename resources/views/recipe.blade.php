
@extends('layout')

@section('content')

<div class="max-w-5xl mx-auto bg-gradient-to-r from-purple-500 via-pink-500 to-red-500 p-8 rounded-lg shadow-lg mt-12">
    <article class="bg-white p-8 rounded-lg shadow-md space-y-6">
        
        {{-- Author Information --}}
        <p class="text-sm text-pink-700">Author: 
            <a href="/authors/{{ $recipe->author->id }}" class="text-red-600 font-semibold hover:text-purple-600 transition-colors">
                {{ $recipe->author->name }}
            </a>
        </p>

        {{-- Recipe Title --}}
        <h1 class="text-4xl font-bold text-purple-800">
            Recipe Title
        </h1>
        <h2 class="text-3xl font-semibold text-pink-800">
            {!! $recipe->title !!}
        </h2>

        {{-- Recipe Excerpt --}}
        <h3 class="text-2xl font-semibold text-purple-700 mt-6">Recipe Excerpt</h3>
        <p class="text-gray-700 text-lg">{{ $recipe->excerpt }}</p>

        {{-- Category --}}
        <h3 class="text-2xl font-semibold text-purple-700 mt-6">Category</h3>
        <p>
            <a href="/categories/{{ $recipe->category->slug }}" class="text-pink-700 font-semibold hover:text-red-600 transition-colors">
                {{ $recipe->category->name }}
            </a>
        </p>

        {{-- Recipe Body --}}
        <h3 class="text-2xl font-semibold text-purple-700 mt-6">Recipe Details</h3>
        <div class="text-gray-800 text-lg space-y-4">{!! $recipe->body !!}</div>

        {{-- Back Link --}}
        <div class="mt-8">
            <a href="/" class="text-lg text-pink-700 font-semibold hover:text-purple-700 transition-colors">
                ← Go back
            </a>
        </div>

    </article>
</div>

@endsection