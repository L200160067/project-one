<?php

namespace App\Enums;

enum CompetitionLevel: string
{
    case Prestasi = 'prestasi'; // Sistem Gugur
    case Festival = 'festival'; // Pemula

    public function label(): string
    {
        return match ($this) {
            self::Prestasi => 'Prestasi',
            self::Festival => 'Festival',
        };
    }
}
