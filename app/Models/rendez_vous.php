<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rendez_vous extends Model
{
    use HasFactory;

    protected $table = 'rendez_vouses'; // Nom de votre table

    protected $fillable = ['nomprenomPatient',
     'email',
      'idMedecin',
      'prenomMedecin',
      'nomMedecin',
      'specialite',
      'localite',
       'contactMedecin',
       'date',
        'heure'];


    public function medecin()
    {
        return $this->belongsTo(Medecin::class, 'idMedecin');
    }
}


