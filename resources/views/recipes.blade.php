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
    @foreach ($recipes as $recipe)
        <article>
            <h1>
                <a href="/recipes/{{ $recipe->slug }}">
                    {{ $recipe->title }}
                </a>
            </h1>
            <div>
                {{ $recipe->excerpt }}
            </div>
        </article>
    @endforeach

    <h1><a href="/">home</a></h1>
    <p>go back</p>
</div>
</body>
</html>