<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\RendezVous;


class RendezVousController extends Model
{


    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            // Ajoutez les règles de validation pour chaque champ du formulaire ici
        ]);

        // Enregistrez les données dans la base de données
        RendezVous::create($validatedData);

        // Rediriger l'utilisateur après la soumission du formulaire
        return redirect('/')->with('success', 'Rendez-vous pris avec succès!');
    }

}
