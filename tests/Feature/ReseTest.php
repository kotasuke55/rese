<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class ReseTest extends TestCase
{
    use RefreshDatabase;

    public function testRese()
    {
       $response = $this->get('/');
       $response->assertStatus(200);
    }

    public function test_index()
    {
        $user = User::factory()->make();
        $this->actingAs($user);
        $response = $this->get('/');
        $response->assertStatus(200);
    }
}
