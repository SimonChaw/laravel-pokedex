<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;
use Illuminate\Testing\Constraints\SoftDeletedInDatabase;

class PokemonController extends Controller
{
    // Function to show all available Pokemon:
    public function index() {
        $pokemon = Pokemon::all();
        //dd($pokemon);
        return view('pokemon.index', [
            'pokemon' => $pokemon
        ]);
    }

    // Function to show individual Pokemon based on ID:
    public function show(int $id) {
        $mon = Pokemon::find($id);
        return view('pokemon.show', [
            'mon' => $mon
        ]);
    }

    // Function to create new Pokemon:
    public function create() {
        return view('pokemon.create');
    }

    // Function to require all inputs:
    public function store(Request $request) {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'url'=>'required',
            'type'=>'required'
        ]);

        //Get pokemon:
        $pokemon = Pokemon::create($request->only(['name', 'description', 'url', 'type']));
        // Use pokemon ID to redirect user to their newly created pokemon's page:
        return redirect("/pokemon/{$pokemon->id}");
        
        //dd($request->all());
    }

    public function destroy(int $id) {
        $deleteMon = Pokemon::find($id);
        $deleteMon->delete();
        return view('pokemon.show');
    }
}