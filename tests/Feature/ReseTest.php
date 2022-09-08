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
       User::factory()->create([
            'name' => 'aaa',
            'email' => 'test@example.com',
            'password' => '12345678'
       ]);
       $this->assertDatabaseHas('users',[
            'name' => 'aaa',
            'email' => 'test@example.com',
            'password' => '12345678'
       ]);
    }
}
