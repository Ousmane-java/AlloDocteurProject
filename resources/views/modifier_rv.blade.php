@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow border-0">
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                     @endif
                    <div class="card-header">Modifier le rendez-vous</div>
                    <div class="card-body">

                        <form method="POST" action="{{ route('update_rv', ['id' => $rendezVous->id]) }}">

                            @csrf
                            <div class="form-group">
                                <label for="specialite">Spécialité</label>
                                <select class="form-control" id="specialite" name="specialite">
                                    @foreach($specialites as $specialite)
                                        <option value="{{ $specialite }}" {{ $specialite === $rendezVous->specialite ? 'selected' : '' }}>{{ $specialite }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mt-3">
                                <label for="localite">Hopitale</label>
                                <select class="form-control" id="localite" name="localite">
                                    @foreach($medecins as $medecin)
                                    <option value="{{ $medecin->localite }}" {{ $medecin->localite === $rendezVous->localite ? 'selected' : '' }}>{{ $medecin->localite }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mt-3">
                                <label for="medecin">Médecins</label>
                                <select class="form-control" id="medecin" name="medecin">
                                    @foreach($medecins as $medecin)
                                    <option value="{{ $medecin->id }}" {{ $medecin->id === $rendezVous->idMedecin ? 'selected' : '' }}>{{ $medecin->nom }} {{ $medecin->prenom }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mt-3">
                                <label for="date">Date</label>
                                <input type="date" class="form-control" id="date" name="date" value="{{ $rendezVous->date }}">
                            </div>

                            <div class="form-group mt-3">
                                <label for="heure">Heure</label>
                                <input type="time" class="form-control" id="heure" name="heure" value="{{ $rendezVous->heure }}">
                            </div>

                            @if(isset($user))
                            <div class="form-group mt-3">
                                <label for="nom">Nom & Prenom</label>
                                <input type="text" class="form-control" id="nom" name="nom" value="{{ $user->name }}" readonly>
                            </div>
                            <div class="form-group mt-3">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" readonly>
                            </div>
                        @endif


                            <button type="submit" class="btn btn-primary mt-4">Confirmer</button>
                            <a href="{{ route('liste_rv') }}" class="btn btn-secondary mt-4">Retour</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const specialiteSelect = document.getElementById('specialite');
        const hopitaleSelect = document.getElementById('localite');
        const medecinSelect = document.getElementById('medecin');

        specialiteSelect.addEventListener('change', function() {
            const selectedSpecialite = specialiteSelect.value;
            fetch(`/localites/${selectedSpecialite}`)
                .then(response => response.json())
                .then(data => {
                    hopitaleSelect.innerHTML = '';
                    data.forEach(hopital => {
                        const option = document.createElement('option');
                        option.value = hopital;
                        option.textContent = hopital;
                        hopitaleSelect.appendChild(option);
                    });
                });
        });

        hopitaleSelect.addEventListener('change', function() {
            const selectedLocalite = hopitaleSelect.value;
            fetch(`/medecins/${selectedLocalite}`)
                .then(response => response.json())
                .then(data => {
                    medecinSelect.innerHTML = '';
                    data.forEach(medecin => {
                        const option = document.createElement('option');
                        option.value = medecin.id;
                        option.textContent = `${medecin.nom} ${medecin.prenom}`;
                        medecinSelect.appendChild(option);
                    });
                });
        });
    });

</script>
@endsection
