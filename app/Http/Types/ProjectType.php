<?php

namespace App\Http\Types;

enum ProjectType: string
{
    case ALL = "all";
    case LARAVEL = "laravel";
    case SPA = "spa";
    case MOBILE = "mobile";

    public static function values(): array
    {
       return array_column(self::cases(), 'value');
    }
}
