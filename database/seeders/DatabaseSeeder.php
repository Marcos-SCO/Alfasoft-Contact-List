<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::firstOrCreate(
            ['email' => 'admin@test.com'],
            ['name' => 'Alfasoft', 'password' => Hash::make('password')]
        );
        
        User::firstOrCreate(
            ['email' => 'marcos@test.com'],
            ['name' => 'Marcos', 'password' => Hash::make('password')]
        );

        Contact::factory()->count(50)->create();
    }
}
