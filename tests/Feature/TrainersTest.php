<?php

namespace Tests\Feature;

use App\Models\Trainer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TrainersTest extends TestCase
{
    use RefreshDatabase;

    protected Trainer $trainer;

    protected function setUp(): void
    {
        parent::setUp();
        $this->trainer = Trainer::factory()->create();
    }

    public function test_user_can_view_all_trainers()
    {
        $response = $this->get('/trainers');

        $response->assertViewIs('trainers.index');
        $response->assertViewHas('trainers', Trainer::all(), 'The trainers.index view should have a collection of all trainers passed to it.');
    }

    public function test_user_can_view_individual_trainer()
    {
        $response = $this->get("/trainers/{$this->trainer->id}");

        $response->assertViewIs('trainers.show');
        $response->assertViewHas('trainer', $this->trainer, 'The show view should have a variable named trainer passed to it.');
    }

    public function test_user_can_view_create_page()
    {
        $response = $this->get("/trainers/create");

        $response->assertViewIs('trainers.create');
    }

    public function test_user_can_create_trainer()
    {
        $response = $this->post("/trainers", ['url' => 'https://google.ca', 'name' => 'Trainer Simon']);

        $trainer = Trainer::latest()->first();

        $this->assertNotEquals($this->trainer->id, $trainer->id, "Trainer was not properly created.");
        $response->assertRedirect("/trainers/{$this->trainer->id}", );
    }

    public function test_user_can_view_edit_page()
    {
        $response = $this->get("/trainers/{$this->trainer->id}/edit");

        $response->assertViewIs('trainers.edit');
        $response->assertViewHas('trainer', $this->trainer, 'The trainers.edit view should have a collection of all trainers passed to it.');
    }

    public function test_user_can_update_trainer()
    {
        $updateArray = [
            'name' => 'New Name Doode',
            'url' => 'https://newguy.com/trainer.png'
        ];

        $response = $this->put("/trainers/{$this->trainer->id}", $updateArray);

        $response->assertRedirect("/trainers/{$this->trainer->id}");

        $this->trainer->refresh();
        $this->assertEquals($updateArray['name'], $this->trainer->name);
        $this->assertEquals($updateArray['url'], $this->trainer->url);
    }

    public function test_user_can_delete_trainer()
    {
        $response = $this->delete("/trainers/{$this->trainer->id}");

        $response->assertRedirect("/trainers");
        $this->assertDatabaseMissing('trainers', ['id' => $this->trainer->id]);
    }
}
