<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Track;
use Inertia\Inertia;
use Illuminate\Support\Str;

class TrackController extends Controller
{
    public function index(){
        // dd('index');
        $tracks = Track::where('display', true)->orderby('artist')->get();
        // $tracks = Track::where('play_count', '>',500)->orderby('artist')->get();

        return Inertia::render('Track/index',['tracks' => $tracks]);
    }

    public function create(){
        return Inertia::render('Track/create');
    }

    public function store(Request $request){
        $request->validate([
            'title' => ['required', 'string', 'min:5','max:255'],
            'artist' => ['required', 'string', 'min:3','max:255'],
            'display' => ['required', 'boolean'],
            'image' => ['required', 'image', 'mimes:jpg,png,svg', 'max:10000'],
            'music' => ['required', 'file', 'mimes:mp3,wav', 'max:10000'],
        ]);

        $uuid = 'trk-' . Str::uuid();

        $imageExt = $request->image->extension();
        $imagePath = $request->image->storeAs('tracks/images', $uuid . '.' . $imageExt);

        $musicExt = $request->music->extension();
        $musicPath = $request->music->storeAs('tracks/musics', $uuid . '.' . $musicExt);

        Track::create([
           'uuid' =>  $uuid,
            'title' => $request->title,
            'artist' => $request->artist,
            'display' => $request->display,
            'image' => $imagePath,
            'music' => $musicPath
        ]);

        return redirect()->route('tracks.index');
    }

    public function show(Playlist $playlist){
        dd('show');
    }

    public function edit(Track $track){
        return Inertia::render('Track/edit',['track'=>$track,]);
    }

    public function update(Request $request, Track $track){
        $request->validate([
            'title' => ['required', 'string', 'min:5','max:255'],
            'artist' => ['required', 'string', 'min:3','max:255'],
            'display' => ['required', 'boolean']
        ]);

        $track->title = $request->title;
        $track->artist = $request->artist;
        $track->display = $request->display;
        $track->save();

        return redirect()->route('tracks.index');
    }

    public function destroy(Track $track){
        $track->delete();
    }
}
