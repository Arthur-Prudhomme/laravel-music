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
        dd('create');
    }

    public function store(){
        dd('store');
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
