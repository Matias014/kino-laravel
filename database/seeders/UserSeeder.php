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
                'NAME' => 'John',
                'SURNAME' => 'Doe',
                'EMAIL' => 'doe@example.com',
                'PHONE_NUMBER' => '123456789',
                'ROLE' => 'admin',
                'PASSWORD' => bcrypt('123')
            ],
            [
                'NAME' => 'Jane',
                'SURNAME' => 'Smith',
                'EMAIL' => 'jane@example.com',
                'PHONE_NUMBER' => '987654321',
                'ROLE' => 'user',
                'PASSWORD' => bcrypt('123')
            ],
            [
                'NAME' => 'Alice',
                'SURNAME' => 'Johnson',
                'EMAIL' => 'alice.johnson@example.com',
                'PHONE_NUMBER' => '456123789',
                'ROLE' => 'user',
                'PASSWORD' => bcrypt('password123')
            ],
            [
                'NAME' => 'Bob',
                'SURNAME' => 'Brown',
                'EMAIL' => 'bob.brown@example.com',
                'PHONE_NUMBER' => '789456123',
                'ROLE' => 'user',
                'PASSWORD' => bcrypt('password123')
            ],
            [
                'NAME' => 'Charlie',
                'SURNAME' => 'Davis',
                'EMAIL' => 'charlie.davis@example.com',
                'PHONE_NUMBER' => '321654987',
                'ROLE' => 'user',
                'PASSWORD' => bcrypt('password123')
            ],
        ]);
    }
}
