<?php

namespace App\Enums;

enum Discipline: string
{
    case Kyorugi = 'kyorugi'; // Tanding
    case Poomsae = 'poomsae'; // Seni/Jurus

    public function label(): string
    {
        return match ($this) {
            self::Kyorugi => 'Kyorugi (Tanding)',
            self::Poomsae => 'Poomsae (Seni)',
        };
    }
}
