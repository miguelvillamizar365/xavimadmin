<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Noticias') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h1>Lista de noticias</h1>
                <a href="{{ route('news.create') }}" class="btn btn-primary">Crear noticia</a>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Categoria</th>
                            <th>Publicado</th>
                            <th>Autor</th>
                            <th>Aciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($news as $item)
                            <tr>
                                <td>{{ $item->Title }}</td>
                                <td>{{ $item->Category }}</td>
                                <td>{{ $item->IsPublished ? 'Yes' : 'No' }}</td>
                                <td>{{ $item->Author }}</td>
                                <td>
                                    <a href="{{ route('news.show', $item->NewsId) }}" class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('news.edit', $item->NewsId) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('news.destroy', $item->NewsId) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @if(method_exists($news, 'links'))
                    {{ $news->links() }}
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
