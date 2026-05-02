<?php

namespace App\Models;

use App\Enums\GradeEnum;
use App\Enums\TypeEnseignantEnum;
use Illuminate\Database\Eloquent\Model;

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
}
