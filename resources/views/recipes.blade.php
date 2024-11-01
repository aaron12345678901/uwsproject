@extends('layout')

@section('content')
<div class="main">
    @foreach ($recipes as $recipe)
    <div class="recipes-articals">
        <article>
            <p>author by <a href="/authors/{{ $recipe->author->id }}">{{ $recipe->author->name }}</a></p>
            <h1>title:
                <a href="/recipes/{{ $recipe->id }}">
                    {{ $recipe->title }}
                </a>
            </h1>
            <p>category:<a href="/categories/{{$recipe->Category->slug}}">{{ $recipe->Category->name }}</a></p>
            <div>
                <p>excerpt:</p>  {{ $recipe->excerpt }}
            </div>
            <div style="width: 300px; overflow: hidden;"> 
                @if ($recipe->image)
                    <img src="{{ asset('storage/' . $recipe->image) }}" alt="{{ $recipe->title }}" style="max-width: 100%; height: auto;" onerror="this.onerror=null; this.src='{{ asset('images/logo.png') }}';">
                @else
                    <img src="{{ asset('images/logo.png') }}" alt="Fallback logo" style="max-width: 100%; height: auto;">
                @endif
            </div>
        </article>
    </div>
    @endforeach

    <h1><a href="/">Home</a></h1>
    <p>Go back</p>
</div>
@endsection