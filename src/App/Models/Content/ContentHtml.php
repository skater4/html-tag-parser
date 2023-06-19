<?php

namespace App\Models\Content;

use App\Models\Content\Base\BaseContent;

class ContentHtml extends BaseContent
{
    public function __toString(): string
    {
        return $this->content;
    }
}