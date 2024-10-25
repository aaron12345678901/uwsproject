@extends('layout')

@section('content')


<article>
  <h1>title</h1>
  <h1>{!!$post->title!!}</h1> <!-- Display the title -->


  <h1>excerpt</h1>
  <p>{!!$post->excerpt!!}</p> <!-- Display the excerpt -->
     

  <h1>date</h1>

 {!!$post->date!!} <!-- Display the date -->
          

  <div><h1>body</h1>
    <!-- Display the body of the post -->
      {!! $post->body !!}
      
  </div>
</article>

<a href="/">go back</a>

@endsection