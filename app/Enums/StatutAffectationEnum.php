<?php

namespace App\Enums;

enum StatutAffectationEnum: string
{
    case EN_ATTENTE = 'EN_ATTENTE';
    case VALIDEE    = 'VALIDEE';
    case REJETEE    = 'REJETEE';
    case TERMINEE   = 'TERMINEE';

    public function label(): string
    {
        return match($this) {
            self::EN_ATTENTE => 'En attente',
            self::VALIDEE    => 'Validée',
            self::REJETEE    => 'Rejetée',
            self::TERMINEE   => 'Terminée',
        };
    }
}