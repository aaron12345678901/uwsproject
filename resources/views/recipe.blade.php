

@extends('layout')

@section('content')
    



<article>
    <h1>{!! $recipe->title !!}</h1>
   
    <p>{!! $recipe->excerpt !!}</p>
    <p><a href="/categories/{{$recipe->Category->slug}}">{{ $recipe->Category->name }}</a></p>
    <div>{!! $recipe->body !!}</div>
    <a href="/">Go back</a>
</article>


@endsection