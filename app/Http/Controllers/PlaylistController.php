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

    public function store(Request $request){
        // dd('store');
        $request->validate([
            'title' => ['required', 'string', 'min:5','max:255']
        ]);

        Playlist::create([
            'uuid' =>  'ply-' . Str::uuid(),
            'user_id' =>  $request->user()->id,
            'title' => $request->title,
        ]);
 
        return redirect()->route('playlists.index');
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
