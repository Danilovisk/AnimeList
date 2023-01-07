<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Models\Studio;

class StudioController extends Controller
{
    public function index()
    {
        $studios = Studio::all();
        return view('studios.index', compact('studios'));
    }

    public function create()
    {
        return view('studios.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:40',
            'established_at' => 'required|date',


        ]);
        Studio::create([
            'name' => $request->get('name'),
            'established_at' => $request->get('established_at'),

        ]);

        return redirect()->route('studios.index')->with('message', 'Studio Created Successfully');
    }

    public function show(Studio $studio)
    {
        return view('studios.show', compact('studio'));
    }


    public function edit(Studio $studio)
    {
        return view('studios.edit', compact('studio'));
    }

    public function update(Studio $studio, Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'established_at' => 'required|date',

        ]);
        $studio->update([
            'name' => $request->get('name'),
            'established_at' => $request->get('established_at'),

        ]);

        return Redirect::route('studios.index')->with('success', 'Studio updated.');
    }

    public function destroy(Studio $studio)
    {
        $studio->delete();
        return Redirect::back()->with('message', 'Studio Deleted.');
    }
}
