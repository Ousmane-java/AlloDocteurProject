@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Récapitulatif du rendez-vous</div>
                <div class="card-body">
                    <h5>Informations sur le rendez-vous :</h5>
                    <p><strong>Nom et Prénom :</strong> {{ $rendezVous->nomprenomPatient }}</p>
                    <p><strong>Email :</strong> {{ $rendezVous->email }}</p>
                    <p><strong>Spécialité :</strong> {{ $rendezVous->specialite }}</p>
                    <p><strong>Localité :</strong> {{ $rendezVous->localite }}</p>
                    <p><strong>Médecin :</strong> {{ $rendezVous->prenomMedecin }} {{ $rendezVous->nomMedecin }}</p>
                    <p><strong>Contact Médecin :</strong> {{ $rendezVous->contactMedecin }}</p>
                    <p><strong>Date :</strong> {{ $rendezVous->date }}</p>
                    <p><strong>Heure :</strong> {{ $rendezVous->heure }}</p>

                    <div class="mt-4">
                        <a href="{{ route('download', $rendezVous->id) }}" class="btn btn-primary">Télécharger PDF</a>
                        <a href="{{ route('home') }}" class="btn btn-secondary">Accueil</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
