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
}
