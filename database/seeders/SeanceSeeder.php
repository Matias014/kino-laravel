<?php

namespace Database\Seeders;

use App\Models\Seance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SeanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Seance::insert([
            [
                'film_id' => 1,
                'screening_room_id' => 1,
                'worker_id' => 1,
                'technology_id' => 1,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 5, 19, 14, 0, 0),
                'end_time' => Carbon::create(2024, 5, 19, 17, 1, 0)
            ],
            [
                'film_id' => 12,
                'screening_room_id' => 2,
                'worker_id' => 2,
                'technology_id' => 2,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 5, 19, 20, 0, 0),
                'end_time' => Carbon::create(2024, 5, 19, 21, 46, 0)
            ],
            [
                'film_id' => 23,
                'screening_room_id' => 1,
                'worker_id' => 1,
                'technology_id' => 1,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 5, 19, 18, 0, 0),
                'end_time' => Carbon::create(2024, 5, 19, 19, 58, 0)
            ],
            [
                'film_id' => 2,
                'screening_room_id' => 2,
                'worker_id' => 2,
                'technology_id' => 2,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 5, 20, 16, 0, 0),
                'end_time' => Carbon::create(2024, 5, 20, 18, 6, 0)
            ],
            [
                'film_id' => 3,
                'screening_room_id' => 1,
                'worker_id' => 1,
                'technology_id' => 1,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 5, 21, 18, 0, 0),
                'end_time' => Carbon::create(2024, 5, 21, 20, 28, 0)
            ],
            [
                'film_id' => 4,
                'screening_room_id' => 2,
                'worker_id' => 2,
                'technology_id' => 2,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 5, 22, 20, 0, 0),
                'end_time' => Carbon::create(2024, 5, 22, 22, 49, 0)
            ],
            [
                'film_id' => 5,
                'screening_room_id' => 1,
                'worker_id' => 1,
                'technology_id' => 1,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 5, 23, 14, 0, 0),
                'end_time' => Carbon::create(2024, 5, 23, 16, 22, 0)
            ],
            [
                'film_id' => 6,
                'screening_room_id' => 2,
                'worker_id' => 2,
                'technology_id' => 2,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 5, 24, 16, 0, 0),
                'end_time' => Carbon::create(2024, 5, 24, 18, 42, 0)
            ],
            [
                'film_id' => 7,
                'screening_room_id' => 1,
                'worker_id' => 1,
                'technology_id' => 1,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 5, 25, 18, 0, 0),
                'end_time' => Carbon::create(2024, 5, 25, 20, 33, 0)
            ],
            [
                'film_id' => 8,
                'screening_room_id' => 2,
                'worker_id' => 2,
                'technology_id' => 2,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 5, 26, 20, 0, 0),
                'end_time' => Carbon::create(2024, 5, 26, 22, 44, 0)
            ],
            [
                'film_id' => 9,
                'screening_room_id' => 1,
                'worker_id' => 1,
                'technology_id' => 1,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 5, 27, 14, 0, 0),
                'end_time' => Carbon::create(2024, 5, 27, 16, 14, 0)
            ],
            [
                'film_id' => 10,
                'screening_room_id' => 2,
                'worker_id' => 2,
                'technology_id' => 2,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 5, 28, 16, 0, 0),
                'end_time' => Carbon::create(2024, 5, 28, 18, 45, 0)
            ],
            [
                'film_id' => 11,
                'screening_room_id' => 1,
                'worker_id' => 1,
                'technology_id' => 1,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 5, 29, 18, 0, 0),
                'end_time' => Carbon::create(2024, 5, 29, 19, 46, 0)
            ],
            [
                'film_id' => 13,
                'screening_room_id' => 1,
                'worker_id' => 1,
                'technology_id' => 1,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 5, 20, 14, 0, 0),
                'end_time' => Carbon::create(2024, 5, 20, 15, 52, 0)
            ],
            [
                'film_id' => 14,
                'screening_room_id' => 2,
                'worker_id' => 2,
                'technology_id' => 2,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 5, 21, 16, 0, 0),
                'end_time' => Carbon::create(2024, 5, 21, 18, 46, 0)
            ],
            [
                'film_id' => 15,
                'screening_room_id' => 1,
                'worker_id' => 1,
                'technology_id' => 1,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 5, 22, 18, 0, 0),
                'end_time' => Carbon::create(2024, 5, 22, 19, 34, 0)
            ],
            [
                'film_id' => 16,
                'screening_room_id' => 2,
                'worker_id' => 2,
                'technology_id' => 2,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 5, 23, 20, 0, 0),
                'end_time' => Carbon::create(2024, 5, 23, 21, 48, 0)
            ],
            [
                'film_id' => 17,
                'screening_room_id' => 1,
                'worker_id' => 1,
                'technology_id' => 1,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 5, 24, 14, 0, 0),
                'end_time' => Carbon::create(2024, 5, 24, 16, 4, 0)
            ],
            [
                'film_id' => 18,
                'screening_room_id' => 2,
                'worker_id' => 2,
                'technology_id' => 2,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 5, 25, 16, 0, 0),
                'end_time' => Carbon::create(2024, 5, 25, 17, 58, 0)
            ],
            [
                'film_id' => 19,
                'screening_room_id' => 1,
                'worker_id' => 1,
                'technology_id' => 1,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 5, 26, 18, 0, 0),
                'end_time' => Carbon::create(2024, 5, 26, 19, 47, 0)
            ],
            [
                'film_id' => 20,
                'screening_room_id' => 2,
                'worker_id' => 2,
                'technology_id' => 2,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 5, 27, 20, 0, 0),
                'end_time' => Carbon::create(2024, 5, 27, 22, 32, 0)
            ],
            [
                'film_id' => 21,
                'screening_room_id' => 1,
                'worker_id' => 1,
                'technology_id' => 1,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 5, 28, 14, 0, 0),
                'end_time' => Carbon::create(2024, 5, 28, 15, 48, 0)
            ],
            [
                'film_id' => 22,
                'screening_room_id' => 2,
                'worker_id' => 2,
                'technology_id' => 2,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 5, 29, 16, 0, 0),
                'end_time' => Carbon::create(2024, 5, 29, 17, 53, 0)
            ],
            [
                'film_id' => 24,
                'screening_room_id' => 2,
                'worker_id' => 2,
                'technology_id' => 2,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 5, 20, 20, 0, 0),
                'end_time' => Carbon::create(2024, 5, 20, 21, 54, 0)
            ],
            [
                'film_id' => 25,
                'screening_room_id' => 1,
                'worker_id' => 1,
                'technology_id' => 1,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 5, 21, 14, 0, 0),
                'end_time' => Carbon::create(2024, 5, 21, 15, 53, 0)
            ]
        ]);
    }
}
