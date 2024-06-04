<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;

    protected $guarded = [];
        // Allows assigning values to arrays.
        // Without it, no arrays can be filled out.

    public function pokemon()
    {
        return $this->belongsToMany(Pokemon::class, 'pokemon_trainers')->withPivot('nickname');
            // 1st argument: Class name for the table we want to GET to.
            // 2nd argument: Name of table that connects them.
            // "withPivot" lets me include specific rows from the Db that I want
    }
}