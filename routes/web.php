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

// Delete to delete in HTTP.
Route::delete('/pokemon/{id}', [PokemonController::class, 'destroy']); // Destroy function to delete pokemon.

// Edit pokemon:
Route::get('/pokemon/{id}/edit', [PokemonController::class, 'edit']); // Gives you "edit" page.
Route::put('/pokemon/{id}', [PokemonController::class, 'update']); // Actually does the update

//Check https://laravel.com/docs/11.x/controllers#restful-supplementing-resource-controllers