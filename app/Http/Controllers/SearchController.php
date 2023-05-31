<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $albums = Album::all();

        if ($keyword){
            $albums = Album::query()->where('name', 'LIKE', '%'.$keyword.'%')
                                    ->with('tracks')
                                    ->get();
        }

        return view('site.index')->with('albums', $albums);
    }
}