<?php

use App\Http\Controllers\PokemonController;
use App\Http\Controllers\TestController;
use App\Models\Pokemon;
use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return view('home');
});

Route::get('/pokemon', [PokemonController::class, 'index']);
Route::get('/pokemon/create', [TestController::class, 'create']);
Route::get('/pokemon/{id}', [TestController::class, 'show']);
Route::post('/pokemon', [TestController::class, 'store']);
    // Post is used for creating resources.
    // Put for updates.

// Delete to delete in HTTP.
Route::delete('/pokemon/{id}', [TestController::class, 'destroy']); // Destroy function to delete pokemon.

// Edit pokemon:
Route::get('/pokemon/{id}/edit', [TestController::class, 'edit']); // Gives you "edit" page.
Route::put('/pokemon/{id}', [TestController::class, 'update']); // Actually does the update

//Check https://laravel.com/docs/11.x/controllers#restful-supplementing-resource-controllers