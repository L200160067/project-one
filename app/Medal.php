<?php

namespace App\Enums;

enum Medal: string
{
    case Gold = 'gold';
    case Silver = 'silver';
    case Bronze = 'bronze';

    public function points(): int
    {
        return match ($this) {
            self::Gold => 5,
            self::Silver => 3,
            self::Bronze => 1,
        };
    }

    public function label(): string
    {
        return match ($this) {
            self::Gold => 'Emas',
            self::Silver => 'Perak',
            self::Bronze => 'Perunggu',
        };
    }
}
