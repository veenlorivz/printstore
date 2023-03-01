<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                "name" => "user",
                "email" => "user@gmail.com",
                "password" => Hash::make('12345'),
            ],
            [
                "name" => "admin",
                "role" => "admin",
                "email" => "admin@gmail.com",
                "password" => Hash::make('12345'),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
