<?php

namespace Database\Seeders;

use App\Models\Shop;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Shop::create([
            'shop_id'           => 1,
            'name'              => 'admin',
            'address'             => 'Cairo',
            'phone' => '010000',
            'is_active'          => 1
        ]);
    }
}
