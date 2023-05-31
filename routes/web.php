<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TrackController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AlbumController::class, 'search'])->name('search.index');

Route::resource('albums', AlbumController::class)->except(['show', 'create']);
Route::resource('albums.tracks', TrackController::class)->except(['show', 'create']);
