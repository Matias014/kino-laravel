<?php

namespace Database\Seeders;

use App\Models\Ticket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ticket::insert([
            [
                'reservation_id' => 1,
                'voucher_id' => 1,
                'PRICE' => 30,
                'STATUS_OF_PAYMENT' => 'T',
            ],
            [
                'reservation_id' => 2,
                'voucher_id' => 2,
                'PRICE' => 40,
                'STATUS_OF_PAYMENT' => 'T',
            ],
            [
                'reservation_id' => 3,
                'voucher_id' => 2,
                'PRICE' => 20,
                'STATUS_OF_PAYMENT' => 'T',
            ]
        ]);
    }
}
