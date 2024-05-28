<?php

use App\Http\Controllers\PokemonController;
use App\Models\Pokemon;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('home');
});

Route::get('/pokemon', [PokemonController::class, 'index']);
Route::get('/pokemon/create', [PokemonController::class, 'create']);
Route::get('/pokemon/{id}', [PokemonController::class, 'show']);
Route::post('/pokemon', [PokemonController::class, 'store']);
    // Post is used for creating resources.
    // Put for updates.
Route::delete('/pokemon/{id}', [PokemonController::class, 'destroy']);