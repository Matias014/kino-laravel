<?php

namespace Database\Seeders;

use App\Models\ScreeningRoom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScreeningRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ScreeningRoom::insert(
            [
                [
                    'SEATS' => 100, 'ROWS' => 10
                ],
                [
                    'SEATS' => 120, 'ROWS' => 12
                ]
            ]
        );
    }
}
