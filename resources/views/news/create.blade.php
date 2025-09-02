<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create News') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('news.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="Title" class="form-label">Title</label>
                        <input type="text" name="Title" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="Content" class="form-label">Content</label>
                        <textarea name="Content" class="form-control" rows="5" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="Category" class="form-label">Category</label>
                        <input type="text" name="Category" class="form-control" value="General">
                    </div>

                    <div class="mb-3">
                        <label for="ImageUrl" class="form-label">Image URL</label>
                        <input type="url" name="ImageUrl" class="form-control" value="">
                    </div>

                    <div class="mb-3">
                        <label for="IsPublished" class="form-label">Publish?</label>
                        <select name="IsPublished" class="form-control">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Save</button>
                    <a href="{{ route('news.index') }}" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
