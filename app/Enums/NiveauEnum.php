<?php

namespace App\Enums;

enum NiveauEnum: string
{
    case LICENCE  = 'LICENCE';
    case MASTER   = 'MASTER';
    case DOCTORAT = 'DOCTORAT';

    public function label(): string
    {
        return match($this) {
            self::LICENCE  => 'Licence',
            self::MASTER   => 'Master',
            self::DOCTORAT => 'Doctorat',
        };
    }
}