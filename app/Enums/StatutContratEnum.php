<?php

namespace App\Enums;

enum StatutContratEnum: string
{
    case EN_COURS = 'EN_COURS';
    case EXPIRE   = 'EXPIRE';
    case RESILIE  = 'RESILIE';

    public function label(): string
    {
        return match($this) {
            self::EN_COURS => 'En cours',
            self::EXPIRE   => 'Expiré',
            self::RESILIE  => 'Résilié',
        };
    }
}