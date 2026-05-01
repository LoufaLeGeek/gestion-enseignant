<?php

namespace App\Enums;

enum GradeEnum: string
{
    case ASSISTANT         = 'ASSISTANT';
    case MAITRE_ASSISTANT  = 'MAITRE_ASSISTANT';
    case MAITRE_CONFERENCE = 'MAITRE_CONFERENCE';
    case PROFESSEUR        = 'PROFESSEUR';

    public function label(): string
    {
        return match($this) {
            self::ASSISTANT         => 'Assistant',
            self::MAITRE_ASSISTANT  => 'Maître Assistant',
            self::MAITRE_CONFERENCE => 'Maître de Conférences',
            self::PROFESSEUR        => 'Professeur',
        };
    }
}