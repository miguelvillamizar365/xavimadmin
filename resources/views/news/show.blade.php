<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $news->Title }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <h3 class="text-2xl font-bold mb-4">{{ $news->Title }}</h3>
                <p class="text-gray-600 mb-2">Autor: {{ $news->Author }} | {{ $news->created_at->format('d/m/Y') }}</p>
                
                @if($news->ImageUrl)
                    <img src="{{ $news->ImageUrl }}" alt="{{ $news->Title }}" class="w-full mb-4 rounded-lg shadow">
                @endif

                <div class="prose dark:prose-invert max-w-none">
                    {!! nl2br(e($news->Content)) !!}
                </div>
                
                <a href="{{ route('news.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
</x-app-layout>