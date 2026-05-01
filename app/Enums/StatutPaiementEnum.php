<?php

namespace App\Enums;

enum StatutPaiementEnum: string
{
    case BROUILLON = 'BROUILLON';
    case VALIDE    = 'VALIDE';
    case PAYE      = 'PAYE';

    public function label(): string
    {
        return match($this) {
            self::BROUILLON => 'Brouillon',
            self::VALIDE    => 'Validé',
            self::PAYE      => 'Payé',
        };
    }
}