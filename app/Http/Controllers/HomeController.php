<?php

namespace App\Http\Controllers;

use App\Models\Medecin;
use App\Models\rendez_vous;
use App\Models\RendezVous;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
<<<<<<< HEAD
use PDF;
use Dompdf\Dompdf;
=======
use Dompdf\Options;
use Dompdf\Dompdf;
use PDF;
>>>>>>> 164115c35d464b9fa15cfa9c8e0e86da8e463a96

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
        $existingAppointment = rendez_vous::where('idMedecin', $request->input('medecin'))
            ->where('date', $request->input('date'))
            ->where('heure', $request->input('heure'))
            ->first();

        if ($existingAppointment) {
            return redirect()->back()->with('error', 'La date et l\'heure sélectionnées sont déjà prises. Veuillez choisir une autre date ou heure.');
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
        $html = view('ticketRV', compact('rendezVous'))->render();

        // Génère le PDF
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Télécharge le PDF
        return $dompdf->stream('rendezvous_' . $id . '.pdf');
    }


    public function listeRendezVous(){
        $rendez_vous = Rendez_vous::orderBy('id', 'desc')->get();
        $rendez_vous = rendez_vous::all();
        return view('liste_rv', ['rendez_vous' => $rendez_vous]);

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
                $rendezVous->prenomMedecin ='';
                $rendezVous->nomMedecin ='';
            }
            $rendezVous->specialite = $request->input('specialite');
            $rendezVous->localite = $request->input('localite');
            $rendezVous->date = $request->input('date');
            $rendezVous->heure = $request->input('heure');
            // dd($rendezVous);
            $rendezVous->save(); // Sauvegarde les modifications


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
<<<<<<< HEAD

 // Importez la classe PDF de dompdf

//  public function downloadPDF($id)
//  {
//      $rendez_vous = Rendez_vous::findOrFail($id);
//      $dompdf = new Dompdf();
//      $dompdf->loadHtml(view('rv_pdf', ['rendez_vous' => $rendez_vous])->render());
//      $dompdf->setPaper('A4', 'portrait');
//      $dompdf->render();
//      return $dompdf->stream('rv_pdf.pdf');
//  }




=======
>>>>>>> 164115c35d464b9fa15cfa9c8e0e86da8e463a96
}
