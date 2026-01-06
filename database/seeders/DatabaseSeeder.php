<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Michael Angelo',
            'email' => 'teacher@gmail.com',
            'password' => Hash::make('wahyu2005IG')

        ]);
        User::create([
            'name' => 'Dhimpruy',
            'email' => 'dhim@gmail.com',
            'password' => Hash::make('wahyu2005IG')
        ]);
    }
}
