<?php

namespace Database\Seeders;

use App\Models\Voucher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Voucher::insert(
            [
                [
                    'NAME' => 'Voucher1', 'DISCOUNT' => '10'
                ],
                [
                    'NAME' => 'Voucher2', 'DISCOUNT' => '15'
                ],
                [
                    'NAME' => 'Voucher3', 'DISCOUNT' => '20'
                ]
            ]
        );
    }
}
