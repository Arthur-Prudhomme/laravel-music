<?php

use App\Http\Controllers\ApiPlaylistController;
use App\Http\Middleware\CheckApiKey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/playlist', [ApiPlaylistController::class,'index'])->middleware(CheckApiKey::class);