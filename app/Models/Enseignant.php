<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{
    use HasFactory;

    protected $fillable = [
        'matricule',
        'telephone',
        'rib',
        'specialite',
        'date_recrutement',
        'plafond_horaire_annuel',
        'actif',
        'user_id',
    ];
}
