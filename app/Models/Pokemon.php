<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;

    protected $guarded = [];

    public const TYPES = ["Fire", "Water", "Grass", "Rock", "Ground"];
}
