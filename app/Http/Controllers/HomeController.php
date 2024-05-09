<?php

namespace App\Http\Controllers;

use App\Models\medecin;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    // public function index(){
    //     $user = Auth::user();
    //     $medecins = Medecin::all();
    //     $specialites = Medecin::distinct('specialite')->pluck('specialite');

    //     return view('home', [
    //         'user' => $user,
    //         'medecins' => $medecins,
    //         'specialites' => $specialites
    //     ]);
    // }

    // HomeController.php
    public function index(){
        $user = Auth::user();
        $medecins = Medecin::all();
        $specialites = Medecin::distinct('specialite')->pluck('specialite');

        // Récupération des localités uniques associées à la spécialité sélectionnée
        // $localites = []; // Initialisez un tableau vide pour les localités
        // if(request()->has('specialite')) {
        //     $selectedSpecialite = request('specialite');
        //     $localites = Medecin::where('specialite', $selectedSpecialite)->distinct('localite')->pluck('localite');
        // }

        return view('home', [
            'user' => $user,
            'medecins' => $medecins,
            'specialites' => $specialites,
            // 'localites' => $localites, // Passez les localités à la vue
        ]);
    }




    // public function getLocalitesBySpecialite($specialite)
    // {

    //     $localites = Medecin::where('specialite', $specialite)->pluck('localite')->unique();
    //     return response()->json($localites);
    // }
    public function getLocalitesBySpecialite($specialite)
    {
        $localites = Medecin::where('specialite', $specialite)->distinct('localite')->pluck('localite');
        return new JsonResponse($localites);
    }

        public function getMedecinsByLocalite($localite)
    {
        $medecins = Medecin::where('localite', $localite)->get();

        return response()->json($medecins);
    }

}
