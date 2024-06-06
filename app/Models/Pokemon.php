<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;

    protected $guarded = [];

    public const TYPES = [  "Normal", "Fire", "Water", "Electric", "Grass", "Ice",
                            "Fighting", "Poison", "Ground", "Flying", "Psychic", "Bug",
                            "Rock", "Ghost", "Dragon", "Dark", "Steel", "Fairy"];


    /*private const COLORS = ["Gainsboro", "Crimson", "DodgerBlue", "SandyBrown", "LimeGreen", "LightBlue",
                            "FireBrick", "DarkOrchid", "BurlyWood", "Lavender", "LightPink", "YellowGreen",
                            "Peru", "DarkSlateBlue", "SlateBlue", "Black", "SteelBlue", "Violet"];
    */

    public static function typeColor(string $type)
    {
        $colors = [ "Gainsboro", "Crimson", "DodgerBlue", "SandyBrown", "LimeGreen", "LightBlue",
                    "FireBrick", "DarkOrchid", "BurlyWood", "Lavender", "LightPink", "YellowGreen",
                    "Peru", "DarkSlateBlue", "SlateBlue", "Black", "SteelBlue", "Violet"];
        
        $index = array_search($type, self::TYPES);

        if ($index === false) {
            throw new Exception("Couldn't find type:$type");
        }

        return $colors[$index];
    }
}