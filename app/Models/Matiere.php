<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Enums\TypeSemestreEnum;

class Matiere extends Model
{
     protected $fillable = [
        'code',
        'intitule',
        'volume_cm',
        'volume_td',
        'volume_tp',
        'semestre',
        'filiere_id',
    ];
 
     protected function casts(): array
    {
        return [
            'semestre'   => TypeSemestreEnum::class, // cast → TypeSemestreEnum (S1..S6)
            'volume_cm'  => 'integer',
            'volume_td'  => 'integer',
            'volume_tp'  => 'integer',
        ];
    }

    /**
     * Relation : Concerner (1) — une matière appartient à une filière.
     */
    public function filiere(): BelongsTo
    {
        return $this->belongsTo(Filiere::class);
    }
 
    /**
     * Relation : Peut faire l'objet (1,*) — une matière peut avoir plusieurs affectations.
     */
    public function affectations(): HasMany
    {
        return $this->hasMany(Affectation::class);
    }
}
