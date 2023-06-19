<?php

use App\Exceptions\ContentException;
use App\Exceptions\ParserException;
use App\Facades\Parser;
require_once 'autoload.php';

$url = 'https://ya.ru';

try {
    $parsedContent = Parser::parse($url);
    echo '<pre>' . print_r($parsedContent, true) . '</pre>';
} catch (Exception | ParserException | ContentException $e) {
    die($e->getMessage());
}