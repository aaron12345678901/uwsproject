
@extends('layout')

@section('content')


<div class="main">

    <div class="main">
        @foreach ($recipes as $recipe)
        <div class="recipes-articals">
            <article>
                <p>author by <a href="/authors/{{ $recipe->author->id }}">{{ $recipe->author->name }}</a></p>
                <h1>  title:
                    <a href="/recipes/{{ $recipe->id }}">
                        {{ $recipe->title }}
                    </a>
                </h1>

                <p>category:<a href="/categories/{{$recipe->Category->slug}}">{{ $recipe->Category->name }}</a></p>
                <div>
                  <p>excerpt:</p>  {{ $recipe->excerpt }}
                </div>
            </article>

            </div>
        @endforeach
    
        <h1><a href="/">home</a></h1>
        <p>go back</p>
    </div>
    
@endsection