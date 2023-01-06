<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->hasProducts(5)
            ->count(10)
            ->create();
    
        User::factory()
            ->hasProducts(10)
            ->count(2)
            ->create();

        User::factory()
            ->count(5)
            ->create();
    }
}
