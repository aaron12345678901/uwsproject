@extends('layout')

@section('content')
    <h1>Create a New Recipe</h1>
    <form action="{{ route('recipes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" required>
        </div>
        <div>
            <label for="excerpt">Excerpt</label>
            <textarea name="excerpt" id="excerpt" required></textarea>
        </div>
        <div>
            <label for="body">Body</label>
            <textarea name="body" id="body" required></textarea>
        </div>
        <div>
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="image">Image</label>
            <input type="file" name="image" id="image" accept="image/*">
        </div>
        <button type="submit">Create Recipe</button>
    </form>
@endsection