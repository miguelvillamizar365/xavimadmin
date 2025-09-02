<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        //$news = News::with('user')->latest()->paginate(10);
        //$news = News::latest()->get();
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
            'ImageUrl' => 'nullable|url',
        ]);

        News::create([
            'Title' => $request->Title,
            'Content' => $request->Content,
            'Author' => auth()->user()->name,
            'ImageUrl' => $request->ImageUrl,
            'Category' => $request->Category ?? 'General',
            'IsPublished' => $request->IsPublished ?? 1,
            'UserId' => auth()->id(),
        ]);

        return redirect()->route('news.index')->with('success', 'News created successfully');
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
        ]);

        $news->update($request->all());

        return redirect()->route('news.index')->with('success', 'News updated successfully');
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('news.index')->with('success', 'News deleted successfully');
    }

    public function show($id)
    {
        $news = News::findOrFail($id);   // find the news by ID or return 404
        return view('news.show', compact('news'));
    }
}