<?php

namespace App\Models;

use App\Enums\StatutContratEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Contrat extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_fin',
        'taux_horaire',
        'statut',
        'actif',
        'enseignant_departement_id',
    ];

    protected function casts(): array
    {
        return [
            'date_fin'     => 'date',
            'taux_horaire' => 'decimal:2',
            'statut'       => StatutContratEnum::class,
            'actif'        => 'boolean',
        ];
    }

    public function enseignant_departement(): BelongsTo
    {
        return $this->belongsTo(EnseignantDepartement::class);
    }

    public function affectations(): HasMany
    {
        return $this->hasMany(Affectation::class);
    }
}
