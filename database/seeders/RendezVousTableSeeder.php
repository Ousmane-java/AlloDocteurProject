<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RendezVousTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rendez_vous')->insert([
            [
                'date' => '2024-05-10',
                'heure' => '08:00:00',
                'idMedecin' => 1,
                'idPatient' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'date' => '2024-05-12',
                'heure' => '10:30:00',
                'idMedecin' => 2,
                'idPatient' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            // Ajoutez d'autres données au besoin
        ]);
    }
}
