<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiPlaylistController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user;
        $playlists = $user->playlists()->withCount('tracks')->get();

        return response()->json($playlists,200);
    }
}
