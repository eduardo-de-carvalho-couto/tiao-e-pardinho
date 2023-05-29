<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = Album::all();

        return view('albums.index')->with('albums', $albums);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Album::create(['name' => $request->name]);

        return to_route('albums.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album)
    {
        return view('albums.edit')->with('album', $album);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Album $album, Request $request)
    {
        $album->fill($request->all());
        $album->save();

        return to_route('albums.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
        $album->delete();

        return to_route('albums.index');
    }
}
