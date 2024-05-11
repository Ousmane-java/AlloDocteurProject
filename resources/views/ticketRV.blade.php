<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Ticket rendez vous </title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><center><h2>Votre ticket de Rendez-vous</h2></center></div>
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
                        <p>Veuillez arriver 15 minutes avant l'heure prévue et veillez à conserver votre ticket.</p> <br>
                        <center><h6>Document légal générer par Allo Docteur !</h6></center>


                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
