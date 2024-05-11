@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-body">
                <h2>Votre ticket de Rendez-vous</h2>
                <h5>Informations sur le rendez-vous :</h5>
                <p><strong>Nom et Prénom :</strong> {{ $rendezVous->nomprenomPatient }}</p>
                <p><strong>Email :</strong> {{ $rendezVous->email }}</p>
                <p><strong>Spécialité :</strong> {{ $rendezVous->specialite }}</p>
                <p><strong>Localité :</strong> {{ $rendezVous->localite }}</p>
                <p><strong>Médecin :</strong> {{ $rendezVous->prenomMedecin }} {{ $rendezVous->nomMedecin }}</p>
                <p><strong>Contact Médecin :</strong> {{ $rendezVous->contactMedecin }}</p>
                <p><strong>Date :</strong> {{ $rendezVous->date }}</p>
                <p><strong>Heure :</strong> {{ $rendezVous->heure }}</p>
                <p>Veuillez arriver 15 minutes avant l'heure prévue et veillez à conserver votre ticket.</p>
                <br>
                <h6>Document légal généré par Allo Docteur !</h6>
            </div>
        </div>
    </div>
</div>
@endsection
