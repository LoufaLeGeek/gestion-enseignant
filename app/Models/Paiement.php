<?php

namespace App\Models;

use App\Enums\StatutPaiementEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Paiement extends Model
{
      use HasFactory;
 
    protected $fillable = [
        'periode_debut',
        'periode_fin',
        'total_heures',
        'montant',
        'statut',
        'date_generation',
        'affectation_id',
    ];
 
    protected function casts(): array
    {
        return [
            'periode_debut'   => 'date',
            'periode_fin'     => 'date',
            'total_heures'    => 'decimal:2',
            'montant'         => 'decimal:2',
            'statut'          => StatutPaiementEnum::class,
            'date_generation' => 'datetime',
        ];
    }

    public function affectation(): BelongsTo
    {
        return $this->belongsTo(Affectation::class);
    }
}
