<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Technology::insert(
            [
                [
                    'NAME' => 'IMAX'
                ],
                [
                    'NAME' => '3D'
                ]
            ]
        );
    }
}
