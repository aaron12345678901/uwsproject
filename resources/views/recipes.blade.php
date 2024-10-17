<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Site</title>
    <link rel="stylesheet" href="/app.css">
</head>
<body>
<div class="main">
    <?php foreach ($recipes as $recipe) : ?>
        <article>
            <?= $recipe; ?>
        </article>
    <?php endforeach; ?>

    <h1><a href="/">First</a></h1>
    <p>go back</p>
</div>
</body>
</html>