@extends('layout')

@section('content')


<div class="main">

    @foreach ($posts as $post)
        <article>
          <h1> 
            
            <a href="/posts/{{$post->id}}">
            {{ $post->title}}
        </a> 
    
    </h1>
          <div>
           
             {{ $post->excerpt}}

         </div>
        </article>
    @endforeach


</div>
    
@endsection