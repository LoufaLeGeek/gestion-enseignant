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
            'semestre'   => TypeSemestreEnum::class, 
            'volume_cm'  => 'integer',
            'volume_td'  => 'integer',
            'volume_tp'  => 'integer',
        ];
    }

    public function filiere(): BelongsTo
    {
        return $this->belongsTo(Filiere::class);
    }

    public function affectations(): HasMany
    {
        return $this->hasMany(Affectation::class);
    }
}
