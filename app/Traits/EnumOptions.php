<?php

namespace App\Traits;

trait EnumOptions
{
    public static function options(): array
    {
        return collect(self::cases())->pluck('name', 'value')->toArray();
    }

    public static function values(): array
    {
        return collect(self::cases())->pluck('value')->toArray();
    }
}
