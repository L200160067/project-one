<?php

namespace App\Enums;

enum DivisionType: string
{
    case Weight = 'weight';         // Kelas Berat (Kyorugi)
    case Performance = 'performance'; // Seni (Poomsae)

    public function label(): string
    {
        return match ($this) {
            self::Weight => 'Tanding (Berat)',
            self::Performance => 'Seni (Tunggal/Regu)',
        };
    }
}
