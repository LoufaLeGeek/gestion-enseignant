<?php

namespace App\Enums;

enum TypeSemestreEnum: string
{
    case S1 = 'S1';
    case S2 = 'S2';
    case S3 = 'S3';
    case S4 = 'S4';
    case S5 = 'S5';
    case S6 = 'S6';

    public function label(): string
    {
        return 'Semestre ' . substr($this->value, 1);
    }
}