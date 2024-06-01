<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            FilmSeeder::class,
            ProductSeeder::class,
            PromotionSeeder::class,
            VoucherSeeder::class,
            WorkerSeeder::class,
            ScreeningRoomSeeder::class,
            TechnologySeeder::class,
            SeanceSeeder::class,
            SeatSeeder::class,
            ReservationSeeder::class,
            TicketSeeder::class,
            ReservationSeatSeeder::class,
            ReservationProductSeeder::class,
        ]);
    }
}
