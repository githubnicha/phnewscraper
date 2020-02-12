<?php

namespace Chasj\NewsScraper\Service;

class JsonReader implements ReaderInterface
{
    public function read(string $file)
    {
        $feed = file_get_contents($file);
        return (object)json_decode($feed);
    }
}
