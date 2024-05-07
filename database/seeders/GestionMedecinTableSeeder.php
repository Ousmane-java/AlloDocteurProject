<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GestionMedecinTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('gestion_medecin')->insert([
            [
                'idAdmin' => 1,
                'idMedecin' => 1,
                'autorisation_ajout' => true,
                'autorisation_suppression' => true,
                'autorisation_modification' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'idAdmin' => 2,
                'idMedecin' => 2,
                'autorisation_ajout' => true,
                'autorisation_suppression' => true,
                'autorisation_modification' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            // Ajoutez d'autres données au besoin
        ]);
    }
}
