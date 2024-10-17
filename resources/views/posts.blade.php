<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Site</title>
    <link rel="stylesheet" href="/app.css">
</head>
<body>
<div class="main">

    <?php foreach ($posts as $post) : ?>
        <article>
            <?= $post; ?>
        </article>
    <?php endforeach; ?>

  
    <h1><a href="/post/my-first-post">First</a></h1>
    <p>Sample description.</p>
   

</div>
</body>
</html>