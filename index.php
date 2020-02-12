<?php

require_once __DIR__ . '/vendor/autoload.php';

use Chasj\NewsScraper\Service\JsonReader;
use Chasj\NewsScraper\Service\XmlReader;

$xmlData = [];
$feeds = (new JsonReader())->read(__DIR__ . '/rss.json');
foreach ($feeds as $k => $v) {
    $data = (new XmlReader())->read($v);
    foreach($data as $d) {
        if (date('Y-m-d H:i:s', strtotime($d['pubDate'].' - 1 day')) <= date('Y-m-d H:i:s')) {
            array_push($xmlData, [
                "title" => $d['title'],
                "link" => $d['link'],
                "pubdate" => $d['pubDate'],
                "channel" => $k
            ]);
        }
    }    
}
$shuffled_array = [];
$keys = array_keys($xmlData);
shuffle($keys);
foreach ($keys as $key)
{
	$shuffled_array[] = $xmlData[$key];
}
echo json_encode($shuffled_array);
