<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::insert([
            [
                'NAME' => 'Popcorn',
                'PRICE' => 5.99
            ],
            [
                'NAME' => 'Soda',
                'PRICE' => 2.99
            ],
            [
                'NAME' => 'Cukierki',
                'PRICE' => 1.49
            ],
            [
                'NAME' => 'Nachos',
                'PRICE' => 4.99
            ],
            [
                'NAME' => 'Hot Dog',
                'PRICE' => 3.99
            ]
        ]);
    }
}
