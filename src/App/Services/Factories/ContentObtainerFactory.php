<?php

namespace App\Services\Factories;

use App\Exceptions\ContentException;
use App\Services\ContentObtainers\Contracts\ContentObtainerInterface;

class ContentObtainerFactory
{
    const PATH = 'App\Services\ContentObtainers\ContentObtainer';

    /**
     * @throws ContentException
     */
    public static function createContentObtainer(string $type, string $url): ContentObtainerInterface
    {
        //я не уверен, что это реализация абстрактной фабрики, да еще и с хардкодом на путь, пока не выяснил как это оформить адекватно
        //код повторяется с другими фабриками, но решил разделить, тк возможна разная реализация
        $className = self::PATH . ucfirst($type);
        if (!class_exists($className)) {
            throw new ContentException('Wrong obtainer type ' . $type);
        }

        return new $className($url);
    }
}