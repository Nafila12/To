<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Administrator',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('4dm1n2024'),
                'level' => 1
            ],
            [
                'name' => 'Kasir',
                'email' => 'kasir@gmail.com',
                'password' => bcrypt('k4s1r2024'),
                'level' => 2
            ],
            // [
            //     'name' => 'owner',
            //     'email' => 'owner@gmail.com',
            //     'password' => bcrypt('a'),
            //     'level' => 3
            // ],
        ];
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
