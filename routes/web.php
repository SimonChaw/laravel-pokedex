<?php
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PokemonController;
use App\Http\Controllers\PokemonTrainerController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TrainerController;
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
//Route::get('/pokemon/finder', [PokemonController::class, 'finder']);
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
    // PATCH is used instead of PUT because you're only editing 1 value in the table.
Route::delete('/trainers/{trainer_id}/items/{id}', [ItemController::class, 'destroy']); // Remove an item from a trainer's inventory.

// TEAMS!
Route::post('/trainers/{trainer_id}/add-mon', [PokemonTrainerController::class, 'addMon']);
Route::delete('/trainers/{trainer_id}/remove-mon/{pivot_id}', [PokemonTrainerController::class, 'removeMon']);
    // This link exists because you can't use the same action (get/post/delete) on the same route.
    // The link doesn't even need to be attached to a view that exists. It happens in the background.
    // Needs pivot_id because removeMon method asks for that as a 2nd argument as well.
Route::put('/trainers/{trainer_id}/update-name/{pivot_id}', [PokemonTrainerController::class, 'updateName']);