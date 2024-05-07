<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedecinsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('medecins')->insert([
            [
                'nom' => 'Dubois',
                'prenom' => 'Paul',
                'specialite' => 'Cardiologue',
                'localite' => 'Paris',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nom' => 'Durand',
                'prenom' => 'Marie',
                'specialite' => 'Dermatologue',
                'localite' => 'Lyon',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // Ajoutez d'autres données au besoin
        ]);
    }
}
