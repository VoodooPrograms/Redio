<?php

namespace App\Service\YoutubeService;

interface YoutubeServiceInterface
{
    public function getVideoInfo(string $vid): object;

    public function getVideoTitle(string $vid): string;

    public function getVideoAuthor(string $vid): string;
}