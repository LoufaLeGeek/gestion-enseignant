<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Departement extends Model
{
      protected $fillable = [
        'nom',
        'description',
    ];

     /**
     * Relation : Appartenir (*) — un département a plusieurs filières.
     */
    public function filieres(): HasMany
    {
        return $this->hasMany(Filiere::class);
    }
 
    /**
     * Relation : Appartenir (*,*) via EnseignantDepartement (pivot enrichi).
     * Un département est rattaché à plusieurs enseignants.
     */
    public function enseignants(): BelongsToMany
    {
        return $this->belongsToMany(Enseignant::class, 'enseignant_departements')
                    ->using(EnseignantDepartement::class)
                    ->withPivot(['type', 'grade', 'date_affectation', 'atif'])
                    ->withTimestamps();
    }
}
