<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Like;
use App\Models\User;
use App\Models\Shop;
use Database\Seeders;
use Illuminate\Support\Facades\Auth;

class LikeTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        
        $shop = Shop::all()->first();
        $user = User::factory()->make();
        $shop_id = $shop->id;
        $user_id = $user->id;
        $this->actingAs($user);
        $response = $this->post('like',[
            'shop_id' => $shop_id,
            'user_id' => $user_id
        ]);
        
        $response->assertRedirect('/');
    }
}
