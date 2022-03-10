<?php

namespace Tests\Feature;

use App\Models\Travel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class travelsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    Use RefreshDatabase;
    public function testGetTravels()
    {
        Travel::factory(5)->create();
        $response = $this->getJson('/api/travels');
        $response->assertStatus(200);
        $response->assertJson(Travel::all()->toArray());
    }

    public function testGetTravel()
    {
        Travel::factory()->create();
        $travel = Travel::pluck('id')->first();
        $response = $this->getJson('/api/travel/'.$travel);
        $response->assertStatus(200);
        $response->assertJson(Travel::first()->toArray());
    }
}
