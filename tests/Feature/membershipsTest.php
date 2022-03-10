<?php

namespace Tests\Feature;

use App\Models\Membership;
use App\Models\Travel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class membershipsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    Use RefreshDatabase;
    public function testGetMemberships()
    {
        Membership::factory(5)->create();
        $response = $this->getJson('/api/membership');
        $response->assertStatus(200);
        $response->assertJson(Travel::all()->toArray());
    }

    public function testGetMembership()
    {
        Membership::factory()->create();
        $membership = Membership::pluck('id')->first();
        $response = $this->getJson('/api/membership/'.$membership);
        $response->assertStatus(200);
        $response->assertJson(Membership::first()->toArray());
    }
}
