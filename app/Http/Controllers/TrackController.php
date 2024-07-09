<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Track;
use Inertia\Inertia;

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
            'audio' => ['required', 'file', 'mimes:mp3,wav', 'max:10000'],
        ]);

        return redirect()->back();
    }

    public function show(){
        dd('show');
    }

    public function edit(){
        dd('edit');
    }

    public function update(){
        dd('update');
    }

    public function destroy(){
        dd('destroy');
    }
}
