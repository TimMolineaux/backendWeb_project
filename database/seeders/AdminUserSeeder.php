<?php

//seeder om een standaard een admin account te maken zoals in de opdracht beschreven stond

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
        'name' => 'admin',
        'email' => 'admin@ehb.be',
        'password' => Hash::make('Password!321'),
        'birthday' => '2004-02-19',
        'about_me' => 'Initiele default admin account',
        'role' => 'admin',
        ]);
    }
}
