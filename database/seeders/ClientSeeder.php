<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Client::insert([
            [
                'NAME' => 'John',
                'SURNAME' => 'Doe',
                'EMAIL' => 'john.doe@example.com',
                'PHONE_NUMBER' => '123456789',
                'PASSWORD' => bcrypt('password123')
            ],
            [
                'NAME' => 'Jane',
                'SURNAME' => 'Smith',
                'EMAIL' => 'jane.smith@example.com',
                'PHONE_NUMBER' => '987654321',
                'PASSWORD' => bcrypt('password123')
            ],
            [
                'NAME' => 'Alice',
                'SURNAME' => 'Johnson',
                'EMAIL' => 'alice.johnson@example.com',
                'PHONE_NUMBER' => '456123789',
                'PASSWORD' => bcrypt('password123')
            ],
            [
                'NAME' => 'Bob',
                'SURNAME' => 'Brown',
                'EMAIL' => 'bob.brown@example.com',
                'PHONE_NUMBER' => '789456123',
                'PASSWORD' => bcrypt('password123')
            ],
            [
                'NAME' => 'Charlie',
                'SURNAME' => 'Davis',
                'EMAIL' => 'charlie.davis@example.com',
                'PHONE_NUMBER' => '321654987',
                'PASSWORD' => bcrypt('password123')
            ],
        ]);
    }
}
