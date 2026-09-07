<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Noticia') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6" id="newsForm">
                    @csrf

                    <!-- Title -->
                    <div>
                        <label for="Title" class="block text-sm font-medium text-gray-700">Título</label>
                        <input type="text" name="Title" id="Title"
                               value="{{ old('Title') }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                               required>
                        @error('Title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Content -->
                    <div>
                        <label for="Content" class="block text-sm font-medium text-gray-700">Contenido</label>
                        <textarea name="Content" id="Content" rows="5"
                                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                  required>{{ old('Content') }}</textarea>
                        @error('Content')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Category -->
                    <div>
                        <label for="Category" class="block text-sm font-medium text-gray-700">Categoría</label>
                        <select name="Category" id="Category"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            <option value="General"        {{ old('Category') == 'General'        ? 'selected' : '' }}>General</option>
                            <option value="Deportes"       {{ old('Category') == 'Deportes'       ? 'selected' : '' }}>Deportes</option>
                            <option value="Tecnología"     {{ old('Category') == 'Tecnología'     ? 'selected' : '' }}>Tecnología</option>
                            <option value="Negocios"       {{ old('Category') == 'Negocios'       ? 'selected' : '' }}>Negocios</option>
                            <option value="Entretenimiento"{{ old('Category') == 'Entretenimiento'? 'selected' : '' }}>Entretenimiento</option>
                        </select>
                        @error('Category')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Image Upload -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Imagen</label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md hover:border-indigo-400 transition-colors">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600">
                                    <label for="imageFile" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500">
                                        <span>Subir una imagen</span>
                                        <input id="imageFile" name="imageFile" type="file" class="sr-only" accept="image/jpeg,image/png,image/jpg,image/gif,image/webp">
                                    </label>
                                    <p class="pl-1">o arrastra y suelta</p>
                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG, GIF, WEBP hasta 5MB</p>
                            </div>
                        </div>
                        <input type="hidden" name="ImageUrl" id="ImageUrl">
                        @error('ImageUrl')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <div id="imagePreview" class="mt-4 hidden">
                            <p class="text-sm font-medium text-gray-700 mb-2">Vista previa:</p>
                            <div class="relative inline-block">
                                <img id="previewImage" src="" alt="Preview" class="max-w-full h-auto max-h-96 rounded-lg border-2 border-gray-200">
                                <button type="button" id="removeImage" class="absolute top-2 right-2 bg-red-600 text-white rounded-full p-2 hover:bg-red-700 shadow-lg">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                            <p class="text-xs text-gray-500 mt-2" id="imageSize"></p>
                        </div>
                    </div>

                    <!-- ── Redes Sociales ─────────────────────────────────── -->
                    <div class="border-t pt-6">
                        <h3 class="text-sm font-semibold text-gray-700 mb-4 uppercase tracking-wide">
                            🔗 Redes Sociales (opcional)
                        </h3>

                        <div class="space-y-4">

                            <!-- Instagram -->
                            <div>
                                <label for="InstagramUrl" class="block text-sm font-medium text-gray-700">
                                    <span class="inline-flex items-center gap-1">
                                        {{-- Instagram icon --}}
                                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
                                        </svg>
                                        URL de Instagram (post o reel)
                                    </span>
                                </label>
                                <input type="url" name="InstagramUrl" id="InstagramUrl"
                                       value="{{ old('InstagramUrl') }}"
                                       placeholder="https://www.instagram.com/p/XXXXXXX/ o /reel/XXXXXXX/"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm">
                                <p class="mt-1 text-xs text-gray-500">
                                    📸 Posts se muestran como embed. 🎬 Reels se muestran como enlace directo (restricción de Instagram).
                                </p>
                                @error('InstagramUrl')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Spotify -->
                            <div>
                                <label for="SpotifyUrl" class="block text-sm font-medium text-gray-700">
                                    <span class="inline-flex items-center gap-1">
                                        {{-- Spotify icon --}}
                                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor" style="color:#1DB954">
                                            <path d="M12 0C5.4 0 0 5.4 0 12s5.4 12 12 12 12-5.4 12-12S18.66 0 12 0zm5.521 17.34c-.24.359-.66.48-1.021.24-2.82-1.74-6.36-2.101-10.561-1.141-.418.122-.779-.179-.899-.539-.12-.421.18-.78.54-.9 4.56-1.021 8.52-.6 11.64 1.32.42.18.479.659.301 1.02zm1.44-3.3c-.301.42-.841.6-1.262.3-3.239-1.98-8.159-2.58-11.939-1.38-.479.12-1.02-.12-1.14-.6-.12-.48.12-1.021.6-1.141C9.6 9.9 15 10.561 18.72 12.84c.361.181.54.78.241 1.2zm.12-3.36C15.24 8.4 8.82 8.16 5.16 9.301c-.6.179-1.2-.181-1.38-.721-.18-.601.18-1.2.72-1.381 4.26-1.26 11.28-1.02 15.721 1.621.539.3.719 1.02.419 1.56-.299.421-1.02.599-1.559.3z"/>
                                        </svg>
                                        URL de Spotify
                                    </span>
                                </label>
                                <input type="url" name="SpotifyUrl" id="SpotifyUrl"
                                       value="{{ old('SpotifyUrl') }}"
                                       placeholder="https://open.spotify.com/track/XXXXXXX"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm">
                                <p class="mt-1 text-xs text-gray-500">
                                    🎵 Soporta track, álbum, playlist y episodio. Se muestra con reproductor precargado.
                                </p>
                                @error('SpotifyUrl')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Facebook -->
                            <div>
                                <label for="FacebookUrl" class="block text-sm font-medium text-gray-700">
                                    <span class="inline-flex items-center gap-1">
                                        {{-- Facebook icon --}}
                                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor" style="color:#1877F2">
                                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                        </svg>
                                        URL de Facebook (post o video)
                                    </span>
                                </label>
                                <input type="url" name="FacebookUrl" id="FacebookUrl"
                                       value="{{ old('FacebookUrl') }}"
                                       placeholder="https://www.facebook.com/watch/?v=XXXXXXX"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                <p class="mt-1 text-xs text-gray-500">
                                    📹 Videos y posts públicos de Facebook se muestran como embed oficial.
                                </p>
                                @error('FacebookUrl')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                    </div>
                    <!-- ── Fin Redes Sociales ─────────────────────────────── -->

                    <!-- Publish -->
                    <div>
                        <label for="IsPublished" class="block text-sm font-medium text-gray-700">¿Publicar?</label>
                        <select name="IsPublished" id="IsPublished"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            <option value="1" {{ old('IsPublished', '1') == '1' ? 'selected' : '' }}>Sí</option>
                            <option value="0" {{ old('IsPublished') == '0' ? 'selected' : '' }}>No</option>
                        </select>
                    </div>

                    <!-- Actions -->
                    <div class="flex items-center space-x-3">
                        <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-green-600 text-white text-sm font-medium rounded-md shadow hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Guardar
                        </button>
                        <a href="{{ route('news.index') }}"
                           class="inline-flex items-center px-4 py-2 bg-gray-500 text-white text-sm font-medium rounded-md shadow hover:bg-gray-600">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Volver
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        const MAX_FILE_SIZE = 5 * 1024 * 1024;
        const imageInput    = document.getElementById('imageFile');
        const imagePreview  = document.getElementById('imagePreview');
        const previewImage  = document.getElementById('previewImage');
        const imageUrlInput = document.getElementById('ImageUrl');
        const removeButton  = document.getElementById('removeImage');
        const imageSizeText = document.getElementById('imageSize');

        imageInput.addEventListener('change', e => {
            const file = e.target.files[0];
            if (file) handleImageFile(file);
        });

        const dropZone = imageInput.closest('.border-dashed');
        ['dragenter','dragover','dragleave','drop'].forEach(ev => dropZone.addEventListener(ev, e => { e.preventDefault(); e.stopPropagation(); }));
        ['dragenter','dragover'].forEach(ev => dropZone.addEventListener(ev, () => dropZone.classList.add('border-indigo-500','bg-indigo-50')));
        ['dragleave','drop'].forEach(ev => dropZone.addEventListener(ev, () => dropZone.classList.remove('border-indigo-500','bg-indigo-50')));
        dropZone.addEventListener('drop', e => {
            const file = e.dataTransfer.files[0];
            if (file && file.type.startsWith('image/')) { imageInput.files = e.dataTransfer.files; handleImageFile(file); }
        });

        function handleImageFile(file) {
            if (!file.type.startsWith('image/')) { alert('Por favor selecciona un archivo de imagen válido'); return; }
            if (file.size > MAX_FILE_SIZE) { alert('La imagen es demasiado grande. El tamaño máximo es 5MB'); return; }
            const reader = new FileReader();
            reader.onload = e => {
                imageUrlInput.value = e.target.result;
                previewImage.src    = e.target.result;
                imagePreview.classList.remove('hidden');
                imageSizeText.textContent = `Tamaño: ${(file.size/(1024*1024)).toFixed(2)}MB - ${file.name}`;
            };
            reader.onerror = () => alert('Error al leer el archivo');
            reader.readAsDataURL(file);
        }

        removeButton.addEventListener('click', () => {
            imageInput.value = '';
            imageUrlInput.value = '';
            previewImage.src = '';
            imagePreview.classList.add('hidden');
            imageSizeText.textContent = '';
        });

        document.getElementById('newsForm').addEventListener('submit', e => {
            const base64Data = imageUrlInput.value;
            if (base64Data && (base64Data.length * 0.75) > MAX_FILE_SIZE) {
                e.preventDefault();
                alert('La imagen es demasiado grande. Por favor selecciona una imagen más pequeña.');
            }
        });
    </script>
    @endpush
</x-app-layout>