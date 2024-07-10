<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Playlist;
use Inertia\Inertia;
use Illuminate\Support\Str;

class PlaylistController extends Controller
{
    public function index(){
        // dd('index');
        $playlists = Playlist::all();
        return Inertia::render('Playlist/index',['playlists' => $playlists]);
    }

    public function create(){
        // dd('create');
        return Inertia::render('Playlist/create');
    }

    public function store(){
        dd('store');
    }

    public function show(){
        dd('show');
    }

    public function edit(Playlist $playlist){
        // dd('edit');
        
        return Inertia::render('Playlist/edit',['playlist'=>$playlist,]);
    }

    public function update(){
        dd('update');
    }

    public function destroy(Playlist $playlist){
        // dd('destroy');
        $playlist->delete();
    }
}
