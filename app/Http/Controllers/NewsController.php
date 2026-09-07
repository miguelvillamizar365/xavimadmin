<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::paginate(10);
        return view('news.index', compact('news'));
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Title'        => 'required|max:255',
            'Content'      => 'required',
            'Category'     => 'nullable|max:100',
            'ImageUrl'     => 'nullable|string',
            'InstagramUrl' => 'nullable|url|max:500',
            'SpotifyUrl'   => 'nullable|url|max:500',
            'FacebookUrl'  => 'nullable|url|max:500',
            'IsPublished'  => 'required|boolean',
        ]);

        News::create([
            'Title'        => $request->Title,
            'Content'      => $request->Content,
            'Author'       => auth()->user()->name ?? 'Admin',
            'ImageUrl'     => $request->ImageUrl,
            'InstagramUrl' => $request->InstagramUrl,
            'SpotifyUrl'   => $request->SpotifyUrl,
            'FacebookUrl'  => $request->FacebookUrl,
            'Category'     => $request->Category ?? 'General',
            'IsPublished'  => $request->IsPublished ?? 1,
            'UserId'       => auth()->id(),
        ]);

        return redirect()->route('news.index')
            ->with('success', 'Noticia creada exitosamente');
    }

    public function edit(News $news)
    {
        return view('news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $request->validate([
            'Title'        => 'required|max:255',
            'Content'      => 'required',
            'Category'     => 'nullable|max:100',
            'ImageUrl'     => 'nullable|string',
            'InstagramUrl' => 'nullable|url|max:500',
            'SpotifyUrl'   => 'nullable|url|max:500',
            'FacebookUrl'  => 'nullable|url|max:500',
            'IsPublished'  => 'required|boolean',
        ]);

        $updateData = [
            'Title'        => $request->Title,
            'Content'      => $request->Content,
            'Category'     => $request->Category ?? 'General',
            'IsPublished'  => $request->IsPublished ?? 1,
            'InstagramUrl' => $request->InstagramUrl,
            'SpotifyUrl'   => $request->SpotifyUrl,
            'FacebookUrl'  => $request->FacebookUrl,
        ];

        // Manejo de imagen
        if ($request->input('remove_image') == '1') {
            $updateData['ImageUrl'] = null;
        } elseif ($request->filled('ImageUrl')) {
            $updateData['ImageUrl'] = $request->ImageUrl;
        }

        $news->update($updateData);

        return redirect()->route('news.index')
            ->with('success', 'Noticia actualizada exitosamente');
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('news.index')
            ->with('success', 'Noticia eliminada exitosamente');
    }

    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('news.show', compact('news'));
    }
}