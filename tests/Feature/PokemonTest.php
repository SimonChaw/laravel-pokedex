<?php

namespace Tests\Feature;

use App\Models\Pokemon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PokemonTest extends TestCase
{
    use RefreshDatabase;

    protected Pokemon $pokemon;

    protected function setUp(): void
    {
        parent::setUp();
        $this->pokemon = Pokemon::factory()->create();
    }

    public function test_user_can_view_all_pokemon()
    {
        $response = $this->get('/pokemon');

        $response->assertViewIs('pokemon.index');
        $response->assertViewHas('pokemon', pokemon::all());
    }

    public function test_user_can_view_individual_pokemon()
    {
        $response = $this->get("/pokemon/{$this->pokemon->id}");

        $response->assertViewIs('pokemon.show');
        $response->assertViewHas('mon', $this->pokemon, "View should have a variable passed to it called mon.");
    }

    public function test_user_can_view_create_page()
    {
        $response = $this->get("/pokemon/create");

        $response->assertViewIs('pokemon.create');
    }

    public function test_user_can_create_pokemon()
    {
        $response = $this->post("/pokemon", ['url' => 'https://google.ca', 'name' => 'Bulbas', 'description' => 'Is bulbus', 'type' => 'Grass']);
        $pokemon = Pokemon::orderBy('id', 'desc')->first();
        $response->assertRedirect("/pokemon/{$pokemon->id}");

        $this->assertNotEquals($this->pokemon->id, $pokemon->id, "Pokemon was not properly created.");
    }

    public function test_user_can_view_edit_page()
    {
        $response = $this->get("/pokemon/{$this->pokemon->id}/edit");

        $response->assertViewIs('pokemon.edit');
        $response->assertViewHas('editMon', $this->pokemon, "View should have a variable named editMon passed to it.");
    }

    public function test_user_can_update_pokemon()
    {
        $updateArray = [
            'name' => 'New Pokemon Name',
            'url' => 'https://newguy.com/pokemon.png',
            'description' => 'New description',
            'type' => 'Poison'
        ];

        $response = $this->put("/pokemon/{$this->pokemon->id}", $updateArray);

        $response->assertRedirect("/pokemon/{$this->pokemon->id}");

        $this->pokemon->refresh();
        $this->assertEquals($updateArray['name'], $this->pokemon->name);
        $this->assertEquals($updateArray['url'], $this->pokemon->url);
        $this->assertEquals($updateArray['description'], $this->pokemon->description);
        $this->assertEquals($updateArray['type'], $this->pokemon->type);
    }

    public function test_user_can_delete_pokemon()
    {
        $response = $this->delete("/pokemon/{$this->pokemon->id}");

        $response->assertRedirect("/pokemon");
        $this->assertDatabaseMissing('pokemon', ['id' => $this->pokemon->id]);
    }
}
