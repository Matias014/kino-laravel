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
                'start_time' => Carbon::create(2024, 6, 3, 12, 0, 0),
                'end_time' => Carbon::create(2024, 6, 3, 12, 16, 0)
            ],
            [
                'film_id' => 12,
                'screening_room_id' => 2,
                'worker_id' => 2,
                'technology_id' => 2,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 6, 2, 20, 0, 0),
                'end_time' => Carbon::create(2024, 6, 2, 21, 46, 0)
            ],
            [
                'film_id' => 23,
                'screening_room_id' => 1,
                'worker_id' => 1,
                'technology_id' => 1,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 6, 3, 18, 0, 0),
                'end_time' => Carbon::create(2024, 6, 3, 19, 58, 0)
            ],
            [
                'film_id' => 2,
                'screening_room_id' => 2,
                'worker_id' => 2,
                'technology_id' => 2,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 6, 4, 16, 0, 0),
                'end_time' => Carbon::create(2024, 6, 4, 18, 6, 0)
            ],
            [
                'film_id' => 3,
                'screening_room_id' => 1,
                'worker_id' => 1,
                'technology_id' => 1,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 6, 5, 18, 0, 0),
                'end_time' => Carbon::create(2024, 6, 5, 20, 28, 0)
            ],
            [
                'film_id' => 4,
                'screening_room_id' => 2,
                'worker_id' => 2,
                'technology_id' => 2,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 6, 6, 20, 0, 0),
                'end_time' => Carbon::create(2024, 6, 6, 22, 49, 0)
            ],
            [
                'film_id' => 5,
                'screening_room_id' => 1,
                'worker_id' => 1,
                'technology_id' => 1,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 6, 7, 14, 0, 0),
                'end_time' => Carbon::create(2024, 6, 7, 16, 22, 0)
            ],
            [
                'film_id' => 6,
                'screening_room_id' => 2,
                'worker_id' => 2,
                'technology_id' => 2,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 6, 8, 16, 0, 0),
                'end_time' => Carbon::create(2024, 6, 8, 18, 42, 0)
            ],
            [
                'film_id' => 7,
                'screening_room_id' => 1,
                'worker_id' => 1,
                'technology_id' => 1,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 6, 9, 18, 0, 0),
                'end_time' => Carbon::create(2024, 6, 9, 20, 33, 0)
            ],
            [
                'film_id' => 8,
                'screening_room_id' => 2,
                'worker_id' => 2,
                'technology_id' => 2,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 6, 10, 20, 0, 0),
                'end_time' => Carbon::create(2024, 6, 10, 22, 44, 0)
            ],
            [
                'film_id' => 9,
                'screening_room_id' => 1,
                'worker_id' => 1,
                'technology_id' => 1,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 6, 11, 14, 0, 0),
                'end_time' => Carbon::create(2024, 6, 11, 16, 14, 0)
            ],
            [
                'film_id' => 10,
                'screening_room_id' => 2,
                'worker_id' => 2,
                'technology_id' => 2,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 6, 12, 16, 0, 0),
                'end_time' => Carbon::create(2024, 6, 12, 18, 45, 0)
            ],
            [
                'film_id' => 11,
                'screening_room_id' => 1,
                'worker_id' => 1,
                'technology_id' => 1,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 6, 13, 18, 0, 0),
                'end_time' => Carbon::create(2024, 6, 13, 19, 46, 0)
            ],
            [
                'film_id' => 13,
                'screening_room_id' => 1,
                'worker_id' => 1,
                'technology_id' => 1,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 6, 14, 14, 0, 0),
                'end_time' => Carbon::create(2024, 6, 14, 15, 52, 0)
            ],
            [
                'film_id' => 14,
                'screening_room_id' => 2,
                'worker_id' => 2,
                'technology_id' => 2,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 6, 15, 16, 0, 0),
                'end_time' => Carbon::create(2024, 6, 15, 18, 46, 0)
            ],
            [
                'film_id' => 15,
                'screening_room_id' => 1,
                'worker_id' => 1,
                'technology_id' => 1,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 6, 16, 18, 0, 0),
                'end_time' => Carbon::create(2024, 6, 16, 19, 34, 0)
            ],
            [
                'film_id' => 16,
                'screening_room_id' => 2,
                'worker_id' => 2,
                'technology_id' => 2,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 6, 17, 20, 0, 0),
                'end_time' => Carbon::create(2024, 6, 17, 21, 48, 0)
            ],
            [
                'film_id' => 17,
                'screening_room_id' => 1,
                'worker_id' => 1,
                'technology_id' => 1,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 6, 18, 14, 0, 0),
                'end_time' => Carbon::create(2024, 6, 18, 16, 4, 0)
            ],
            [
                'film_id' => 18,
                'screening_room_id' => 2,
                'worker_id' => 2,
                'technology_id' => 2,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 6, 19, 16, 0, 0),
                'end_time' => Carbon::create(2024, 6, 19, 17, 58, 0)
            ],
            [
                'film_id' => 19,
                'screening_room_id' => 1,
                'worker_id' => 1,
                'technology_id' => 1,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 6, 20, 18, 0, 0),
                'end_time' => Carbon::create(2024, 6, 20, 19, 47, 0)
            ],
            [
                'film_id' => 20,
                'screening_room_id' => 2,
                'worker_id' => 2,
                'technology_id' => 2,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 6, 21, 20, 0, 0),
                'end_time' => Carbon::create(2024, 6, 21, 22, 32, 0)
            ],
            [
                'film_id' => 21,
                'screening_room_id' => 1,
                'worker_id' => 1,
                'technology_id' => 1,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 6, 22, 14, 0, 0),
                'end_time' => Carbon::create(2024, 6, 22, 15, 48, 0)
            ],
            [
                'film_id' => 22,
                'screening_room_id' => 2,
                'worker_id' => 2,
                'technology_id' => 2,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 6, 23, 16, 0, 0),
                'end_time' => Carbon::create(2024, 6, 23, 17, 53, 0)
            ],
            [
                'film_id' => 24,
                'screening_room_id' => 2,
                'worker_id' => 2,
                'technology_id' => 2,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 6, 24, 20, 0, 0),
                'end_time' => Carbon::create(2024, 6, 24, 21, 54, 0)
            ],
            [
                'film_id' => 25,
                'screening_room_id' => 1,
                'worker_id' => 1,
                'technology_id' => 1,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 6, 25, 14, 0, 0),
                'end_time' => Carbon::create(2024, 6, 25, 15, 53, 0)
            ]
        ]);
    }
}
