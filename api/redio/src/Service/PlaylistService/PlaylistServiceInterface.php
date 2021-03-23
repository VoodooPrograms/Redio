<?php

namespace App\Service\PlaylistService;

use App\Entity\Playlist;

interface PlaylistServiceInterface
{
    public function getAll();
    public function getById(int $id): ?Playlist;
}