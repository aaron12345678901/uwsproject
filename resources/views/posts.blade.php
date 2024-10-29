@extends('layout')

@section('content')


<div class="main">

    @foreach ($posts as $post)
        <article>
          <h1> 
            <p>author by <a href="/authors/{{ $post->author->id }}">{{ $post->author->name }}</a></p>
            <p>Title:</p><a href="/posts/{{$post->id}}">
            {{ $post->title}}
        </a> 
    
    </h1>
<p>category:</p>
    <p><a href="/categories/{{$post->Category->slug}}">{{ $post->Category->name }}</a></p>
          <div>
           <p>excerpt:</p>
             {{ $post->excerpt}}

         </div>
        </article>
    @endforeach


</div>
    
@endsection