<?php
namespace App\Services\Parsers;

use App\Services\Parsers\Base\ParserBase;

class ParserHtml extends ParserBase
{
    public function parse(): array
    {
        $tags = array();
        preg_match_all('/<([^\/\s>]+)/', $this->content, $matches);

        foreach ($matches[1] as $tag) {
            $tagName = preg_replace("/\s.*$/", "", $tag);
            if (isset($tags[$tagName])) {
                $tags[$tagName]++;
            } else {
                $tags[$tagName] = 1;
            }
        }

        return $tags;
    }
}