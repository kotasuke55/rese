<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ShopTest extends TestCase
{
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
        $shop = [
            'id' => '1',
            'shop' => '仙人',
            'content' =>'料理長厳選の食材から作る寿司を用いたコースをぜひお楽しみください。食材・味・価格、お客様の満足度を徹底的に追及したお店です。特別な日のお食事、ビジネス接待まで気軽に使用することができます。',
            'img' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg',
            'area_id' => '1',
            'genre_id' => '1',
        ];
        
        $user = User::factory()->make();
        $user_id = $user->id;
        $response = $this->actingAs($user)->post('/detail',['shop' => $shop, 'user_id'=>$user_id]);
        
        $response->assertRedirect('detail');
    }
}
