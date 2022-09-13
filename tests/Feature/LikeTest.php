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
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $user = User::factory()->make();
        $shop = Shop::all();
        $like = Like::factory()->create([
                        'user_id' => $this->user->id,
                        'shop_id' => $this->shop->id
                        ]);
                        dd($like);
    }
}
