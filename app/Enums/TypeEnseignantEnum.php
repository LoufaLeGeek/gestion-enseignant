<?php

namespace App\Enums;

enum TypeEnseignantEnum: string
{
    case PER      = 'PER';
    case VACATAIRE = 'VACATAIRE';

    public function label(): string
    {
        return match($this) {
            self::PER      => 'Personnel Enseignant et de Recherche',
            self::VACATAIRE => 'Vacataire',
        };
    }
}