<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Accueil</title>
        <!-- pwa -->
        <link rel="manifest" href="{{ asset('manifest.json')}}">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

        <!-- Styles -->
        <style>
            .btn{

            }
        </style>
    </head>
    <body >


    <div class="container">
        <!-- Logo -->
        <div class="row">
            <div class="col">
                <img src="{{asset('assets/img/logo.jpg')}}" alt="Logo" width="150">
            </div>
        </div>
        <!-- Texte au milieu -->
        <div class="row ">
            <div class="col">
                <h1 class="text-center">Allo Docteur!</h1>
                <p class="text-center">Simplifiez la prise de rendez-vous médicaux.<br> Réservez rapidement vos consultations et <br> gérer vore agenda de santé en toute simplicité </p>
            </div>
        </div>
        <!-- Image en bas du texte -->
        <div class="row mb-3">
            <div class="col text-center">
                <img src="{{asset('assets/img/img4.jpg')}}" alt="Image illustrative" width="400">
            </div>
        </div>
        <!-- Bouton prendre rendez-vous -->
        <div class="row mb-5 py-0">
            <div class="col text-center">
                <a href="{{route('login')}}" class="btn  btn-outline-primary ">Prendre rendez-vous</a>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col text-center">
                <a href="{{route('liste_rv')}}" class="btn  btn-outline-secondary "> Mes rendez-vous</a>
            </div>
        </div>
    </div>
    </body>
    <script>

    </script>
</html>

