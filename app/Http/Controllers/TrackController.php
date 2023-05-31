<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrackFormRequest;
use App\Models\Album;
use App\Models\Track;

class TrackController extends Controller
{
    public function index(Album $album)
    {
        $tracks = $album->tracks()->orderBy('created_at', 'desc')->get();

        $mensagemSucesso = session('mensagem.sucesso');

        return view('tracks.index')->with('album', $album)->with('tracks', $tracks)
            ->with('mensagemSucesso', $mensagemSucesso);
    }

    public function store(TrackFormRequest $request)
    {
        $track = Track::create([
            'name' => $request->name, 
            'album_id' => $request->album, 
            'number' => $request->number, 
            'duration' => "00:".$request->duration,
        ]);

        return to_route('albums.tracks.index', $request->album)->with('track', $track)->with('mensagem.sucesso', "Faixa '{$track->name}' adicionada com sucesso");;
    }

    public function edit(Album $album, Track $track)
    {
        return view('tracks.edit')->with('album', $album)->with('track', $track);
    }

    public function update(TrackFormRequest $request)
    {
        $album = Album::find($request->album);
        $track = Track::find($request->track);
        
        $track->fill([
            'name' => $request->name,
            'number' => $request->number,
            'duration' => "00:".$request->duration,
        ]);
        $track->save();

        return to_route('albums.tracks.index', $album)->with('mensagem.sucesso', "Faixa '{$track->name}' atualizada com sucesso");
    }

    public function destroy(Album $album, Track $track)
    {
        $track->delete();

        return to_route('albums.tracks.index', ['album' => $album, 'track' => $track])->with('mensagem.sucesso', 'Faixa removida com sucesso');
    }
}

