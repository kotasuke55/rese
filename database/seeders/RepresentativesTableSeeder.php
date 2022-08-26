<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Representative;

class RepresentativesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Representative::create([
            'name' => '店舗代表者1',
            'email' => 'test1@example.com',
            'password' => bcrypt('12345678'),
            'shop_id' => '1'
        ]);
            Representative::create([
            'name' => '店舗代表者2',
            'email' => 'test2@example.com',
            'password' => bcrypt('12345678'),
            'shop_id' => '2'
        ]);
            Representative::create([
            'name' => '店舗代表者3',
            'email' => 'test3@example.com',
            'password' => bcrypt('12345678'),
            'shop_id' => '3'
        ]);
    }
}
