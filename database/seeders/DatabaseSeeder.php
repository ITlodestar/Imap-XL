<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'login' => "user", 
            'password' => 'password',
            'created' => time(),
            'tg' => '111'
        ]);
    }
}
