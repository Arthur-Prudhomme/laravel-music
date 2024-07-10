<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Playlist;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Track;
use Illuminate\ValidationException;

class PlaylistController extends Controller
{
    public function index(){
        // dd('index');
        $user = auth()->user();
        $playlists = $user->playlists;
        // $playlists = Playlist::all();
        // $playlists = Playlist::where('user_id', Auth::user()->id)->orderby('title')->get();
        return Inertia::render('Playlist/index',['playlists' => $playlists]);
    }

    public function create(){
        // dd('create');

        $tracks = Track::where('display', true)->get();
        return Inertia::render('Playlist/create',['tracks'=>$tracks]);
    }

    public function store(Request $request){
        // dd('store');
        $request->validate([
            'title' => ['required', 'string', 'min:5','max:255'],
            'tracks' => ['required', 'array'],
            'tracks.*' => ['required', 'string']
        ]);

        $tracks = Track::whereIn('uuid', $request->tracks)->where('display', true)->get();
        if($tracks->count() !== count($request->tracks)){
            throw ValidationException::withMessage(['tracks' => 'Une musique n\'existe  pas']);
        }

        $playlist = Playlist::create([
            'uuid' =>  'ply-' . Str::uuid(),
            'user_id' =>  $request->user()->id,
            'title' => $request->title,
        ]);
        
        $playlist->tracks()->attach($tracks->pluck('id'));
 
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
