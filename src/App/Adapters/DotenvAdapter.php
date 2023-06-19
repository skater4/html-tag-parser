<?php

namespace App\Adapters;

class DotenvAdapter
{
    public static function getEnv(string $name)
    {
        return $_ENV[$name] ?? false;
    }

    public static function populatePutenv(array $values): void
    {
        foreach ($values as $name => $value) {
            putenv("$name=$value");
        }
    }
}