<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use App\Models\PokemonTrainer;
use App\Models\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PokemonTrainerController extends Controller
{

    public function addMon(int $trainer_id, Request $request) {
        //0) Validate request to have a nickname
            // to be inserted in PokemonTrainer table, name of pokemon to be added.
        $request->validate([
            "nickname" => 'required|string|min:3|max:20',
            "name" => 'required|string'
        ]);
        //1) Take an input from user for a pokemon name.
        $name = $request->get('name');
        //2) Use that input to query from the pokemon db.
        $pokemon = Pokemon::where('name', $name)->first();
            // where takes "column name" and "value".
            // "first" gives us the first matching pokemon in the db.
        //3) If no pokemon exists, alert user.
        if($pokemon===null)
        {
            abort(404, "Pokemon with name { $name }, doesn't exist.");
        }
        //4) If it exists, store in PokemonTrainer db.
        $team = PokemonTrainer::create(['trainer_id'=>$trainer_id, 'pokemon_id'=>$pokemon->id, 'nickname'=>$request->get('nickname')]);
        //5) Redirect to trainer page to show trainer and modified team.
        return redirect("/trainers/{$trainer_id}");
    }

    public function removeMon(int $trainer_id, int $pivot_id) {
        PokemonTrainer::find($pivot_id)->delete();
        return redirect("/trainers/{$trainer_id}");
    }

    public function updateName(int $trainer_id, int $pivot_id, Request $request) {
        $request->validate([
            "newNickname" => 'required|string|min:3|max:20'
        ]);
        $updateName = PokemonTrainer::find($pivot_id);
        $updateName->update([
            'nickname' => $request->get(('newNickname'))
        ]);
            // Alt way to do the above: $updateName->update($request->only('newNickname'));
        return redirect("/trainers/{$trainer_id}");
    }
}