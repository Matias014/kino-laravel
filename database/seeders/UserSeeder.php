<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'NAME' => 'admin',
                'SURNAME' => 'admin',
                'EMAIL' => 'admin@example.com',
                'PHONE_NUMBER' => '123456789',
                'ROLE' => 'admin',
                'PASSWORD' => bcrypt('123')
            ],
            [
                'NAME' => 'Adam',
                'SURNAME' => 'Nowak',
                'EMAIL' => 'adam@example.com',
                'PHONE_NUMBER' => '987654321',
                'ROLE' => 'user',
                'PASSWORD' => bcrypt('123')
            ],
            [
                'NAME' => 'Alicja',
                'SURNAME' => 'Korzenna',
                'EMAIL' => 'alicja@example.com',
                'PHONE_NUMBER' => '456123789',
                'ROLE' => 'user',
                'PASSWORD' => bcrypt('123')
            ],
            [
                'NAME' => 'Jerzy',
                'SURNAME' => 'Dąbrowicz',
                'EMAIL' => 'jerzy@example.com',
                'PHONE_NUMBER' => '789456123',
                'ROLE' => 'user',
                'PASSWORD' => bcrypt('123')
            ],
            [
                'NAME' => 'Katarzyna',
                'SURNAME' => 'Siewierska',
                'EMAIL' => 'katarzyna@example.com',
                'PHONE_NUMBER' => '321654987',
                'ROLE' => 'user',
                'PASSWORD' => bcrypt('123')
            ],
        ]);
    }
}
