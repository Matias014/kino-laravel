<?php

namespace Database\Seeders;

use App\Models\ReservationProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservationProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ReservationProduct::insert([
            // [
            //     'PRODUCT_ID' => 1,
            //     'RESERVATION_ID' => 1,
            // ],
            // [
            //     'PRODUCT_ID' => 2,
            //     'RESERVATION_ID' => 1,
            // ],
            // [
            //     'PRODUCT_ID' => 3,
            //     'RESERVATION_ID' => 2,
            // ],
            // [
            //     'PRODUCT_ID' => 4,
            //     'RESERVATION_ID' => 2,
            // ],
            // [
            //     'PRODUCT_ID' => 5,
            //     'RESERVATION_ID' => 3,
            // ]
        ]);
    }
}
