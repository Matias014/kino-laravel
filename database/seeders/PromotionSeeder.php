<?php

namespace Database\Seeders;

use App\Models\Promotion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Promotion::insert(
            [
                [
                    'DISCOUNT' => 10, 'START_TIME' => '2024-05-14 08:00:00', 'END_TIME' => '2024-05-14 10:00:00'
                ]
            ]
        );
    }
}
