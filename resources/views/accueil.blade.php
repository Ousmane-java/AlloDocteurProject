<!-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Accueil</title>
        <!-- pwa -->
<!-- <link rel="manifest" href="{{ asset('manifest.json')}}"> -->
<!-- Fonts -->
<!-- <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

        <!-- Styles -->
<!-- <style>
            .btn{

            }
        </style>
    </head>
    <body >


    <div class="container"> --> -->
<!-- Logo -->
<!-- <div class="row">
            <div class="col">
                <img src="{{asset('assets/img/logo.jpg')}}" alt="Logo" width="150">
            </div>
        </div> -->
<!-- Texte au milieu -->
<!-- <div class="row ">
            <div class="col">
                <h1 class="text-center">Allo Docteur!</h1>
                <p class="text-center">Simplifiez la prise de rendez-vous médicaux.<br> Réservez rapidement vos consultations et <br> gérer vore agenda de santé en toute simplicité </p>
            </div>
        </div> -->
<!-- Image en bas du texte -->
<!-- <div class="row mb-3">
            <div class="col text-center">
                <img src="{{asset('assets/img/img4.jpg')}}" alt="Image illustrative" width="400">
            </div>
        </div> -->
<!-- Bouton prendre rendez-vous -->
<!-- <div class="row mb-5 py-0">
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
 -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Accueil</title>
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'figtree', sans-serif;
            background-color: #f8f9fa;
            color: #333;
            background-image: url('{{ asset("assets/img/background.jpg") }}');
            background-size: cover;
            background-position: center;
        }

        .container {
            text-align: center;
            margin-top: 50px;
            padding: 30px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.3);
            max-width: 800px;
            margin: auto;
        }

        h1 {
            font-size: 3rem;
            margin-bottom: 20px;
            color: #0366d6;
            overflow: hidden;
            white-space: nowrap;
            animation: type-erase 6s infinite;
        }

        @keyframes type-erase {

            0%,
            50%,
            100% {
                width: 0;
            }

            25%,
            75% {
                width: 100%;
            }
        }

        p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }

        .btn {
            font-size: 1.2rem;
            padding: 15px 30px;
            border-radius: 30px;
            background-color: #0366d6;
            border: none;
            transition: background-color 0.3s ease-in-out;
        }

        .btn:hover {
            background-color: #055499;
        }

        .img-fluid {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.3);
            margin-top: 30px;
        }

        .service-icon {
            font-size: 3rem;
            color: #0366d6;
            margin-bottom: 10px;
        }

        .testimonial {
            font-style: italic;
            margin-bottom: 30px;
            color: #555;
        }

        .testimonial:first-of-type {
            margin-top: 30px;
        }

        .service-icon {
            font-size: 3rem;
            color: #0366d6;
            margin-bottom: 10px;
        }

        .service-title {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #0366d6;
        }

        .service-description {
            font-size: 1.1rem;
            margin-bottom: 20px;
            color: #555;
        }

        .row-cols-md-4 .col-md-4 {
            flex: 0 0 33.333333%;
            max-width: 33.333333%;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Logo -->
        <div class="row">
            <div class="col">
                <img src="{{asset('assets/img/logo.jpg')}}" alt="Logo" width="150">
            </div>
        </div>
        <!-- Texte au milieu -->
        <div class="row">
            <div class="col">
                <h1>Allo Docteur!</h1> <!-- Le texte "Allo Docteur" sera écrit et effacé de manière répétitive -->
                <p>Simplifiez la prise de rendez-vous médicaux. Réservez rapidement vos consultations et gérez votre agenda de santé en toute simplicité.</p>
            </div>
        </div>
        <!-- Services -->
        <div class="row mb-5">
            <div class="col">
                <div class="row row-cols-md-4 g-4">
                    <div class="col-md-4">
                        <i class="bi bi-heart-fill service-icon"></i>
                        <h3 class="service-title">Soins de qualité</h3>
                        <p class="service-description">Des soins médicaux de haute qualité assurés par des professionnels compétents.</p>
                    </div>
                    <div class="col-md-4">
                        <i class="bi bi-clock-history service-icon"></i>
                        <h3 class="service-title">Rapidité</h3>
                        <p class="service-description">Prise de rendez-vous rapide et flexible pour répondre à vos besoins.</p>
                    </div>
                    <div class="col-md-4">
                        <i class="bi bi-chat-dots-fill service-icon"></i>
                        <h3 class="service-title">Communication Facile</h3>
                        <p class="service-description">Communication transparente avec votre médecin pour un suivi optimal.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Témoignages -->
        <div class="row mb-5">
            <div class="col">
                <p class="testimonial">"J'ai trouvé Allo Docteur très pratique et efficace. La prise de rendez-vous est si simple!"</p>
                <p class="testimonial">"Le service clientèle était excellent. Ils ont répondu à toutes mes questions rapidement."</p>
            </div>
        </div>
        <!-- Image en bas du texte -->
        <div class="row">
            <div class="col">
                <img src="{{asset('assets/img/img4.jpg')}}" alt="Image illustrative" class="img-fluid">
            </div>
        </div>
        <!-- Bouton prendre rendez-vous -->
        <div class="row">
            <div class="col">
                <a href="{{route('login')}}" class="btn btn-primary">Prendre rendez-vous</a>
            </div>
        </div>
    </div>
</body>

</html>