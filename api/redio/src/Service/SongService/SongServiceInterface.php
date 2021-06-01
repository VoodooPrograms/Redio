<?php

namespace App\Service\SongService;

use App\DataObject\DataObject;
use App\Entity\Song;

interface SongServiceInterface
{
    public function getAll();

    public function getById(int $id): ?Song;

    public function create(DataObject $data): ?Song;

    public function update(DataObject $data, int $playlistId): ?Song;

    public function delete(int $playlistId): void;
}