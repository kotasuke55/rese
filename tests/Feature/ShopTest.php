<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Shop;
use Database\Seeders;

class ShopTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    /** @test */
    public function ショップ一覧ページにアクセスして画面が表示される()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /** @test */
    public function ショップ詳細ページにアクセスして画面が表示される()
    { 
        $this->seed();
        $shop = Shop::all()->first();
        $shop_id = $shop->id;
        $user = User::factory()->make();
        $user_id = $user->id;
        $response = $this->actingAs($user)->post('/detail',['shop' => $shop, 'user_id'=>$user_id]);

        $response->assertRedirect('/detail');
    }
}
