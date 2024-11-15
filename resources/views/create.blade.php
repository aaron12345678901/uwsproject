@extends('layout')
<!-- Link to the CSS stylesheet for styling this page -->
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

@section('content')
    <!-- Page title for the recipe creation form -->
    <h1 class="page-title">Create a New Recipe</h1>
    
    <!-- Form for creating a new recipe -->
    <form action="{{ route('recipes.store') }}" method="POST" enctype="multipart/form-data" class="recipe-form">
        <!-- CSRF token for security -->
        @csrf

        <!-- Form group for entering the recipe title -->
        <div class="form-group">
            <label for="title" class="form-label">Title</label>
            <!-- Input field for the recipe title, required field -->
            <input type="text" name="title" id="title" required class="form-input">
        </div>

        <!-- Form group for entering a brief excerpt of the recipe -->
        <div class="form-group">
            <label for="excerpt" class="form-label">Excerpt</label>
            <!-- Textarea for the recipe excerpt, required field -->
            <textarea name="excerpt" id="excerpt" required class="form-textarea"></textarea>
        </div>

        <!-- Form group for entering the main body/content of the recipe -->
        <div class="form-group">
            <label for="body" class="form-label">Body</label>
            <!-- Textarea for the recipe body, required field -->
            <textarea name="body" id="body" required class="form-textarea"></textarea>
        </div>

        <!-- Form group for selecting the category of the recipe -->
        <div class="form-group">
            <label for="category_id" class="form-label">Category</label>
            <!-- Dropdown select for category, required field -->
            <select name="category_id" id="category_id" required class="form-select">
                <!-- Loop through each category and create an option in the dropdown -->
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Form group for uploading an image for the recipe -->
        <div class="form-group">
            <label for="image" class="form-label">Image</label>
            <!-- Input field for file upload, accepts only image files -->
            <input type="file" name="image" id="image" accept="image/*" class="form-input">
        </div>

        <!-- Submit button to create the new recipe -->
        <button type="submit" class="submit-button">Create Recipe</button>
    </form>
@endsection