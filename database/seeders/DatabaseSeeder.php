<?php

namespace Database\Seeders;

use App\Models\Items;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Pokemon;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        
        /*
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        */

        Items::create([
            'name' => 'Potion',
            'quantity' => 3,
            'trainer_id' => 5
        ]);
        Items::create([
            'name' => 'Elixir',
            'quantity' => 2,
            'trainer_id' => 5
        ]);

        /*
        Pokemon::create([
            'name' => 'Squirtle',
            'description' => 'Likes berries.',
            'type' => 'Water',
            'url' => 'https://www.pokemon.com/static-assets/content-assets/cms2/img/pokedex/full/007.png'
        ]);

        Pokemon::create([
            'name' => 'Charmander',
            'description' => 'Likes arson.',
            'type' => 'Fire',
            'url' => 'https://assets.pokemon.com/assets/cms2/img/pokedex/full//004.png'
        ]);

        Pokemon::create([
            'name' => 'Bulbasaur',
            'description' => 'Likes fruits.',
            'type' => 'Grass',
            'url' => 'https://www.pokemon.com/static-assets/content-assets/cms2/img/pokedex/full/001.png'
        ]);
        */
        //Pokemon::factory(100)->create();
    }
}