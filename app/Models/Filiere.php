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
            'niveau' => NiveauEnum::class, 
        ];
    }

    public function departement(): BelongsTo
    {
        return $this->belongsTo(Departement::class);
    }

    public function matieres(): HasMany
    {
        return $this->hasMany(Matiere::class);
    }
}
