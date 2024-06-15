<?php

namespace Database\Seeders;

use App\Models\ScreeningRoom;
use App\Models\Seat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $seats = [];
        // $screeningRooms = ScreeningRoom::all();

        // foreach ($screeningRooms as $room) {
        //     for ($row = 1; $row <= $room->ROW; $row++) {
        //         for ($seatInRow = 1; $seatInRow <= ($room->SEAT / $room->ROW); $seatInRow++) {
        //             $isVip = ($row <= 2 || $seatInRow <= 2) ? 'T' : 'N'; // Assuming VIP seats are in the first two rows or first two seats of each row

        //             $seats[] = [
        //                 'screening_room_id' => $room->id,
        //                 'ROW' => $row,
        //                 'SEAT_IN_ROW' => $seatInRow,
        //                 'VIP' => $isVip
        //             ];
        //         }
        //     }
        // }

        // // Insert all seats at once
        // Seat::insert($seats);

        Seat::insert([
            // Seats for Screening Room 1
            ['screening_room_id' => 1, 'ROW_NUMBER' => 1, 'SEAT_IN_ROW' => 1, 'VIP' => 'T'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 1, 'SEAT_IN_ROW' => 2, 'VIP' => 'T'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 1, 'SEAT_IN_ROW' => 3, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 1, 'SEAT_IN_ROW' => 4, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 1, 'SEAT_IN_ROW' => 5, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 1, 'SEAT_IN_ROW' => 6, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 1, 'SEAT_IN_ROW' => 7, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 1, 'SEAT_IN_ROW' => 8, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 1, 'SEAT_IN_ROW' => 9, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 1, 'SEAT_IN_ROW' => 10, 'VIP' => 'N'],

            ['screening_room_id' => 1, 'ROW_NUMBER' => 2, 'SEAT_IN_ROW' => 1, 'VIP' => 'T'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 2, 'SEAT_IN_ROW' => 2, 'VIP' => 'T'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 2, 'SEAT_IN_ROW' => 3, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 2, 'SEAT_IN_ROW' => 4, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 2, 'SEAT_IN_ROW' => 5, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 2, 'SEAT_IN_ROW' => 6, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 2, 'SEAT_IN_ROW' => 7, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 2, 'SEAT_IN_ROW' => 8, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 2, 'SEAT_IN_ROW' => 9, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 2, 'SEAT_IN_ROW' => 10, 'VIP' => 'N'],

            ['screening_room_id' => 1, 'ROW_NUMBER' => 3, 'SEAT_IN_ROW' => 1, 'VIP' => 'T'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 3, 'SEAT_IN_ROW' => 2, 'VIP' => 'T'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 3, 'SEAT_IN_ROW' => 3, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 3, 'SEAT_IN_ROW' => 4, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 3, 'SEAT_IN_ROW' => 5, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 3, 'SEAT_IN_ROW' => 6, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 3, 'SEAT_IN_ROW' => 7, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 3, 'SEAT_IN_ROW' => 8, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 3, 'SEAT_IN_ROW' => 9, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 3, 'SEAT_IN_ROW' => 10, 'VIP' => 'N'],

            ['screening_room_id' => 1, 'ROW_NUMBER' => 4, 'SEAT_IN_ROW' => 1, 'VIP' => 'T'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 4, 'SEAT_IN_ROW' => 2, 'VIP' => 'T'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 4, 'SEAT_IN_ROW' => 3, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 4, 'SEAT_IN_ROW' => 4, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 4, 'SEAT_IN_ROW' => 5, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 4, 'SEAT_IN_ROW' => 6, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 4, 'SEAT_IN_ROW' => 7, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 4, 'SEAT_IN_ROW' => 8, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 4, 'SEAT_IN_ROW' => 9, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 4, 'SEAT_IN_ROW' => 10, 'VIP' => 'N'],

            ['screening_room_id' => 1, 'ROW_NUMBER' => 5, 'SEAT_IN_ROW' => 1, 'VIP' => 'T'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 5, 'SEAT_IN_ROW' => 2, 'VIP' => 'T'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 5, 'SEAT_IN_ROW' => 3, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 5, 'SEAT_IN_ROW' => 4, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 5, 'SEAT_IN_ROW' => 5, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 5, 'SEAT_IN_ROW' => 6, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 5, 'SEAT_IN_ROW' => 7, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 5, 'SEAT_IN_ROW' => 8, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 5, 'SEAT_IN_ROW' => 9, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 5, 'SEAT_IN_ROW' => 10, 'VIP' => 'N'],

            ['screening_room_id' => 1, 'ROW_NUMBER' => 6, 'SEAT_IN_ROW' => 1, 'VIP' => 'T'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 6, 'SEAT_IN_ROW' => 2, 'VIP' => 'T'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 6, 'SEAT_IN_ROW' => 3, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 6, 'SEAT_IN_ROW' => 4, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 6, 'SEAT_IN_ROW' => 5, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 6, 'SEAT_IN_ROW' => 6, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 6, 'SEAT_IN_ROW' => 7, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 6, 'SEAT_IN_ROW' => 8, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 6, 'SEAT_IN_ROW' => 9, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 6, 'SEAT_IN_ROW' => 10, 'VIP' => 'N'],

            ['screening_room_id' => 1, 'ROW_NUMBER' => 7, 'SEAT_IN_ROW' => 1, 'VIP' => 'T'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 7, 'SEAT_IN_ROW' => 2, 'VIP' => 'T'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 7, 'SEAT_IN_ROW' => 3, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 7, 'SEAT_IN_ROW' => 4, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 7, 'SEAT_IN_ROW' => 5, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 7, 'SEAT_IN_ROW' => 6, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 7, 'SEAT_IN_ROW' => 7, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 7, 'SEAT_IN_ROW' => 8, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 7, 'SEAT_IN_ROW' => 9, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 7, 'SEAT_IN_ROW' => 10, 'VIP' => 'N'],

            ['screening_room_id' => 1, 'ROW_NUMBER' => 8, 'SEAT_IN_ROW' => 1, 'VIP' => 'T'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 8, 'SEAT_IN_ROW' => 2, 'VIP' => 'T'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 8, 'SEAT_IN_ROW' => 3, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 8, 'SEAT_IN_ROW' => 4, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 8, 'SEAT_IN_ROW' => 5, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 8, 'SEAT_IN_ROW' => 6, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 8, 'SEAT_IN_ROW' => 7, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 8, 'SEAT_IN_ROW' => 8, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 8, 'SEAT_IN_ROW' => 9, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 8, 'SEAT_IN_ROW' => 10, 'VIP' => 'N'],

            ['screening_room_id' => 1, 'ROW_NUMBER' => 9, 'SEAT_IN_ROW' => 1, 'VIP' => 'T'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 9, 'SEAT_IN_ROW' => 2, 'VIP' => 'T'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 9, 'SEAT_IN_ROW' => 3, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 9, 'SEAT_IN_ROW' => 4, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 9, 'SEAT_IN_ROW' => 5, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 9, 'SEAT_IN_ROW' => 6, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 9, 'SEAT_IN_ROW' => 7, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 9, 'SEAT_IN_ROW' => 8, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 9, 'SEAT_IN_ROW' => 9, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 9, 'SEAT_IN_ROW' => 10, 'VIP' => 'N'],

            ['screening_room_id' => 1, 'ROW_NUMBER' => 10, 'SEAT_IN_ROW' => 1, 'VIP' => 'T'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 10, 'SEAT_IN_ROW' => 2, 'VIP' => 'T'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 10, 'SEAT_IN_ROW' => 3, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 10, 'SEAT_IN_ROW' => 4, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 10, 'SEAT_IN_ROW' => 5, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 10, 'SEAT_IN_ROW' => 6, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 10, 'SEAT_IN_ROW' => 7, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 10, 'SEAT_IN_ROW' => 8, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 10, 'SEAT_IN_ROW' => 9, 'VIP' => 'N'],
            ['screening_room_id' => 1, 'ROW_NUMBER' => 10, 'SEAT_IN_ROW' => 10, 'VIP' => 'N'],


            // ... (add remaining seats for Screening Room 1)

            // Seats for Screening Room 2
            ['screening_room_id' => 2, 'ROW_NUMBER' => 1, 'SEAT_IN_ROW' => 1, 'VIP' => 'T'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 1, 'SEAT_IN_ROW' => 2, 'VIP' => 'T'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 1, 'SEAT_IN_ROW' => 3, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 1, 'SEAT_IN_ROW' => 4, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 1, 'SEAT_IN_ROW' => 5, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 1, 'SEAT_IN_ROW' => 6, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 1, 'SEAT_IN_ROW' => 7, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 1, 'SEAT_IN_ROW' => 8, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 1, 'SEAT_IN_ROW' => 9, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 1, 'SEAT_IN_ROW' => 10, 'VIP' => 'N'],

            ['screening_room_id' => 2, 'ROW_NUMBER' => 2, 'SEAT_IN_ROW' => 1, 'VIP' => 'T'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 2, 'SEAT_IN_ROW' => 2, 'VIP' => 'T'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 2, 'SEAT_IN_ROW' => 3, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 2, 'SEAT_IN_ROW' => 4, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 2, 'SEAT_IN_ROW' => 5, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 2, 'SEAT_IN_ROW' => 6, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 2, 'SEAT_IN_ROW' => 7, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 2, 'SEAT_IN_ROW' => 8, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 2, 'SEAT_IN_ROW' => 9, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 2, 'SEAT_IN_ROW' => 10, 'VIP' => 'N'],

            ['screening_room_id' => 2, 'ROW_NUMBER' => 3, 'SEAT_IN_ROW' => 1, 'VIP' => 'T'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 3, 'SEAT_IN_ROW' => 2, 'VIP' => 'T'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 3, 'SEAT_IN_ROW' => 3, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 3, 'SEAT_IN_ROW' => 4, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 3, 'SEAT_IN_ROW' => 5, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 3, 'SEAT_IN_ROW' => 6, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 3, 'SEAT_IN_ROW' => 7, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 3, 'SEAT_IN_ROW' => 8, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 3, 'SEAT_IN_ROW' => 9, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 3, 'SEAT_IN_ROW' => 10, 'VIP' => 'N'],

            ['screening_room_id' => 2, 'ROW_NUMBER' => 4, 'SEAT_IN_ROW' => 1, 'VIP' => 'T'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 4, 'SEAT_IN_ROW' => 2, 'VIP' => 'T'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 4, 'SEAT_IN_ROW' => 3, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 4, 'SEAT_IN_ROW' => 4, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 4, 'SEAT_IN_ROW' => 5, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 4, 'SEAT_IN_ROW' => 6, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 4, 'SEAT_IN_ROW' => 7, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 4, 'SEAT_IN_ROW' => 8, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 4, 'SEAT_IN_ROW' => 9, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 4, 'SEAT_IN_ROW' => 10, 'VIP' => 'N'],

            ['screening_room_id' => 2, 'ROW_NUMBER' => 5, 'SEAT_IN_ROW' => 1, 'VIP' => 'T'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 5, 'SEAT_IN_ROW' => 2, 'VIP' => 'T'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 5, 'SEAT_IN_ROW' => 3, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 5, 'SEAT_IN_ROW' => 4, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 5, 'SEAT_IN_ROW' => 5, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 5, 'SEAT_IN_ROW' => 6, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 5, 'SEAT_IN_ROW' => 7, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 5, 'SEAT_IN_ROW' => 8, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 5, 'SEAT_IN_ROW' => 9, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 5, 'SEAT_IN_ROW' => 10, 'VIP' => 'N'],

            ['screening_room_id' => 2, 'ROW_NUMBER' => 6, 'SEAT_IN_ROW' => 1, 'VIP' => 'T'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 6, 'SEAT_IN_ROW' => 2, 'VIP' => 'T'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 6, 'SEAT_IN_ROW' => 3, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 6, 'SEAT_IN_ROW' => 4, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 6, 'SEAT_IN_ROW' => 5, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 6, 'SEAT_IN_ROW' => 6, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 6, 'SEAT_IN_ROW' => 7, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 6, 'SEAT_IN_ROW' => 8, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 6, 'SEAT_IN_ROW' => 9, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 6, 'SEAT_IN_ROW' => 10, 'VIP' => 'N'],

            ['screening_room_id' => 2, 'ROW_NUMBER' => 7, 'SEAT_IN_ROW' => 1, 'VIP' => 'T'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 7, 'SEAT_IN_ROW' => 2, 'VIP' => 'T'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 7, 'SEAT_IN_ROW' => 3, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 7, 'SEAT_IN_ROW' => 4, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 7, 'SEAT_IN_ROW' => 5, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 7, 'SEAT_IN_ROW' => 6, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 7, 'SEAT_IN_ROW' => 7, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 7, 'SEAT_IN_ROW' => 8, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 7, 'SEAT_IN_ROW' => 9, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 7, 'SEAT_IN_ROW' => 10, 'VIP' => 'N'],

            ['screening_room_id' => 2, 'ROW_NUMBER' => 8, 'SEAT_IN_ROW' => 1, 'VIP' => 'T'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 8, 'SEAT_IN_ROW' => 2, 'VIP' => 'T'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 8, 'SEAT_IN_ROW' => 3, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 8, 'SEAT_IN_ROW' => 4, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 8, 'SEAT_IN_ROW' => 5, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 8, 'SEAT_IN_ROW' => 6, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 8, 'SEAT_IN_ROW' => 7, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 8, 'SEAT_IN_ROW' => 8, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 8, 'SEAT_IN_ROW' => 9, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 8, 'SEAT_IN_ROW' => 10, 'VIP' => 'N'],

            ['screening_room_id' => 2, 'ROW_NUMBER' => 9, 'SEAT_IN_ROW' => 1, 'VIP' => 'T'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 9, 'SEAT_IN_ROW' => 2, 'VIP' => 'T'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 9, 'SEAT_IN_ROW' => 3, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 9, 'SEAT_IN_ROW' => 4, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 9, 'SEAT_IN_ROW' => 5, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 9, 'SEAT_IN_ROW' => 6, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 9, 'SEAT_IN_ROW' => 7, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 9, 'SEAT_IN_ROW' => 8, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 9, 'SEAT_IN_ROW' => 9, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 9, 'SEAT_IN_ROW' => 10, 'VIP' => 'N'],

            ['screening_room_id' => 2, 'ROW_NUMBER' => 10, 'SEAT_IN_ROW' => 1, 'VIP' => 'T'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 10, 'SEAT_IN_ROW' => 2, 'VIP' => 'T'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 10, 'SEAT_IN_ROW' => 3, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 10, 'SEAT_IN_ROW' => 4, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 10, 'SEAT_IN_ROW' => 5, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 10, 'SEAT_IN_ROW' => 6, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 10, 'SEAT_IN_ROW' => 7, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 10, 'SEAT_IN_ROW' => 8, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 10, 'SEAT_IN_ROW' => 9, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 10, 'SEAT_IN_ROW' => 10, 'VIP' => 'N'],

            ['screening_room_id' => 2, 'ROW_NUMBER' => 11, 'SEAT_IN_ROW' => 1, 'VIP' => 'T'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 11, 'SEAT_IN_ROW' => 2, 'VIP' => 'T'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 11, 'SEAT_IN_ROW' => 3, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 11, 'SEAT_IN_ROW' => 4, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 11, 'SEAT_IN_ROW' => 5, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 11, 'SEAT_IN_ROW' => 6, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 11, 'SEAT_IN_ROW' => 7, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 11, 'SEAT_IN_ROW' => 8, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 11, 'SEAT_IN_ROW' => 9, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 11, 'SEAT_IN_ROW' => 10, 'VIP' => 'N'],

            ['screening_room_id' => 2, 'ROW_NUMBER' => 12, 'SEAT_IN_ROW' => 1, 'VIP' => 'T'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 12, 'SEAT_IN_ROW' => 2, 'VIP' => 'T'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 12, 'SEAT_IN_ROW' => 3, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 12, 'SEAT_IN_ROW' => 4, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 12, 'SEAT_IN_ROW' => 5, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 12, 'SEAT_IN_ROW' => 6, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 12, 'SEAT_IN_ROW' => 7, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 12, 'SEAT_IN_ROW' => 8, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 12, 'SEAT_IN_ROW' => 9, 'VIP' => 'N'],
            ['screening_room_id' => 2, 'ROW_NUMBER' => 12, 'SEAT_IN_ROW' => 10, 'VIP' => 'N']
            // ... (add remaining seats for Screening Room 2)
        ]);
    }
}
