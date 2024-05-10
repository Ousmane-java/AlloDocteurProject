<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    {{--  <link rel="manifest" href="{{ asset('manifest.json')}}">  --}}
        <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow border-0">
                <div class="card-header">Prendre rendez-vous</div>
                <div class="card-body">
                    <!-- Modifier le formulaire pour utiliser les données des médecins -->
                    <form method="POST" action="{{ route('home') }}">
                         <!-- @csrf -->
                        <div class="form-group">
                            <label for="specialite">Spécialité</label>
                            <select class="form-control" id="specialite" name="specialite">
                                @foreach($specialites as $specialite)
                                    <option value="{{ $specialite }}">{{ $specialite }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mt-3">
                            <label for="localite">Hopitale</label>
                            <select class="form-control" id="localite" name="localite">
                                @foreach($medecins as $medecin)
                                <option value="{{ $medecin->localite }}">{{ $medecin->localite}}</option>
                                @endforeach
                              </select>
                        </div>
                        <div class="form-group mt-3">
                            <label for="medecin">Médecins</label>
                            <select class="form-control" id="medecin" name="medecin">
                                @foreach($medecins as $medecin)
                                <option value="{{ $medecin->id }}">{{ $medecin->nom }} {{ $medecin->prenom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-3 mt-3">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" id="date" name="date">
                        </div>
                        <div class="form-group mt-3">
                            <label for="heure">Heure</label>
                            <input type="time" class="form-control" id="heure" name="heure">
                        </div>
                        <div class="form-group mt-3">
                            <label for="nom">Nom & Prenom</label>
                            <input type="text" class="form-control" id="nom" name="nom" value="{{ $user ? $user->name: '' }}" readonly>
                        </div>

                        <div class="form-group mt-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{$user ?$user->email:'' }}" readonly>
                        </div>

                        <button type="submit" class="btn btn-primary mt-4">Confirmer</button>
                        <a href="{{ url('/') }}" class="btn btn-secondary mt-4">Annuler</a>
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

