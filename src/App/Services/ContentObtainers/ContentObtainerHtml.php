<?php

namespace App\Services\ContentObtainers;

use App\Models\Content\Severity;
use App\Services\ContentObtainers\Base\ContentObtainerBase;

class ContentObtainerHtml extends ContentObtainerBase
{
    protected string $contentType = Severity::SEVERITY_HTML;

    protected function obtainContent(): void
    {
        $this->content = file_get_contents($this->url);
    }
}