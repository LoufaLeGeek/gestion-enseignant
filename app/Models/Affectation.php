<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Enums\StatutAffectationEnum;
use App\Enums\TypeCoursEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;



class Affectation extends Model
{
     use HasFactory;
 
    protected $fillable = [
        'type_cours',
        'volume_heure_affecte',
        'volume_heure_effectue',
        'date_affectation',
        'statut',
        'commentaire_admin',
        'commentaire_enseignant',
        'taux_horaire_snapshot',
        'enseignant_departement_id',
        'matiere_id',
        'contrat_id',
        'annee_academique_id',
    ];

    protected function casts(): array
    {
        return [
            'type_cours' => TypeCoursEnum::class,        
            'statut' => StatutAffectationEnum::class,  
            'volume_heure_affecte'  => 'integer',
            'volume_heure_effectue' => 'integer',
            'date_affectation'      => 'date',
            'taux_horaire_snapshot' => 'decimal:2',
        ];
    }

    /**
     * Relation : Peut faire l'objet (1) — une affectation concerne un enseignant.
     */
    public function enseignant_departement(): BelongsTo
    {
        return $this->belongsTo(EnseignantDepartement::class);
    }
 
    /**
     * Relation : Peut faire l'objet (1) — une affectation porte sur une matière.
     */
    public function matiere(): BelongsTo
    {
        return $this->belongsTo(Matiere::class);
    }
 
    /**
     * Relation : Couvrir (0,1) — une affectation est couverte par un contrat (nullable).
     */
    public function contrat(): BelongsTo
    {
        return $this->belongsTo(Contrat::class);
    }

    public function annee_academique(): BelongsTo
    {
        return $this->belongsTo(AnneeAcademique::class);
    }
 
    /**
     * Une affectation peut appartenir à une seule paiements.
     */
    public function paiement(): HasOne
    {
        return $this->hasOne(Paiement::class);
    }
}
