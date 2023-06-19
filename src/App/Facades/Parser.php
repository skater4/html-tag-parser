<?php

namespace App\Facades;

use App\Adapters\DotenvAdapter;
use App\Exceptions\ContentException;
use App\Exceptions\ParserException;
use App\Services\Factories\ContentObtainerFactory;
use App\Services\Factories\ParserFactory;

class Parser
{
    /**
     * @throws ContentException
     * @throws ParserException
     */
    public static function parse(string $url): array
    {
        //по-хорошему тут реализовать фабричный метод, но я еще не изучал его детально
        $type = DotenvAdapter::getEnv('CONTENT_TYPE');
        $content = ContentObtainerFactory::createContentObtainer($type, $url)->getContent();
        return ParserFactory::createParser($type, $content)->parse();
    }
}