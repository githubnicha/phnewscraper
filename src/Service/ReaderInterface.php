<?php

namespace Chasj\NewsScraper\Service;

interface ReaderInterface
{
    public function read(string $string);
}