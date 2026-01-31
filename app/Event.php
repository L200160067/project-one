<?php

namespace App;

enum Event: string
{
    case Preparation = 'preparation';
    case Active = 'active';
    case Finished = 'finished';


    public function label(): string
    {
        return match ($this) {
            self::Preparation => 'Persiapan',
            self::Active => 'Aktif',
            self::Finished => 'Selesai',
        };
    }
}
