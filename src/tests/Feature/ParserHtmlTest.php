<?php
namespace Feature;

require_once __DIR__ . '/../../autoload.php';
use App\Models\Content\ContentHtml;
use App\Services\Parsers\ParserHtml;
use PHPUnit\Framework\TestCase;

class ParserHtmlTest extends TestCase
{
    public function testParse()
    {
        $html = '
            <!doctype html>
            <html>
            <head>
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title data-react-helmet="true">Sample Page</title>
            </head>
            <body>
                <div id="root">
                    <div class="Container">
                        <div class="Spacer" style="padding-bottom:40px"></div>
                        <div class="Spacer" style="padding-bottom:16px"></div>
                        <span class="Text Text_weight_medium Text_typography_headline-s"></span>
                        <span class="Text Text_weight_regular Text_typography_body-long-m"></span>
                        <noscript></noscript>
                        <div class="Spacer Spacer_auto-gap_bottom" style="padding-top:40px;padding-bottom:40px"></div>
                        <div class="CheckboxCaptcha" data-testid="checkbox-captcha"></div>
                    </div>
                </div>
            </body>
            </html>
        ';

        $parser = new ParserHtml(new ContentHtml($html));
        $result = $parser->parse();

        $expected = [
            '!doctype' => 1,
            'html' => 1,
            'head' => 1,
            'meta' => 3,
            'title' => 1,
            'body' => 1,
            'div' => 6,
            'span' => 2,
            'noscript' => 1,
        ];

        $this->assertEquals($expected, $result);
    }
}
