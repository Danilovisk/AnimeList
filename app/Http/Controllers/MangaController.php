<?php

namespace App\Http\Controllers;

use App\Models\Manga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MangaController extends Controller
{
    public function index()
    {
        $mangas = Manga::all();
        return view('mangas.index', compact('mangas'));
    }

    public function create()
    {
        return view('mangas.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'string|max:400',
            'author' => 'required|string|max:50',
            'chapters' => 'required|integer|',
            'started_at' => 'required|date|',
            'finished' => 'boolean',

        ]);
        Manga::create([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'author' => $request->get('author'),
            'chapters' => $request->get('chapters'),
            'started_at' => $request->get('started_at'),
            'finished' => $request->get('finished'),
        ]);

        return redirect()->route('mangas.index')->with('message', 'Manga Created Successfully');
    }

    public function show(Manga $manga)
    {
        return view('mangas.show', compact('manga'));
    }


    public function edit(Manga $manga)
    {
        return view('mangas.edit', compact('manga'));
    }

    public function update(Manga $manga, Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'string|max:400',
            'author' => 'required|string|max:50',
            'chapters' => 'required|integer|',
            'started_at' => 'required|date|',
            'finished' => 'required|boolean|',
        ]);
        $manga->update([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'author' => $request->get('author'),
            'chapters' => $request->get('chapters'),
            'started_at' => $request->get('started_at'),
            'finished' => $request->get('finished'),
        ]);

        return Redirect::route('mangas.index')->with('success', 'Manga updated.');
    }

    public function destroy(Manga $manga)
    {
        $manga->delete();
        return Redirect::back()->with('message', 'Manga Deleted.');
    }
}
