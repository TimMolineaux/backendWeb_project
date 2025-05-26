<?php

//seeder om wat test gebruikers aan te maken

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TestUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@test.com',
            'password' => Hash::make('test123'),
            'birthday' => '1990-01-01',
            'about_me' => 'Test gebruiker',
        ]);

        User::factory()->create([
            'name' => 'Test User2',
            'email' => 'test2@test.com',
            'password' => Hash::make('test456'),
            'birthday' => '2004-12-04',
            'about_me' => 'De tweede test gebruiker',
        ]);
    }
}
