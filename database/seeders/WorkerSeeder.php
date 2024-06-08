<?php

namespace Database\Seeders;

use App\Models\Worker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Worker::insert(
            [
                [
                    'NAME' => 'Bogdan', 'SURNAME' => 'Niemojewski',/* 'START_TIME' => '2024-05-14 08:00:00', 'END_TIME' => '2024-05-14 16:00:00'*/
                ],
                [
                    'NAME' => 'Malwina', 'SURNAME' => 'Bielecka',/* 'START_TIME' => '2024-05-14 08:00:00', 'END_TIME' => '2024-05-14 16:00:00'*/
                ],
                [
                    'NAME' => 'Florian', 'SURNAME' => 'Kwaśniak',/* 'START_TIME' => '2024-05-14 16:00:00', 'END_TIME' => '2024-05-14 22:00:00'*/
                ]
            ]
        );
    }
}
