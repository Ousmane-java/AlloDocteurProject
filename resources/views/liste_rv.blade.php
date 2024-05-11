@extends('layouts.app')

@section('content')
<div class="row mb-4">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
    <div class="col">
        <h1 class="float-start">Liste des rendez-vous</h1>
    </div>
    <div class="col text-end">
        <a href="{{ route('home.store') }}" class="btn btn-outline-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
          </svg>
            Ajoutez un rendez-vous</a>
        <a href="{{ route('accueil') }}" class="btn btn-outline-secondary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-skip-backward-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                <path d="M11.729 5.055a.5.5 0 0 0-.52.038L8.5 7.028V5.5a.5.5 0 0 0-.79-.407L5 7.028V5.5a.5.5 0 0 0-1 0v5a.5.5 0 0 0 1 0V8.972l2.71 1.935a.5.5 0 0 0 .79-.407V8.972l2.71 1.935A.5.5 0 0 0 12 10.5v-5a.5.5 0 0 0-.271-.445"/>
              </svg>
        Retour</a>
    </div>
</div>


    @if($rendez_vous->isNotEmpty())
        <div class="table-responsive">
            <table class="table table-striped">
            <thead>
                <tr>
                    <th class="text-center"> </th>
                    <th class="text-center">Nom & prénom</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Nom & prénom médecin</th>
                    <th class="text-center">Contact</th>
                    <th class="text-center">Spécialité</th>
                    <th class="text-center">Hôpital</th>
                    <th class="text-center">Date</th>
                    <th class="text-center">Heure</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
                <tbody>

                    @foreach($rendez_vous as $key => $rdv)
                        <tr>
                            <td>{{ $key + 1 }}</td> <!-- Utilisez $key + 1 pour afficher une séquence continue de 1, 2, 3, etc. -->
                            <td>{{ $rdv->nomprenomPatient }}</td>
                            <td>{{ $rdv->email }}</td>
                            <td>{{ $rdv->prenomMedecin }}{{ " " }}{{ $rdv->nomMedecin }}</td>
                            <td>{{ $rdv->contactMedecin }}</td>
                            <td>{{ $rdv->specialite }}</td>
                            <td>{{ $rdv->localite }}</td>
                            <td>{{ $rdv->date }}</td>
                            <td>{{ $rdv->heure }}</td>
                            <td class="text-center">

                                <a href="" class="text-success"><i class="fas fa-download text-success"></i></a>

                                <a href="{{ route('rendezvous.edit', ['id' => $rdv->id]) }}" class="text-primary"><i class="fas fa-pencil-alt text-primary"></i></a>
                                <form id="form-{{ $rdv->id }}" action="{{ route('delete_rv', ['id' => $rdv->id]) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link text-danger" onclick="event.preventDefault(); document.getElementById('form-{{ $rdv->id }}').submit();">
                                    <i class="fas fa-trash-alt text-danger"></i></button>
                                </form>
                            </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    @else
        <p>Aucun rendez-vous enregistré.</p>
    @endif
@endsection
