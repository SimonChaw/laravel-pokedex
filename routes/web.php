<?php
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PokemonController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TrainerController;
use App\Models\Pokemon;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

//POKEMON!
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

//TRAINERS!
Route::get('/trainers', [TrainerController::class, 'index']);
    //Route to call index method in Controller class.
Route::get('/trainers/create', [TrainerController::class, 'create']);
Route::get('/trainers/{id}', [TrainerController::class, 'show']);
Route::post('/trainers', [TrainerController::class, 'store']);
Route::delete('/trainers/{id}', [TrainerController::class, 'destroy']);
Route::get('/trainers/{id}/edit', [TrainerController::class, 'edit']);
Route::put('/trainers/{id}', [TrainerController::class, 'update']);

//ITEMS!
Route::get('/trainers/{trainer_id}/items', [ItemController::class, 'index']); // Show all items for indv trainers.
Route::get('/trainers/{trainer_id}/items/create', [ItemController::class, 'create']); // Show page to MAKE item.
//Route::get('/trainers/{trainer_id}/items/{id}', [ItemController::class, 'show']); // Show specific item.
Route::post('/trainers/{trainer_id}/items', [ItemController::class, 'store']); // Creates item.
    // If an item by that name already exists for the trainer, then increase the quantity by the quantity submitted.
Route::get('/trainers/{trainer_id}/items/edit/{id}', [ItemController::class, 'edit']); // Show page to EDIT item.
Route::patch('/trainers/{trainer_id}/items/{id}', [ItemController::class, 'update']); // Modifies the existing item.
    // (ONLY ALLOW FOR QUANTITY UPDATE)
    // If the quantity is 0, delete the item and return them to the main items page instead of the individual item.
Route::delete('/trainers/{trainer_id}/items/{id}', [ItemController::class, 'destroy']); // Remove an item from a trainer's inventory.