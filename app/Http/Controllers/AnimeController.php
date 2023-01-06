<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;



use App\Models\Anime;

class AnimeController extends Controller
{
    public function index()
    {
        $animes = Anime::all();
        return view('animes.index', compact('animes'));
    }

    public function create()
    {
        return view('animes.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'string|max:400',
            'studio' => 'required|string|max:50',
            'episodes' => 'required|integer|',
            'started_at' => 'required|date|',
            'finished' => 'boolean',

        ]);
        Anime::create([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'studio' => $request->get('studio'),
            'episodes' => $request->get('episodes'),
            'started_at' => $request->get('started_at'),
            'finished' => $request->get('finished'),
        ]);

        return redirect()->route('animes.index')->with('message', 'Anime Created Successfully');
    }

    public function show(Anime $anime)
    {
        return view('animes.show', compact('anime'));
    }


    public function edit(Anime $anime)
    {
        return view('animes.edit', compact('anime'));
    }

    public function update(Anime $anime, Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'string|max:400',
            'studio' => 'required|string|max:50',
            'episodes' => 'required|integer|',
            'started_at' => 'required|date|',
            'finished' => 'required|boolean|',
        ]);
        $anime->update([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'studio' => $request->get('studio'),
            'episodes' => $request->get('episodes'),
            'started_at' => $request->get('started_at'),
            'finished' => $request->get('finished'),
        ]);

        return Redirect::route('animes.index')->with('success', 'Anime updated.');
    }

    public function destroy(Anime $anime)
    {
        $anime->delete();
        return Redirect::back()->with('message', 'Anime Deleted.');
    }
}
