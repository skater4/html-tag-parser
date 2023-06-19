<?php

namespace App\Models\Factories;

use App\Exceptions\ContentException;
use App\Models\Content\Contracts\ContentInterface;

class ContentFactory
{
    const PATH = 'App\Models\Content\Content';

    /**
     * @throws ContentException
     */
    public static function createContent(string $type, string $content): ContentInterface
    {
        //я не уверен, что это реализация абстрактной фабрики, да еще и с хардкодом на путь, пока не выяснил как это оформить адекватно
        $className = self::PATH . ucfirst($type);
        if (!class_exists($className)) {
            throw new ContentException('Wrong content type ' . $type);
        }

        return new $className($content);
    }
}