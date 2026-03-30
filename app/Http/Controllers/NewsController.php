<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::paginate(10); // 10 items per page
        return view('news.index', compact('news'));
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Title' => 'required|max:255',
            'Content' => 'required',
            'Category' => 'nullable|max:100',
            'ImageUrl' => 'nullable|string', // Changed from 'url' to 'string' for base64
            'IsPublished' => 'required|boolean',
        ]);

        News::create([
            'Title' => $request->Title,
            'Content' => $request->Content,
            'Author' => auth()->user()->name ?? 'Admin',
            'ImageUrl' => $request->ImageUrl, // This will now contain base64 string
            'Category' => $request->Category ?? 'General',
            'IsPublished' => $request->IsPublished ?? 1,
            'UserId' => auth()->id(),
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
            'Title' => 'required|max:255',
            'Content' => 'required',
            'Category' => 'nullable|max:100',
            'ImageUrl' => 'nullable|string', // Changed from 'url' to 'string' for base64
            'IsPublished' => 'required|boolean',
        ]);

        // Prepare update data
        $updateData = [
            'Title' => $request->Title,
            'Content' => $request->Content,
            'Category' => $request->Category ?? 'General',
            'IsPublished' => $request->IsPublished ?? 1,
        ];

        // Handle image removal
        if ($request->input('remove_image') == '1') {
            $updateData['ImageUrl'] = null;
        } elseif ($request->filled('ImageUrl')) {
            // Only update ImageUrl if a new image was uploaded
            $updateData['ImageUrl'] = $request->ImageUrl;
        }
        // If ImageUrl is not set and remove_image is not 1, keep the existing image

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
