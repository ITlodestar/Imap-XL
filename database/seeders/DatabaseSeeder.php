<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'id' => 1,
            'username' => "admin",
            'password' => Hash::make('lodestar'),
            'role' => 1
        ]);

        DB::table('settings')->insert([
            'id' => 1,
            'variable' => "task_0_size",
            'value' => 3
        ]);

        DB::table('settings')->insert([
            'id' => 2,
            'variable' => "task_1_size",
            'value' => 2
        ]);
    }
}
