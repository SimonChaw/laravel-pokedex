<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    public function index() {
        $pokemon = Pokemon::all();
        //dd($pokemon);
        return view('pokemon.index', [
            'pokemon' => $pokemon
        ]);
    }

    public function show(int $id) {
        $mon = Pokemon::find($id);
        return view('pokemon.show', [
            'mon' => $mon
        ]);
    }

    public function create() {
        return view('pokemon.create');
    }

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
}