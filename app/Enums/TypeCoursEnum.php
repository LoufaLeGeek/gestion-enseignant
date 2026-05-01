<?php

namespace App\Enums;

enum TypeCoursEnum: string
{
    case CM = 'CM';
    case TD = 'TD';

    public function label(): string
    {
        return match($this) {
            self::CM => 'Cours Magistral',
            self::TD => 'Travaux Dirigés',
        };
    }
}