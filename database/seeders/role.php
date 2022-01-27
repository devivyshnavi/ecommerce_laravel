<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Roles;

class role extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Roles::insert([
            ["role_type" => "super admin"],
            ["role_type" => "admin"],
            ["role_type" => "inventory manager"],
            ["role_type" => "order manager"],
            ["role_type" => "customer"],

        ]);
    }
}
