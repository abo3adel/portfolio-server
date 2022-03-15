<?php

namespace App\Http\Types;

final class ProjectType
{
    const ALL = "all";
    const LARAVEL = "laravel";
    const SPA = "spa";
    const MOBILE = "mobile";

    public static function getAll(): array
    {
        return [self::ALL, self::LARAVEL, self::SPA, self::MOBILE];
    }
}
