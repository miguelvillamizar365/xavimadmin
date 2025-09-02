<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create News') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('news.update', $news->NewsId) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="Title" class="form-label">Title</label>
                        <input type="text" name="Title" class="form-control" value="{{ old('Title', $news->Title) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="Content" class="form-label">Content</label>
                        <textarea name="Content" class="form-control" rows="6" required>{{ old('Content', $news->Content) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="Category" class="form-label">Category</label>
                        <input type="text" name="Category" class="form-control" value="{{ old('Category', $news->Category) }}">
                    </div>

                    <div class="mb-3">
                        <label for="ImageUrl" class="form-label">Image URL</label>
                        <input type="url" name="ImageUrl" class="form-control" value="{{ old('ImageUrl', $news->ImageUrl) }}">
                    </div>

                    <div class="mb-3">
                        <label for="IsPublished" class="form-label">Published?</label>
                        <select name="IsPublished" class="form-select">
                            <option value="1" {{ old('IsPublished', $news->IsPublished) == 1 ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ old('IsPublished', $news->IsPublished) == 0 ? 'selected' : '' }}>No</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('news.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
