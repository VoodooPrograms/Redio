<?php

namespace App\Service\PlaylistService;

use App\DataObject\DataObject;
use App\Entity\Playlist;

interface PlaylistServiceInterface
{
    public function getAll();

    public function getById(int $id): ?Playlist;

    public function create(DataObject $data): ?Playlist;

    public function update(DataObject $data, int $playlistId): ?Playlist;

    public function delete(int $playlistId): void;

}