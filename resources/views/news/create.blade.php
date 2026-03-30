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
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                      focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                               required>
                        @error('Title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Content -->
                    <div>
                        <label for="Content" class="block text-sm font-medium text-gray-700">Contenido</label>
                        <textarea name="Content" id="Content" rows="5"
                                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                         focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                  required>{{ old('Content') }}</textarea>
                        @error('Content')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Category -->
                    <div>
                        <label for="Category" class="block text-sm font-medium text-gray-700">Categoría</label>
                        <select name="Category" id="Category"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                       focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            <option value="General" {{ old('Category') == 'General' ? 'selected' : '' }}>General</option>
                            <option value="Deportes" {{ old('Category') == 'Deportes' ? 'selected' : '' }}>Deportes</option>
                            <option value="Tecnología" {{ old('Category') == 'Tecnología' ? 'selected' : '' }}>Tecnología</option>
                            <option value="Negocios" {{ old('Category') == 'Negocios' ? 'selected' : '' }}>Negocios</option>
                            <option value="Entretenimiento" {{ old('Category') == 'Entretenimiento' ? 'selected' : '' }}>Entretenimiento</option>
                        </select>
                        @error('Category')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Image Upload -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Imagen
                        </label>

                        <!-- Upload Area -->
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md hover:border-indigo-400 transition-colors">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600">
                                    <label for="imageFile" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                        <span>Subir una imagen</span>
                                        <input id="imageFile" name="imageFile" type="file" class="sr-only" accept="image/jpeg,image/png,image/jpg,image/gif,image/webp">
                                    </label>
                                    <p class="pl-1">o arrastra y suelta</p>
                                </div>
                                <p class="text-xs text-gray-500">
                                    PNG, JPG, GIF, WEBP hasta 5MB
                                </p>
                            </div>
                        </div>

                        <!-- Hidden input for base64 -->
                        <input type="hidden" name="ImageUrl" id="ImageUrl">

                        @error('ImageUrl')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror

                        <!-- Preview -->
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

                    <!-- Publish -->
                    <div>
                        <label for="IsPublished" class="block text-sm font-medium text-gray-700">¿Publicar?</label>
                        <select name="IsPublished" id="IsPublished"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                       focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            <option value="1" {{ old('IsPublished', '1') == '1' ? 'selected' : '' }}>Sí</option>
                            <option value="0" {{ old('IsPublished') == '0' ? 'selected' : '' }}>No</option>
                        </select>
                    </div>

                    <!-- Actions -->
                    <div class="flex items-center space-x-3">
                        <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-green-600 text-white
                                       text-sm font-medium rounded-md shadow hover:bg-green-700
                                       focus:outline-none focus:ring-2 focus:ring-green-500">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Guardar
                        </button>
                        <a href="{{ route('news.index') }}"
                           class="inline-flex items-center px-4 py-2 bg-gray-500 text-white
                                  text-sm font-medium rounded-md shadow hover:bg-gray-600">
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
        const MAX_FILE_SIZE = 5 * 1024 * 1024; // 5MB

        const imageInput = document.getElementById('imageFile');
        const imagePreview = document.getElementById('imagePreview');
        const previewImage = document.getElementById('previewImage');
        const imageUrlInput = document.getElementById('ImageUrl');
        const removeButton = document.getElementById('removeImage');
        const imageSizeText = document.getElementById('imageSize');

        // Handle file selection
        imageInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                handleImageFile(file);
            }
        });

        // Handle drag and drop
        const dropZone = imageInput.closest('.border-dashed');

        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        ['dragenter', 'dragover'].forEach(eventName => {
            dropZone.addEventListener(eventName, () => {
                dropZone.classList.add('border-indigo-500', 'bg-indigo-50');
            });
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, () => {
                dropZone.classList.remove('border-indigo-500', 'bg-indigo-50');
            });
        });

        dropZone.addEventListener('drop', function(e) {
            const file = e.dataTransfer.files[0];
            if (file && file.type.startsWith('image/')) {
                imageInput.files = e.dataTransfer.files;
                handleImageFile(file);
            }
        });

        // Process image file
        function handleImageFile(file) {
            // Validate file type
            if (!file.type.startsWith('image/')) {
                alert('Por favor selecciona un archivo de imagen válido');
                return;
            }

            // Validate file size
            if (file.size > MAX_FILE_SIZE) {
                alert('La imagen es demasiado grande. El tamaño máximo es 5MB');
                return;
            }

            // Read and convert to base64
            const reader = new FileReader();

            reader.onload = function(e) {
                const base64String = e.target.result;

                // Set the base64 string to hidden input
                imageUrlInput.value = base64String;

                // Show preview
                previewImage.src = base64String;
                imagePreview.classList.remove('hidden');

                // Show file size
                const sizeInKB = (file.size / 1024).toFixed(2);
                const sizeInMB = (file.size / (1024 * 1024)).toFixed(2);
                imageSizeText.textContent = `Tamaño: ${sizeInMB}MB (${sizeInKB}KB) - ${file.name}`;
            };

            reader.onerror = function() {
                alert('Error al leer el archivo');
            };

            reader.readAsDataURL(file);
        }

        // Remove image
        removeButton.addEventListener('click', function() {
            imageInput.value = '';
            imageUrlInput.value = '';
            previewImage.src = '';
            imagePreview.classList.add('hidden');
            imageSizeText.textContent = '';
        });

        // Form validation before submit
        document.getElementById('newsForm').addEventListener('submit', function(e) {
            const base64Data = imageUrlInput.value;

            if (base64Data) {
                // Estimate base64 size (base64 is ~33% larger than original)
                const estimatedSize = (base64Data.length * 0.75);

                if (estimatedSize > MAX_FILE_SIZE) {
                    e.preventDefault();
                    alert('La imagen es demasiado grande. Por favor selecciona una imagen más pequeña.');
                    return false;
                }
            }
        });
    </script>
    @endpush
</x-app-layout>
