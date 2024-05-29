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

    // Function to open page that create pokemon:
    public function create() {
        return view('pokemon.create');
    }
    // Function to actually create pokemon with custom values:
        // Holds requirements.
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

    // Function to destroy pokemon from index:
    public function destroy(int $id) {
        $deleteMon = Pokemon::find($id);
        $deleteMon->delete();
        return redirect("/pokemon"); // Redirecting as if user made a GET request.
            // Don't use "return view", because it keeps the same URL while performing action.
                // This breaks functionality.
    }

    // Function to take users to the "edit pokemon" page:
    public function edit(int $id) {
        $editMon = Pokemon::find($id);
        return view('pokemon.edit', [ 'editMon' => $editMon]);
    }
    // Function to actually edit the pokemon:
    public function update(Request $request, int $id) {
        $updateMon = Pokemon::find($id);
        //dd($request->only(['name', 'description', 'url', 'type']));
            // data dump for error checking to ensure updates were made.
        $updateMon->fill($request->only(['name', 'description', 'url', 'type']));

        // $request->all();
            // Don't request ALL, because it will request all types of
                //custom made and possibly malicious data that a user can make up.
        $updateMon->save();
        return redirect("/pokemon/{$updateMon->id}");
    }
}