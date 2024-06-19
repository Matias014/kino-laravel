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
        $seances = [
            [
                'film_id' => 1, // Avengers: Koniec gry
                'screening_room_id' => 1,
                'worker_id' => 1,
                'technology_id' => 1,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 6, 18, 12, 0, 0),
                'end_time' => Carbon::create(2024, 6, 18, 15, 1, 0)
            ],
            [
                'film_id' => 2, // Batman
                'screening_room_id' => 2,
                'worker_id' => 2,
                'technology_id' => 2,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 6, 18, 16, 0, 0),
                'end_time' => Carbon::create(2024, 6, 18, 18, 6, 0)
            ],
            [
                'film_id' => 3, // Incepcja
                'screening_room_id' => 1,
                'worker_id' => 1,
                'technology_id' => 1,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 6, 18, 19, 0, 0),
                'end_time' => Carbon::create(2024, 6, 18, 21, 28, 0)
            ],
            [
                'film_id' => 4, // Interstellar
                'screening_room_id' => 2,
                'worker_id' => 2,
                'technology_id' => 2,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 6, 19, 12, 0, 0),
                'end_time' => Carbon::create(2024, 6, 19, 14, 49, 0)
            ],
            [
                'film_id' => 5, // Skazani na Shawshank
                'screening_room_id' => 1,
                'worker_id' => 1,
                'technology_id' => 1,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 6, 19, 16, 0, 0),
                'end_time' => Carbon::create(2024, 6, 19, 18, 22, 0)
            ],
            [
                'film_id' => 6, // Avatar
                'screening_room_id' => 2,
                'worker_id' => 2,
                'technology_id' => 2,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 6, 19, 19, 0, 0),
                'end_time' => Carbon::create(2024, 6, 19, 21, 42, 0)
            ],
            [
                'film_id' => 7, // Bękarty wojny
                'screening_room_id' => 1,
                'worker_id' => 1,
                'technology_id' => 1,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 6, 20, 12, 0, 0),
                'end_time' => Carbon::create(2024, 6, 20, 14, 33, 0)
            ],
            [
                'film_id' => 8, // Blade Runner 2049
                'screening_room_id' => 2,
                'worker_id' => 2,
                'technology_id' => 2,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 6, 20, 16, 0, 0),
                'end_time' => Carbon::create(2024, 6, 20, 18, 44, 0)
            ],
            [
                'film_id' => 9, // Bohemian Rhapsody
                'screening_room_id' => 1,
                'worker_id' => 1,
                'technology_id' => 1,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 6, 20, 19, 0, 0),
                'end_time' => Carbon::create(2024, 6, 20, 21, 14, 0)
            ],
            [
                'film_id' => 10, // Django
                'screening_room_id' => 2,
                'worker_id' => 2,
                'technology_id' => 2,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 6, 21, 12, 0, 0),
                'end_time' => Carbon::create(2024, 6, 21, 14, 45, 0)
            ],
            [
                'film_id' => 11, // Dunkierka
                'screening_room_id' => 1,
                'worker_id' => 1,
                'technology_id' => 1,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 6, 21, 16, 0, 0),
                'end_time' => Carbon::create(2024, 6, 21, 17, 46, 0)
            ],
            [
                'film_id' => 12, // Dystrykt 9
                'screening_room_id' => 2,
                'worker_id' => 2,
                'technology_id' => 2,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 6, 21, 19, 0, 0),
                'end_time' => Carbon::create(2024, 6, 21, 20, 52, 0)
            ],
            [
                'film_id' => 13, // Faceci w czerni
                'screening_room_id' => 1,
                'worker_id' => 1,
                'technology_id' => 1,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 6, 22, 12, 0, 0),
                'end_time' => Carbon::create(2024, 6, 22, 13, 38, 0)
            ],
            [
                'film_id' => 14, // Furia
                'screening_room_id' => 2,
                'worker_id' => 2,
                'technology_id' => 2,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 6, 22, 16, 0, 0),
                'end_time' => Carbon::create(2024, 6, 22, 18, 14, 0)
            ],
            [
                'film_id' => 15, // Gwiezdne wojny: część III - Zemsta Sithów
                'screening_room_id' => 1,
                'worker_id' => 1,
                'technology_id' => 1,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 6, 22, 19, 0, 0),
                'end_time' => Carbon::create(2024, 6, 22, 21, 20, 0)
            ],
            [
                'film_id' => 16, // Jak wytresować smoka
                'screening_room_id' => 2,
                'worker_id' => 2,
                'technology_id' => 2,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 6, 23, 12, 0, 0),
                'end_time' => Carbon::create(2024, 6, 23, 13, 38, 0)
            ],
            [
                'film_id' => 17, // Król Lew
                'screening_room_id' => 1,
                'worker_id' => 1,
                'technology_id' => 1,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 6, 23, 16, 0, 0),
                'end_time' => Carbon::create(2024, 6, 23, 17, 28, 0)
            ],
            [
                'film_id' => 18, // Marsjanin
                'screening_room_id' => 2,
                'worker_id' => 2,
                'technology_id' => 2,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 6, 23, 19, 0, 0),
                'end_time' => Carbon::create(2024, 6, 23, 21, 24, 0)
            ],
            [
                'film_id' => 19, // Matrix
                'screening_room_id' => 1,
                'worker_id' => 1,
                'technology_id' => 1,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 6, 24, 12, 0, 0),
                'end_time' => Carbon::create(2024, 6, 24, 14, 16, 0)
            ],
            [
                'film_id' => 20, // Ratatuj
                'screening_room_id' => 2,
                'worker_id' => 2,
                'technology_id' => 2,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 6, 24, 16, 0, 0),
                'end_time' => Carbon::create(2024, 6, 24, 17, 51, 0)
            ],
            [
                'film_id' => 21, // Sherlock Holmes
                'screening_room_id' => 1,
                'worker_id' => 1,
                'technology_id' => 1,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 6, 24, 19, 0, 0),
                'end_time' => Carbon::create(2024, 6, 24, 21, 8, 0)
            ],
            [
                'film_id' => 22, // Strażnicy Galaktyki
                'screening_room_id' => 2,
                'worker_id' => 2,
                'technology_id' => 2,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 6, 25, 12, 0, 0),
                'end_time' => Carbon::create(2024, 6, 25, 14, 1, 0)
            ],
            [
                'film_id' => 23, // Szybcy i wściekli
                'screening_room_id' => 1,
                'worker_id' => 1,
                'technology_id' => 1,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 6, 25, 16, 0, 0),
                'end_time' => Carbon::create(2024, 6, 25, 17, 47, 0)
            ],
            [
                'film_id' => 24, // Titanic
                'screening_room_id' => 2,
                'worker_id' => 2,
                'technology_id' => 2,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 6, 25, 19, 0, 0),
                'end_time' => Carbon::create(2024, 6, 25, 22, 15, 0)
            ],
            [
                'film_id' => 25, // WALL-E
                'screening_room_id' => 1,
                'worker_id' => 1,
                'technology_id' => 1,
                'promotion_id' => 1,
                'start_time' => Carbon::create(2024, 6, 26, 12, 0, 0),
                'end_time' => Carbon::create(2024, 6, 26, 13, 38, 0)
            ],
        ];

        Seance::insert($seances);
    }
}
