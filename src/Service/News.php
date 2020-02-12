<?php

namespace Chasj\NewsScraper\Service;

class News
{
      protected $news = [];

      public function add($news)
      {
            $this->news[] = $news;
      }

      public function news()
      {
            return $this->news;
      }

      public function random() 
      {
            return array_rand($this->news);
      }
}
