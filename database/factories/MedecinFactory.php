<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\medecin>
 */
class MedecinFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $specialites = [
            'Cardiologue', 'Dermatologue', 'Chirurgien', 'Gynécologue', 'Neurologue', 'Ophtalmologue',
            'Pédiatre', 'Radiologue',
        ];
        $hopitale=[
            'Hôpital Aristide Le Dantec',
            'Hôpital Principal de Dakar',
            'Hôpital Général de Grand Yoff',
            'Hôpital Abass Ndao',
            'Hôpital Dalal Jamm',
            'Hôpital Albert Royer',
            'Hôpital de Pikine',
            'Hôpital Roi Baudouin',
            'Hôpital de Fann',
            'Hôpital de Ouakam',
            'Hôpital Ibrahima Niasse',
            'Hôpital de Thiaroye',
            'Hôpital Mame Abdou Aziz Sy Dabakh',
            'Hôpital de Mbour',
            'Hôpital Régional de Saint-Louis',
            'Hôpital Matlaboul Fawzeini',
            'Hôpital Cheikh Ibrahima Niass',
            'Hôpital Serigne Fallou',
            'Hôpital de la Grande Mosquée',
            'Hôpital Adja Khady Diop',

        ];
        $firstName = [
            'Aïssatou', 'Fatou', 'Amina', 'Khady', 'Ndèye', 'Mariama', 'Oumou', 'Mame Diarra', 'Nafissatou',
            'Modou', 'Babacar', 'Mamadou', 'Ibrahima', 'Cheikh', 'Abdoulaye', 'Samba', 'Moustapha', 'Mamadou Lamine',
            'Aïssatou', 'Khady', 'Fatoumata', 'Rokhaya', 'Ndèye Fatou', 'Aïcha', 'Moussa', 'Abdou', 'Alioune', 'Modou Diouf',
            'Aminata', 'Mamadou Saliou'
        ];

        $lastName = [
            'Sow', 'Diop', 'Diouf', 'Ndiaye', 'Gueye', 'Fall', 'Kébé', 'Faye', 'Niang', 'Sarr',
            'Ba', 'Sylla', 'Touré', 'Kané', 'Ndao', 'Diallo', 'Thiam', 'Baldé', 'Camara', 'Cissé',
            'Ndiaye', 'Diouf', 'Diallo', 'Ba', 'Diop', 'Gaye', 'Thiaw', 'Dione', 'Tine', 'Samb'
        ];

        return [
            'nom' => $this->faker->randomElement($lastName),
            'prenom' => $this->faker->randomElement($firstName),
            'specialite' => $this->faker->randomElement($specialites),
            'localite' => $this->faker->randomElement($hopitale),
            'created_at' => $this->faker->dateTimeThisMonth,
            'updated_at' => $this->faker->dateTimeThisMonth,
        ];

    }
}
