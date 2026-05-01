<?php

namespace App\Enums;

enum RoleEnum: string
{
    case ADMIN        = 'ADMIN';
    case ENSEIGNANT   = 'ENSEIGNANT';
    case RESPONSABLE  = 'RESPONSABLE';
    case COMPTABLE    = 'COMPTABLE';

    public function label(): string
    {
        return match($this) {
            self::ADMIN       => 'Administrateur',
            self::ENSEIGNANT  => 'Enseignant',
            self::RESPONSABLE => 'Responsable',
            self::COMPTABLE   => 'Comptable',
        };
    }
}