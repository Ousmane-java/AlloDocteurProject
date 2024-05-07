<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('patients')->insert([
            [
                'nom' => 'Dupont',
                'prenom' => 'Jean',
                'email' => 'jean.dupont@example.com',
                'telephone' => '0123456789',
                'adresse' => '1 rue de Paris',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nom' => 'Martin',
                'prenom' => 'Sophie',
                'email' => 'sophie.martin@example.com',
                'telephone' => '0987654321',
                'adresse' => '2 avenue des Champs-Élysées',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // Ajoutez d'autres données au besoin
        ]);
    }
}
