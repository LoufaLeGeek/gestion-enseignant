<?php

namespace App\Models;

use App\Enums\GradeEnum;
use App\Enums\TypeEnseignantEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EnseignantDepartement extends Model
{
    protected $table = 'enseignant_departements';

    public $incrementing = true;

    protected $fillable = [
        'enseignant_id',
        'departement_id',
        'type',
        'grade',
        'date_affectation',
        'atif',
    ];

    protected function casts(): array
    {
        return [
            'type' => TypeEnseignantEnum::class,
            'grade' => GradeEnum::class,
            'date_affectation' => 'date',
            'atif' => 'boolean',
        ];
    }

    public function enseignant(): BelongsTo
    {
        return $this->belongsTo(Enseignant::class);
    }

    public function departement(): BelongsTo
    {
        return $this->belongsTo(Departement::class);
    }

    public function contrats(): HasMany
    {
        return $this->hasMany(Contrat::class);
    }

    public function affectations(): HasMany
    {
        return $this->hasMany(Affectation::class);
    }
}
