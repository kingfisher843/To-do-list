<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()
        ->count(25)
        ->hasTasks(30)
        ->create();

        User::factory()
        ->count(30)
        ->hasTasks(21)
        ->create();

        User::factory()
        ->count(5)
        ->create();
    }
}
