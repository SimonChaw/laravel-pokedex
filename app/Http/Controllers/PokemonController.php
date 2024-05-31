<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;
use Illuminate\Testing\Constraints\SoftDeletedInDatabase;

class PokemonController extends Controller
{
    // Function to show all available Pokemon:
    public function index() {
        $allMon = Pokemon::all();
        //dd($pokemon);
        return view('pokemon.index', [
            'pokemon' => $allMon
        ]);
    }

    // Function to show individual Pokemon based on ID:
    public function show(int $id) {
        $showIndvMon = Pokemon::find($id);
        return view('pokemon.show', [
            'mon' => $showIndvMon
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
        
        /**
         * Method 1 - Mass Assignment 
         * This allows you to pass an array to the create method of a model
         * Where the array keys represent fields that belong to the model, and the values
         * are assigned to those fields.
         * 
         * Example: $request->only(['name', 'description', 'url', 'type'])
         * Gives us an array that looks like this:
         * [
         *  'name' => 'Example Name',
         *  'description' => 'Example Desc.',
         *  'url' => 'https://reallink.com',
         *  'type' => 'Fire'
         * ];
         * 
         * When you call Pokemon::create it will create a Pokemon object, assign the fields and save it to
         * the database.
         * 
         * Pros: A lot cleaner, faster, done in one line, generally
         * Cons: Less controll, harder to handle when you need to conditionally set values
         * //Create pokemon:
         * $pokemon = Pokemon::create($request->only(['name', 'description', 'url', 'type']));
        */

        /**
         * USE THIS FOR NOW
         * Method 2 - Individual property assignment (OOP approach)
         * 
         * To get values from the request object indvidually, we have to call a helper
         * function that request provides called input
         * 
         * It takes two arguements, the first arguement corrosponds to the name attribute
         * in your HTML form that you submitted. 
         * 
         * So, for example let's say you have a url input
         * <input id="txtUrl" name="url" />
         * 
         * When your HTML form gets submitted it creates an array where the name attribute is
         * the key in the array and the value for that key is whatever the user typed in the text box.
         * 
         * So let's say that input
         * 
         */
        // First, make a new instance of a pokemon class
        // We are preparing it to be saved to the database.
        $storeMon = new Pokemon();
        // Then start assigning values
        $storeMon->name = $request->input('name');
        $storeMon->description = $request->input('description');
        $storeMon->url = $request->input('url');
        $storeMon->type = $request->input('type');
        // Finally we need to save this model to our Database
        $storeMon->save();


        // Use pokemon ID to redirect user to their newly created pokemon's page:
        return redirect("/pokemon/{$storeMon->id}");
        
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
        /**
         * First we find the model from the DB that matches the ID we were passed
         * Then we want to update it
         */
        $updateMon = Pokemon::findOrFail($id);
            // "Find" is used because it doesn't exist.

        /**
         * Method 1 - Mass Assignment
         * 
         * Anytime you have a model, instead of assigning properties one by one
         * you can assign several at the same time. Just like create it maps the array 
         * keys to the corrosponding class properties.
         * 
         * But unlike create, it doesn't save it for you. You have to call save after you fill the data.
         * 
         * $updateMon->fill($request->only(['name', 'description', 'url', 'type']));
         * $updateMon->save();
         */

         /**
          * Method 2 - Individual Assignment (OOP Approach)
          */
        $updateMon->name = $request->input('name');
        $updateMon->description = $request->input('description');
        $updateMon->url = $request->input('url');
        $updateMon->type = $request->input('type');
        $updateMon->save();
        

        // $request->all();
        // Don't request ALL, because it will request all types of
        // custom made and possibly malicious data that a user can make up.
        
        return redirect("/pokemon/{$updateMon->id}");
    }
}