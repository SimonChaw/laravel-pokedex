<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use App\Models\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrainerController extends Controller
{
    public function index() {
        $showAll = Trainer::all();
        return view('trainers.index', ['trainers' => $showAll]);
    }

    public function create() {
        return view('trainers.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|max:30',
            'url' => 'required|url:https'
        ]);

        $inputTrainer = Trainer::create($request->only(['name', 'url']));
        return redirect("/trainers/{$inputTrainer->id}");
    }

    public function show(int $id) {
        $showTrainer = Trainer::find($id);

        // METHOD 1: Manual Joins & Queries
        /*
        $pokemon = Pokemon::query()->join('pokemon_trainers', 'pokemon_trainers.pokemon_id', '=', 'pokemon.id')
        ->where('pokemon_trainers.trainer_id', $id)->get();
        */

        // METHOD 2: using Model relationships
        $pokemon = $showTrainer->pokemon;
        //dd($pokemon);
        
        return view('trainers.show', ['trainer' => $showTrainer, 'pokemon' => $pokemon]);
    }

    public function destroy(int $id) {
        $deleteTrainer = Trainer::find($id)->delete();
        return redirect("/trainers");
    }

    public function edit(int $id) {
        $editTrainer = Trainer::find($id);
        return view('trainers.edit', ['editTrainer' => $editTrainer]);
    }

    public function update(Request $request, int $id) {
        $request->validate([
            'name' => 'required|max:30',
            'url' => 'required|url:https'
        ]);

        $updateTrainer = Trainer::find($id);
        $updateTrainer->update($request->only(['name', 'url']));
        return redirect("/trainers/{$updateTrainer->id}");
    }
}