<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;

    protected $guarded = [];

    public const TYPES = ["Normal", "Fire", "Water", "Electric", "Grass", "Ice",
                        "Fighting", "Poison", "Ground", "Flying", "Psychic", "Bug",
                        "Rock", "Ghost", "Dragon", "Dark", "Steel", "Fairy"];
}