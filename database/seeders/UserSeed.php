<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'email' => 'it@patisen.sn',
            'password' => 'Patisen4Ever',
            'nom' => 'Admin',
            'prenom' => 'Administrateur',
            'departement' => 'IT'
        ]);
    }
}
