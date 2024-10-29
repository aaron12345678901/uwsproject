

@extends('layout')

@section('content')
    



<article>
    <p>author by <a href="/authors/{{ $recipe->author->id }}">{{ $recipe->author->name }}</a></p>

    <h1>recipe title</h1>
    <h1>{!! $recipe->title !!}</h1>
   <h1>recipe excerpt</h1>
    <p>{!! $recipe->excerpt !!}</p>
    <h1>category</h1>
    <p><a href="/categories/{{$recipe->Category->slug}}">{{ $recipe->Category->name }}</a></p>
    <h1>body</h1>
    <div>{!! $recipe->body !!}</div>
    <a href="/">Go back</a>
</article>


@endsection