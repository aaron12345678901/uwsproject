
@extends('layout')

@section('content')


<div class="main">

    <div class="main">
        @foreach ($recipes as $recipe)
            <article>
                <h1>
                    <a href="/recipes/{{ $recipe->id }}">
                        {{ $recipe->title }}
                    </a>
                </h1>

                <p><a href="/categories/{{$recipe->Category->slug}}">{{ $recipe->Category->name }}</a></p>
                <div>
                    {{ $recipe->excerpt }}
                </div>
            </article>
        @endforeach
    
        <h1><a href="/">home</a></h1>
        <p>go back</p>
    </div>
    
@endsection