<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $news->Title }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">

                <!-- Title -->
                <h3 class="text-2xl font-bold mb-4 text-gray-900 dark:text-gray-100">
                    {{ $news->Title }}
                </h3>

                <!-- Meta Info -->
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                    Autor: <span class="font-medium">{{ $news->Author }}</span> |
                    <span>{{ $news->created_at->format('d/m/Y') }}</span>
                </p>

                <!-- Image -->
                @if($news->ImageUrl)
                    <img src="{{ $news->ImageUrl }}" 
                         alt="{{ $news->Title }}" 
                         class="w-full max-h-[500px] object-cover rounded-lg shadow mb-6">
                @endif

                <!-- Content -->
                <div class="prose dark:prose-invert max-w-none">
                    {!! nl2br(e($news->Content)) !!}
                </div>

                <!-- Back Button -->
                <div class="mt-6">
                    <a href="{{ route('news.index') }}" 
                       class="inline-flex items-center px-4 py-2 bg-gray-600 text-white text-sm font-medium rounded-md shadow hover:bg-gray-700">
                        Volver
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>