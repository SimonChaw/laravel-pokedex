<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use App\Models\Trainer;
use Illuminate\Http\Request;

class PokemonTrainerController extends Controller
{
    public function addMon(int $id) {
        $inputMon = Pokemon::find($id);
        $inputTrainer = Trainer::find($id);
    }

    public function removeMon() {

    }

    public function updateName() {
        
    }
}
