<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->truncate();
        $users = [
            [
                'role' => 0,    // 0 for  admin  ||    1 for User
                'name' => 'Admin',
                'email' => 'ikonic@solution.com',
                'password' => Hash::make('12345678'),
            ]
        ];
        DB::table('users')->insert($users);
    }
}
