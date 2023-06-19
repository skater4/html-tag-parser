<?php

namespace App\Models\Content\Base;

use App\Models\Content\Contracts\ContentInterface;

abstract class BaseContent implements ContentInterface
{
    protected string $content;

    public function __construct(string $content)
    {
        $this->content = $content;
    }
}