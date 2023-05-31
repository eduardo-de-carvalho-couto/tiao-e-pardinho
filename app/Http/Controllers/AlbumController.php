<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlbumFormRequest;
use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = Album::query()->orderBy('created_at', 'desc')->get();

        $mensagemSucesso = session('mensagem.sucesso');

        return view('albums.index')->with('albums', $albums)
            ->with('mensagemSucesso', $mensagemSucesso);
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $albums = Album::query()->with('tracks')->get();

        if ($keyword){
            $albums = Album::query()->where('name', 'LIKE', '%'.$keyword.'%')
                                    ->with('tracks')
                                    ->get();
        }

        return view('search.index')->with('albums', $albums);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AlbumFormRequest $request)
    {
        $album = Album::create(['name' => $request->name]);

        return to_route('albums.index')
            ->with('mensagem.sucesso', "Álbum '{$album->name}' adicionada com sucesso");;
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
    public function update(Album $album, AlbumFormRequest $request)
    {
        $album->fill($request->all());
        $album->save();

        return to_route('albums.index')->with('mensagem.sucesso', "Álbum '{$album->name}' atualizado com sucesso");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
        $album->delete();

        return to_route('albums.index')->with('mensagem.sucesso', 'Álbum removido com sucesso');
    }
}
