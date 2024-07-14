<?php

namespace App\Http\Controllers;

use App\Models\ApiKey;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Str;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $apiKeys = $user->apikeys()->get();

        return Inertia::render('ApiKeys/index',['apiKeys' => $apiKeys]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('ApiKeys/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:5','max:255'],
        ]);

        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        ApiKey::create([
            'uuid' =>  'api-' . Str::uuid(),
             'name' => $request->name,
             'user_id' => $request->user()->id,
             'key' => substr(str_shuffle(str_repeat($pool, 5)), 0, 35)
         ]);
         
        return redirect()->route('apikeys.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ApiKey $apiKey)
    {
        $apiKey->delete();
    }
}
