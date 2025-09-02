<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Noticia') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form action="{{ route('news.update', $news->NewsId) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Title -->
                    <div>
                        <label for="Title" class="block text-sm font-medium text-gray-700">Título</label>
                        <input type="text" name="Title" id="Title" 
                               value="{{ old('Title', $news->Title) }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm 
                                      focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" 
                               required>
                    </div>

                    <!-- Content -->
                    <div>
                        <label for="Content" class="block text-sm font-medium text-gray-700">Contenido</label>
                        <textarea name="Content" id="Content" rows="6"
                                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm 
                                         focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" 
                                  required>{{ old('Content', $news->Content) }}</textarea>
                    </div>

                    <!-- Category -->
                    <div>
                        <label for="Category" class="block text-sm font-medium text-gray-700">Categoría</label>
                        <input type="text" name="Category" id="Category" 
                               value="{{ old('Category', $news->Category) }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm 
                                      focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>

                    <!-- Image URL -->
                    <div>
                        <label for="ImageUrl" class="block text-sm font-medium text-gray-700">URL de Imagen</label>
                        <input type="url" name="ImageUrl" id="ImageUrl" 
                               value="{{ old('ImageUrl', $news->ImageUrl) }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm 
                                      focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>

                    <!-- Published -->
                    <div>
                        <label for="IsPublished" class="block text-sm font-medium text-gray-700">¿Publicado?</label>
                        <select name="IsPublished" id="IsPublished" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm 
                                       focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            <option value="1" {{ old('IsPublished', $news->IsPublished) == 1 ? 'selected' : '' }}>Sí</option>
                            <option value="0" {{ old('IsPublished', $news->IsPublished) == 0 ? 'selected' : '' }}>No</option>
                        </select>
                    </div>

                    <!-- Actions -->
                    <div class="flex items-center space-x-3">
                        <button type="submit" 
                                class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white 
                                       text-sm font-medium rounded-md shadow hover:bg-indigo-700">
                            Actualizar
                        </button>
                        <a href="{{ route('news.index') }}" 
                           class="inline-flex items-center px-4 py-2 bg-gray-500 text-white 
                                  text-sm font-medium rounded-md shadow hover:bg-gray-600">
                            Cancelar
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
