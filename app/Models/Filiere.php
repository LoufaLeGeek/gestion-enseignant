<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use app\Enums\NiveauEnum;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Filiere extends Model
{
     protected $fillable = [
        'nom',
        'niveau',
        'description',
        'departement_id',
    ];

      protected function casts(): array
    {
        return [
            'niveau' => NiveauEnum::class, // cast → NiveauEnum (LICENCE|MASTER|DOCTORAT)
        ];
    }

     /**
     * Relation : Appartenir (1) — une filière appartient à un département.
     */
    public function departement(): BelongsTo
    {
        return $this->belongsTo(Departement::class);
    }
 
    /**
     * Relation : Concerner (1,*) — une filière contient plusieurs matières.
     */
    public function matieres(): HasMany
    {
        return $this->hasMany(Matiere::class);
    }
}
