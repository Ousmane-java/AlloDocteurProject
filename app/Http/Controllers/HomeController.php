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

        // Vérification de la disponibilité du rendez-vous
        $medecin = Medecin::find($request->input('medecin'));
        if (!$medecin) {
        return redirect()->back()->with('error', 'Le médecin sélectionné n\'existe pas. Veuillez choisir un médecin valide.');
        }

        $existingAppointment = Rendez_vous::where('idMedecin', $medecin->id)
        ->where('date', $request->input('date'))
        ->where('heure', $request->input('heure'))
        ->first();

        if ($existingAppointment) {
        return redirect()->back()->with('error', 'Le médecin ' . $medecin->prenom . ' ' . $medecin->nom . ' n\'est pas disponible à cette date. Veuillez choisir une autre date ou heure.');
        }


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
        $html = view('ticket', compact('rendezVous'))->render();

        // Génère le PDF
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Télécharge le PDF
        return $dompdf->stream('rendezvous_' . $id . '.pdf');
    }

    public function listeRendezVous()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $rendez_vous = Rendez_vous::where('email', $user->email)->orderBy('id', 'desc')->get();
            return view('liste_rv', ['rendez_vous' => $rendez_vous]);
        } else {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour voir vos réservations.');
        }
    }

    public function editRendezVous($id)
    {
        $rendezVous = Rendez_vous::findOrFail($id);
        $medecins = Medecin::all();
        $specialites = Medecin::distinct('specialite')->pluck('specialite');
        $user = Auth::user();

        return view('modifier_rv', [
            'rendezVous' => $rendezVous,
            'medecins' => $medecins,
            'specialites' => $specialites,
            'user' => $user,
            'selectedSpecialite' => $rendezVous->specialite,
            'selectedLocalite' => $rendezVous->localite,
            'selectedMedecin' => $rendezVous->idMedecin,
        ]);
    }

    public function updateRendezVous(Request $request, $id)
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

        $rendezVous = Rendez_vous::findOrFail($id);

        $rendezVous->nomprenomPatient = $request->input('nom');
        $rendezVous->email = $request->input('email');
        $rendezVous->idMedecin = $request->input('medecin');
        $medecin = Medecin::find($request->input('medecin'));
        if ($medecin) {
            $rendezVous->prenomMedecin = $medecin->prenom;
            $rendezVous->nomMedecin = $medecin->nom;
            $rendezVous->contactMedecin = $medecin->telephone;
        } else {
            $rendezVous->contactMedecin = '';
            $rendezVous->prenomMedecin = '';
            $rendezVous->nomMedecin = '';
        }
        $rendezVous->specialite = $request->input('specialite');
        $rendezVous->localite = $request->input('localite');
        $rendezVous->date = $request->input('date');
        $rendezVous->heure = $request->input('heure');
        $rendezVous->save();

        return redirect()->route('liste_rv')->with('success', 'Rendez-vous modifié avec succès!');
    }

    public function deleteRendezVous($id)
    {
        $rendezVous = Rendez_vous::find($id);

        if (!$rendezVous) {
            return redirect()->route('liste_rv')->with('error', 'Le rendez-vous que vous essayez de supprimer n\'existe pas.');
        }
        $rendezVous->delete();
        $this->reindexRendezVousIds();
        return redirect()->route('liste_rv')->with('success', 'Le rendez-vous a été supprimé avec succès.');
    }

    private function reindexRendezVousIds()
    {
        $rendezVous = Rendez_vous::all();
        foreach ($rendezVous as $key => $rv) {
            $rv->id = $key + 1;
            $rv->save();
        }
    }
}
