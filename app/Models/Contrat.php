<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrat extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_fin',
        'taux_horaire',
        'statut',
        'actif',
        'enseignant_id',
    ];
}
