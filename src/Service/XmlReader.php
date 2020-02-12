<?php
declare(strict_types=1);

namespace Chasj\NewsScraper\Service;

class XmlReader implements ReaderInterface
{
    public function read(string $url)
    {
        if (filter_var($url, FILTER_VALIDATE_URL)) {
            $content = simplexml_load_file($url);
            $json = json_encode($content);
            $array = json_decode($json,TRUE);
            return $array['channel']['item'];
        }
    }
}
