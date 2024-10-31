<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-r from-purple-400 via-pink-300 to-red-300">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg sm:rounded-lg p-8">
                
                {{-- Dashboard content --}}
                <div class="mb-6">
                    <h3 class="text-4xl font-bold text-gray-800">Latest Recipes</h3>
                    <p class="text-gray-600">Discover the newest additions below</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($recipes as $recipe)
                        <div class="bg-white p-6 rounded-lg shadow-md transition-transform duration-300 hover:shadow-xl hover:scale-105">
                            <article class="space-y-3">
                                <p class="text-sm text-gray-600">by 
                                    <a href="/authors/{{ $recipe->author->id }}" class="text-red-500 font-semibold hover:text-red-700 transition-colors">
                                        {{ $recipe->author->name }}
                                    </a>
                                </p>
                                
                                <h2 class="text-2xl font-semibold text-gray-800">
                                    <a href="/recipes/{{ $recipe->id }}" class="hover:text-red-500 transition-colors">
                                        {{ $recipe->title }}
                                    </a>
                                </h2>

                                <p class="text-gray-700">
                                    Category: 
                                    <a href="/categories/{{ $recipe->category->slug }}" class="text-red-500 font-semibold hover:text-red-700 transition-colors">
                                        {{ $recipe->category->name }}
                                    </a>
                                </p>

                                <div class="text-gray-700">
                                    <p class="text-sm font-semibold text-gray-600">Excerpt:</p>  
                                    <p class="text-gray-500">{{ $recipe->excerpt }}</p>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>

                <div class="mt-8 text-center">
                    <a href="/" class="text-red-500 text-lg font-semibold hover:text-red-700 transition-colors">
                        ← Back to Home
                    </a>
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>