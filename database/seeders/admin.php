<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                "first_name" => "admin1",
                "last_name" => "admin2",
                "email" => "admin123@gmail.com",
                "password" => Hash::make('password'),
                "status" => 1,
                "role_type" => "admin",
            ],
            [
                "first_name" => "user1",
                "last_name" => "user2",
                "email" => "user@gmail.com",
                "password" => Hash::make('user123'),
                "status" => 1,
                "role_type" => "customer",
            ]
        ]);
    }
}
