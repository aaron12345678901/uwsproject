<x-app-layout>
    <x-slot name="header">
        <h2 class="users-edit-recipe">
            {{ __('Edit Recipe') }}
        </h2>
    </x-slot>

    <div>
        <div >
            <!-- Recipe edit form -->
            <div class="users-edit-recipe-body">
                <form method="POST" action="{{ route('recipes.update', $recipe->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="user-edit-recipe-title">
                        <label for="title" >Title</label>
                        <input type="text" id="title" name="title" value="{{ $recipe->title }}" 
                               required>
                    </div>

                    <div class="user-edit-recipe-body" >
                        <label for="body" >Body</label>
                        <textarea id="body" name="body" rows="4"  required>{{ $recipe->body }}</textarea>
                    </div>

                    <div class="user-recipe-edit-button" >
                        <button type="submit" >
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>