<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TrackController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\ApiController;
use App\Http\Middleware\IsAdmin;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    //pour rediriger direct sur login
    Route::name('tracks.')->prefix('tracks')->controller(TrackController::class)->middleware(IsAdmin::class)->group(function (){
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{track}', 'show')->name('show');
        Route::get('/{track}/edit', 'edit')->name('edit');
        Route::put('/{track}', 'update')->name('update');
        Route::delete('/{track}', 'destroy')->name('destroy');
    });

    Route::name('playlists.')->prefix('playlists')->controller(PlaylistController::class)->group(function (){
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{playlist}', 'show')->name('show');
        Route::get('/{playlist}/edit', 'edit')->name('edit');
        Route::put('/{playlist}', 'update')->name('update');
        Route::delete('/{playlist}', 'destroy')->name('destroy');
    });
    
    Route::name('apikeys.')->prefix('apikeys')->controller(ApiController::class)->group(function (){
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::delete('/{apiKey}', 'destroy')->name('destroy');
    });
    
});

// Route::get('/test',[HomeController::class, 'test'])->name('test');


Route::get('/', [TrackController::class, 'index'])->name('tracks.index');




//fait la même chose que le group mais plus vite
// Route::ressource('tracks', TrackController::class);
// Route::ressource('tracks', TrackController::class)->except(['show']);