<?php

namespace App\Services\Factories;

use App\Exceptions\ParserException;
use App\Models\Content\Contracts\ContentInterface;
use App\Services\Parsers\Contracts\ParserInterface;

class ParserFactory
{
    const PATH = 'App\Services\Parsers\Parser';

    /**
     * @throws ParserException
     */
    public static function createParser(string $type, ContentInterface $content): ParserInterface
    {
        //я не уверен, что это реализация абстрактной фабрики, да еще и с хардкодом на путь, пока не выяснил как это оформить адекватно
        //код повторяется с фабрикой контента, но решил разделить, тк возможна разная реализация
        $className = self::PATH . ucfirst($type);
        if (!class_exists($className)) {
            throw new ParserException('Wrong parser type ' . $type);
        }

        return new $className($content);
    }
}