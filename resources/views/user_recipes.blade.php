<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- Set character encoding -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Make layout responsive -->
    <title>{{ $user->name }}'s Recipes</title> <!-- Dynamic title with user's name -->

    <!-- Link to compiled CSS file -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar">
        <h1>Recipes by {{ $user->name }}</h1> <!-- Display user's name -->
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
                        <!-- Recipe Title -->
                        <td>{{ $recipe->title }}</td>
                        
                        <!-- Category Selector -->
                        <td>
                            <form action="{{ route('admin.recipes.update', $recipe) }}" method="POST"> <!-- Form to update recipe -->
                                @csrf <!-- CSRF protection -->
                                @method('PUT') <!-- Specify method as PUT for update -->
                                <select name="category_id" class="category-select"> <!-- Dropdown for categories -->
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $recipe->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                        </td>

                        <!-- Excerpt Field -->
                        <td><input type="text" name="excerpt" value="{{ $recipe->excerpt }}" class="input-field"></td>

                        <!-- Body Field -->
                        <td><textarea name="body" class="textarea-field">{{ $recipe->body }}</textarea></td>

                        <!-- Save Button -->
                        <td>
                                <button type="submit" class="save-btn">Save</button> <!-- Button to submit form -->
                            </form>
                        </td>
                    </tr>
                @empty
                    <!-- Display if no recipes found -->
                    <tr>
                        <td colspan="5" class="no-recipes">No recipes found for this user.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </section>
</body>
</html>