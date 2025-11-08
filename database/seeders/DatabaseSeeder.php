<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // Admin-konto
        if (!User::where('email', 'admin@islamiccup.se')->exists()) {
            User::create([
                'name' => 'Admin',
                'email' => 'admin@islamiccup.se',
                'password' => Hash::make('password'), // byt i produktion
                'role' => 'admin',
                'phone' => '+46123456789',
                'organization' => 'Islamic Cup',
                'can_create_multiple_teams' => true,
            ]);
        }

        // Exempel-moderator (valfritt)
        if (!User::where('email', 'moderator@islamiccup.se')->exists()) {
            User::create([
                'name' => 'Moderator',
                'email' => 'moderator@islamiccup.se',
                'password' => Hash::make('password'),
                'role' => 'moderator',
                'organization' => 'Islamic Cup',
            ]);
        }

        // Ta bort fabriksexemplet om du inte vill skapa en test-user
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
