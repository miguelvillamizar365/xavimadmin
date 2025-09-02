<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Noticias') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <div class="flex items-center justify-between mb-6">
                    <h1 class="text-2xl font-bold text-gray-700">Lista de noticias</h1>
                    <a href="{{ route('news.create') }}" 
                       class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg shadow hover:bg-blue-700">
                        Crear noticia
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full border border-gray-200 rounded-lg">
                        <thead class="bg-gray-100 text-gray-700 uppercase text-sm">
                            <tr>
                                <th class="px-6 py-3 text-left">Titulo</th>
                                <th class="px-6 py-3 text-left">Categoria</th>
                                <th class="px-6 py-3 text-left">Publicado</th>
                                <th class="px-6 py-3 text-left">Autor</th>
                                <th class="px-6 py-3 text-left">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($news as $item)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">{{ $item->Title }}</td>
                                    <td class="px-6 py-4">{{ $item->Category }}</td>
                                    <td class="px-6 py-4">
                                        <span class="px-2 py-1 text-xs font-semibold rounded 
                                            {{ $item->IsPublished ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ $item->IsPublished ? 'Sí' : 'No' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">{{ $item->Author }}</td>
                                    <td class="px-6 py-4 flex space-x-2">
                                        <a href="{{ route('news.show', $item->NewsId) }}" 
                                           class="px-3 py-1 bg-blue-500 text-white rounded-md text-sm hover:bg-blue-600">
                                           Ver
                                        </a>
                                        <a href="{{ route('news.edit', $item->NewsId) }}" 
                                           class="px-3 py-1 bg-yellow-500 text-white rounded-md text-sm hover:bg-yellow-600">
                                           Editar
                                        </a>
                                        <form action="{{ route('news.destroy', $item->NewsId) }}" 
                                              method="POST" 
                                              onsubmit="return confirm('¿Estás seguro de eliminar esta noticia?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                class="px-3 py-1 bg-red-500 text-white rounded-md text-sm hover:bg-red-600">
                                                Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    @if(method_exists($news, 'links'))
                        {{ $news->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
