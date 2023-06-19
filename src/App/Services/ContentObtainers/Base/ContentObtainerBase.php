<?php

namespace App\Services\ContentObtainers\Base;

use App\Exceptions\ContentException;
use App\Models\Content\Contracts\ContentInterface;
use App\Models\Factories\ContentFactory;
use App\Services\ContentObtainers\Contracts\ContentObtainerInterface;

abstract class ContentObtainerBase implements ContentObtainerInterface
{
    protected string $contentType;
    protected string $url;
    protected string $content;

    public function __construct($url)
    {
        $this->url = $url;
    }

    abstract protected function obtainContent(): void;

    /**
     * @throws ContentException
     */
    public function getContent(): ContentInterface
    {
        $this->obtainContent();

        return ContentFactory::createContent($this->contentType, $this->content);
    }
}