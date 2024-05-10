<?php

namespace App\Http\Controllers;

use App\Models\Medecin;
use App\Models\rendez_vous;
use App\Models\RendezVous;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Dompdf\Options;
use Dompdf\Dompdf;
use PDF;

class HomeController extends Controller
{
    public function index()
    {
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
            'heure' => 'required',
            'nom' => 'required',
        ]);
    
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
            $rv->prenomMedecin = '';
            $rv->nomMedecin = '';
        }
        $rv->specialite = $request->input('specialite');
        $rv->localite = $request->input('localite');
        $rv->date = $request->input('date');
        $rv->heure = $request->input('heure');
        $rv->save();
    
        return redirect()->route('recap', ['id' => $rv->id])->with('success', 'Rendez-vous enregistré avec succès!');
    }

    public function showRecap($id)
    {
        $rendezVous = rendez_vous::findOrFail($id);
        return view('recap', compact('rendezVous'));
    }


    public function download($id)
    {
        $rendezVous = rendez_vous::findOrFail($id);
    
        // Configuration de Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
    
        // Création de l'instance Dompdf
        $dompdf = new Dompdf($options);
    
        // Charge la vue PDF avec les données du rendez-vous
        $html = view('ticketRV', compact('rendezVous'))->render();
    
        // Génère le PDF
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
    
        // Télécharge le PDF
        return $dompdf->stream('rendezvous_' . $id . '.pdf');
    }
    
    
    
}
