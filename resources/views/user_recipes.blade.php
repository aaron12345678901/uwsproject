<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>{{ $user->name }}'s Recipes</title> 

  
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar">
        <h1>Recipes by {{ $user->name }}</h1> 
        <a href="{{ route('admin.dashboard') }}" class="back-link">Back to Admin Dashboard</a> <!-- Link to admin dashboard -->
    </nav>

    <!-- Main Content Section -->
    <section class="content">
        <!-- Recipes Table -->
        <table class="recipe-table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Excerpt</th>
                    <th>Body</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through each recipe -->
                @forelse ($recipes as $recipe)
                <tr>
                    <td>{{ $recipe->title }}</td>
                    <td>
                        <form action="{{ route('admin.recipes.update', $recipe) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <select name="category_id" class="category-select">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $recipe->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                    </td>
                    <td><input type="text" name="excerpt" value="{{ $recipe->excerpt }}" class="input-field"></td>
                    <td><textarea name="body" class="textarea-field">{{ $recipe->body }}</textarea></td>

                    <td class="admin-buttons">
                        <button type="submit" class="save-btn">Save</button>
                        </form>
                        <form action="{{ route('admin.recipes.destroy', $recipe) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this recipe?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn-admin">Delete</button>
                        </form>
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="5" class="no-recipes">No recipes found for this user.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </section>
</body>
</html>