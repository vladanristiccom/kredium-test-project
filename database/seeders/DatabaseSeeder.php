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
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test1@example.com',
            'password' => Hash::make('@123qweR')
        ]);
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test2@example.com',
            'password' => Hash::make('@123qweR')
        ]);
    }
}
