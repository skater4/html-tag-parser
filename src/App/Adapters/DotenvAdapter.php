<?php

namespace App\Adapters;

class DotenvAdapter
{
    public static function getEnv(string $name)
    {
        return $_ENV[$name] ?? false;
    }
}