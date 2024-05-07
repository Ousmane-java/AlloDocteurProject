<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->insert([
            [
                'login' => 'admin1',
                'motDePasse' => Hash::make('password1'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'login' => 'admin2',
                'motDePasse' => Hash::make('password2'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            // Ajoutez d'autres données au besoin
        ]);
    }
}
