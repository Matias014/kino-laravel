<?php

namespace Database\Seeders;

use App\Models\Reservation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Reservation::insert([
            [
                'seance_id' => 1,
                'client_id' => 1,
            ],
            [
                'seance_id' => 1,
                'client_id' => 2,
            ],
            [
                'seance_id' => 2,
                'client_id' => 3,
            ],
            [
                'seance_id' => 2,
                'client_id' => 4,
            ],
            [
                'seance_id' => 1,
                'client_id' => 5,
            ]
        ]);
    }
}
