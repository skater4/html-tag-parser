<?php

namespace App\Services\Parsers\Base;

use App\Models\Content\Contracts\ContentInterface;
use App\Services\Parsers\Contracts\ParserInterface;

abstract class ParserBase implements ParserInterface
{
    protected ContentInterface $content;

    public function __construct(ContentInterface $content)
    {
        $this->content = $content;
    }

    abstract public function parse(): array;
}