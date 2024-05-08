<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\rendez_vous>
 */
class RendezVousFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'prestation' => $this->faker->word,
            'idMedecin' => function () {
                return \App\Models\Medecin::factory()->create()->id;
            },
            'date' => $this->faker->date(),
            'heure' => $this->faker->time(),
            'nomPatient' => $this->faker->lastName,
            'prenomPatient' => $this->faker->firstName,
            'emailPatient' => $this->faker->unique()->safeEmail,
            'telephonePatient' => $this->faker->phoneNumber,
            'created_at' => $this->faker->dateTimeThisMonth,
            'updated_at' => $this->faker->dateTimeThisMonth,
        ];
    }
}
