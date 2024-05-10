<?php

namespace App\Http\Controllers;

use App\Models\medecin;
use App\Models\rendez_vous;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        if (Auth::check()) {
            $user = Auth::user();
            $medecins = Medecin::all();
            $specialites = Medecin::distinct('specialite')->pluck('specialite');

            return view('home', [
                'user' => $user,
                'medecins' => $medecins,
                'specialites' => $specialites,
                'success' => session('success'),
            ]);
        } else {
            return redirect()->route('login');
        }
    }
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

    public function store(Request $request)
    {
        $request->validate([
            'specialite' => 'required',
            'localite' => 'required',
            'medecin' => 'required',
            'email' => 'required|email',
            'date' => 'required|date',
            'heure' => 'required|',
            'nom' => 'required',

        ]);
// dd($request->all());
        $rv = new \App\Models\rendez_vous();
        $rv->nomprenomPatient = $request->input('nom');
        $rv->email = $request->input('email');
        $rv->idMedecin = $request->input('medecin');
        $medecin = Medecin::find($request->input('medecin'));
        if ($medecin) {
            $rv->prenomMedecin = $medecin->prenom;
            $rv->nomMedecin = $medecin->nom;
            $rv->contactMedecin = $medecin->telephone;
        } else {
            $rv->contactMedecin = '';
            $rv->prenomMedecin ='';
            $rv->nomMedecin ='';

        }
        $rv->specialite = $request->input('specialite');
        $rv->localite = $request->input('localite');
        $rv->date = $request->input('date');
        $rv->heure = $request->input('heure');
        // dd($rv);
        $rv->save();

        return redirect()->route('home')->with('success', 'Rendez-vous enregistré avec succès!');
    }

}
