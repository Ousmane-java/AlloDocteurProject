<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="manifest" href="{{ asset('manifest.json')}}">
        <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>
<body>

</body>
</html>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Prendre rendez-vous</div>
                <div class="card-body">
                    <form method="POST" action="">
                        @csrf
                        <div class="form-group">
                            <label for="prestation">Spécialitées</label>
                            <select class="form-control" id="prestation" name="prestation">
                                <option value="cardiologie" data-medecins="[1, 2, 3]">Cardiologie</option>
                                <option value="cardiologie">Dermatologie</option>
                                <option value="cardiologie">Neurologie</option>
                                <option value="cardiologie">Physiatrie</option>
                                <option value="cardiologie">Gynécologie</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="prestation">Medecins</label>
                            <select class="form-control" id="prestation" name="prestation">
                                <option value="cardiologie">Cardiologie</option>
                                <option value="cardiologie">Cardiologie</option>
                                <option value="cardiologie">Cardiologie</option>
                                <option value="cardiologie">Cardiologie</option>
                                <option value="cardiologie">Cardiologie</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="prestation">Localité</label>
                            <select class="form-control" id="prestation" name="prestation">
                                <option value="cardiologie">Cardiologie</option>
                                <option value="cardiologie">Cardiologie</option>
                                <option value="cardiologie">Cardiologie</option>
                                <option value="cardiologie">Cardiologie</option>
                                <option value="cardiologie">Cardiologie</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" id="date" name="date">
                        </div>
                        <div class="form-group">
                            <label for="heure">Heure</label>
                            <input type="time" class="form-control" id="heure" name="heure">
                        </div>
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom">
                        </div>
                        <div class="form-group">
                            <label for="prenom">Prénom</label>
                            <input type="text" class="form-control" id="prenom" name="prenom">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="adresse">Adresse</label>
                            <input type="text" class="form-control" id="adresse" name="adresse">
                        </div>
                        <div class="form-group">
                            <label for="telephone">Téléphone</label>
                            <input type="text" class="form-control" id="telephone" name="telephone">
                        </div>
                        <button type="submit" class="btn btn-primary mt-4">Confirmer</button>
                        <a href="{{ url('/') }}" class="btn btn-secondary mt-4">Annuler</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

