<?php

namespace App\Service\YoutubeService;

use Madcoda\Youtube\Youtube;

class YoutubeService implements YoutubeServiceInterface
{
    private Youtube $client;

    public function __construct(Youtube $client)
    {
        $this->client = $client;
    }

    public function getVideoInfo(string $vid): object
    {
        return $this->client->getVideoInfo($vid);
    }

    public function getVideoTitle(string $vid): string
    {
        return $this->getVideoInfo($vid)->snippet->title;
    }

    public function getVideoAuthor(string $vid): string
    {
        return $this->getVideoInfo($vid)->snippet->channelTitle;
    }
}