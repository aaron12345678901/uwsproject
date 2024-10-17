<article>
  <h1>title</h1>
  <h1><?= e($post->title); ?></h1> <!-- Display the title -->
  <h1>excerpt</h1>
  <p><?= e($post->excerpt); ?></p> <!-- Display the excerpt -->
  <h1>date</h1>
  <time><?= e($post->date); ?></time> <!-- Display the date -->
  <div><h1>body</h1>
      <?= $post->body; ?> <!-- Display the body of the post -->
  </div>
</article>

<a href="/">go back</a>