<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $news->Title }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">

                <!-- Category & Status Badges -->
                <div class="mb-4 flex flex-wrap gap-2">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-indigo-100 text-indigo-800">
                        {{ $news->Category }}
                    </span>
                    @if($news->IsPublished)
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                            Publicado
                        </span>
                    @else
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                            Borrador
                        </span>
                    @endif

                    {{-- Indicadores de contenido social --}}
                    @if($news->hasInstagram())
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-pink-100 text-pink-800 gap-1">
                            <svg class="w-3 h-3" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                            Instagram
                        </span>
                    @endif
                    @if($news->hasSpotify())
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800 gap-1">
                            <svg class="w-3 h-3" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.4 0 0 5.4 0 12s5.4 12 12 12 12-5.4 12-12S18.66 0 12 0zm5.521 17.34c-.24.359-.66.48-1.021.24-2.82-1.74-6.36-2.101-10.561-1.141-.418.122-.779-.179-.899-.539-.12-.421.18-.78.54-.9 4.56-1.021 8.52-.6 11.64 1.32.42.18.479.659.301 1.02zm1.44-3.3c-.301.42-.841.6-1.262.3-3.239-1.98-8.159-2.58-11.939-1.38-.479.12-1.02-.12-1.14-.6-.12-.48.12-1.021.6-1.141C9.6 9.9 15 10.561 18.72 12.84c.361.181.54.78.241 1.2zm.12-3.36C15.24 8.4 8.82 8.16 5.16 9.301c-.6.179-1.2-.181-1.38-.721-.18-.601.18-1.2.72-1.381 4.26-1.26 11.28-1.02 15.721 1.621.539.3.719 1.02.419 1.56-.299.421-1.02.599-1.559.3z"/></svg>
                            Spotify
                        </span>
                    @endif
                    @if($news->hasFacebook())
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800 gap-1">
                            <svg class="w-3 h-3" viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                            Facebook
                        </span>
                    @endif
                </div>

                <!-- Title -->
                <h3 class="text-3xl font-bold mb-4 text-gray-900 dark:text-gray-100">
                    {{ $news->Title }}
                </h3>

                <!-- Meta Info -->
                <div class="flex items-center text-sm text-gray-600 dark:text-gray-400 mb-6 pb-4 border-b border-gray-200 dark:border-gray-700">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <span class="font-medium">{{ $news->Author }}</span>
                    <span class="mx-2">•</span>
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <span>{{ $news->created_at ? \Carbon\Carbon::parse($news->created_at)->format('d/m/Y H:i') : 'N/A' }}</span>
                </div>

                <!-- Imagen principal -->
                @if($news->ImageUrl)
                    <div class="mb-8">
                        <img src="{{ $news->ImageUrl }}"
                             alt="{{ $news->Title }}"
                             class="w-full h-auto max-h-[600px] object-contain rounded-lg shadow-lg"
                             onerror="this.onerror=null; this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%22800%22 height=%22400%22%3E%3Crect fill=%22%23f3f4f6%22 width=%22800%22 height=%22400%22/%3E%3Ctext fill=%22%239ca3af%22 font-family=%22sans-serif%22 font-size=%2224%22 dy=%2210.5%22 font-weight=%22bold%22 x=%2250%25%22 y=%2250%25%22 text-anchor=%22middle%22%3EImagen no disponible%3C/text%3E%3C/svg%3E';">
                    </div>
                @endif

                <!-- Content -->
                <div class="prose dark:prose-invert max-w-none mb-8">
                    <div class="text-gray-800 dark:text-gray-200 text-lg leading-relaxed whitespace-pre-line">
                        {{ $news->Content }}
                    </div>
                </div>

                {{-- ═══════════════════════════════════════════════════════════
                     SECCIÓN DE REDES SOCIALES
                ════════════════════════════════════════════════════════════ --}}
                @if($news->hasInstagram() || $news->hasSpotify() || $news->hasFacebook())
                    <div class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <h4 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-6">
                            🔗 Contenido en redes
                        </h4>

                        <div class="space-y-8">

                            {{-- ── INSTAGRAM ──────────────────────────────── --}}
                            @if($news->hasInstagram())
                                <div>
                                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-3 flex items-center gap-2">
                                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                                        Instagram
                                    </p>

                                    @if($news->isInstagramReel())
                                        {{-- Reel: no hay embed directo, mostramos link con preview bonito --}}
                                        <a href="{{ $news->InstagramUrl }}" target="_blank" rel="noopener noreferrer"
                                           class="inline-flex items-center gap-3 px-5 py-4 rounded-xl border-2 border-pink-200 bg-gradient-to-r from-pink-50 to-purple-50 hover:from-pink-100 hover:to-purple-100 transition-colors group">
                                            <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-pink-500 via-red-500 to-yellow-500 rounded-xl flex items-center justify-center">
                                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M8 5v14l11-7z"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="font-semibold text-gray-800 group-hover:text-pink-700">Ver Reel en Instagram</p>
                                                <p class="text-xs text-gray-500 mt-0.5">Abre en Instagram · Los Reels no permiten embed externo</p>
                                            </div>
                                            <svg class="w-5 h-5 text-gray-400 group-hover:text-pink-500 ml-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                            </svg>
                                        </a>
                                    @else
                                        {{-- Post normal: embed oficial de Instagram --}}
                                        <div class="flex justify-center">
                                            <blockquote class="instagram-media w-full max-w-lg"
                                                data-instgrm-permalink="{{ $news->InstagramUrl }}"
                                                data-instgrm-version="14"
                                                style="background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin:1px; max-width:540px; min-width:326px; padding:0; width:99.375%;">
                                            </blockquote>
                                        </div>
                                        <script async src="//www.instagram.com/embed.js"></script>
                                    @endif
                                </div>
                            @endif

                            {{-- ── SPOTIFY ─────────────────────────────────── --}}
                            @if($news->hasSpotify())
                                <div>
                                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-3 flex items-center gap-2">
                                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="#1DB954"><path d="M12 0C5.4 0 0 5.4 0 12s5.4 12 12 12 12-5.4 12-12S18.66 0 12 0zm5.521 17.34c-.24.359-.66.48-1.021.24-2.82-1.74-6.36-2.101-10.561-1.141-.418.122-.779-.179-.899-.539-.12-.421.18-.78.54-.9 4.56-1.021 8.52-.6 11.64 1.32.42.18.479.659.301 1.02zm1.44-3.3c-.301.42-.841.6-1.262.3-3.239-1.98-8.159-2.58-11.939-1.38-.479.12-1.02-.12-1.14-.6-.12-.48.12-1.021.6-1.141C9.6 9.9 15 10.561 18.72 12.84c.361.181.54.78.241 1.2zm.12-3.36C15.24 8.4 8.82 8.16 5.16 9.301c-.6.179-1.2-.181-1.38-.721-.18-.601.18-1.2.72-1.381 4.26-1.26 11.28-1.02 15.721 1.621.539.3.719 1.02.419 1.56-.299.421-1.02.599-1.559.3z"/></svg>
                                        Spotify
                                    </p>
                                    <iframe
                                        src="{{ $news->getSpotifyEmbedUrl() }}"
                                        width="100%"
                                        height="152"
                                        frameborder="0"
                                        allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"
                                        loading="lazy"
                                        class="rounded-xl shadow-sm">
                                    </iframe>
                                </div>
                            @endif

                            {{-- ── FACEBOOK ────────────────────────────────── --}}
                            @if($news->hasFacebook())
                                <div>
                                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-3 flex items-center gap-2">
                                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="#1877F2"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                                        Facebook
                                    </p>

                                    @if($news->isFacebookVideo())
                                        {{-- Video de Facebook --}}
                                        <div class="flex justify-center">
                                            <iframe
                                                src="https://www.facebook.com/plugins/video.php?href={{ urlencode($news->FacebookUrl) }}&show_text=false&width=560&appId"
                                                width="560"
                                                height="315"
                                                style="border:none; overflow:hidden; max-width:100%;"
                                                scrolling="no"
                                                frameborder="0"
                                                allowfullscreen="true"
                                                allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"
                                                loading="lazy"
                                                class="rounded-xl shadow-sm">
                                            </iframe>
                                        </div>
                                    @else
                                        {{-- Post de Facebook --}}
                                        <div class="flex justify-center">
                                            <iframe
                                                src="https://www.facebook.com/plugins/post.php?href={{ urlencode($news->FacebookUrl) }}&show_text=true&width=560&appId"
                                                width="560"
                                                height="400"
                                                style="border:none; overflow:hidden; max-width:100%;"
                                                scrolling="no"
                                                frameborder="0"
                                                allowfullscreen="true"
                                                allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"
                                                loading="lazy"
                                                class="rounded-xl shadow-sm">
                                            </iframe>
                                        </div>
                                    @endif
                                </div>
                            @endif

                        </div>
                    </div>
                @endif
                {{-- ═══════════════════════════════════════════════════════════
                     FIN REDES SOCIALES
                ════════════════════════════════════════════════════════════ --}}

                <!-- Actions -->
                <div class="flex items-center space-x-3 pt-6 mt-8 border-t border-gray-200 dark:border-gray-700">
                    <a href="{{ route('news.index') }}"
                       class="inline-flex items-center px-4 py-2 bg-gray-600 text-white text-sm font-medium rounded-md shadow hover:bg-gray-700 transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Volver a la lista
                    </a>
                    <a href="{{ route('news.edit', $news->NewsId) }}"
                       class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md shadow hover:bg-indigo-700 transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Editar
                    </a>
                    <form action="{{ route('news.destroy', $news->NewsId) }}"
                          method="POST"
                          onsubmit="return confirm('¿Estás seguro de eliminar esta noticia?')"
                          class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-md shadow hover:bg-red-700 transition-colors">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                            Eliminar
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>