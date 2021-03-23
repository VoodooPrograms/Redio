<?php

namespace App\Service\PlaylistService;

use App\Entity\Playlist;
use App\Repository\PlaylistRepository;

class PlaylistService implements PlaylistServiceInterface
{
    protected PlaylistRepository $repo;

    public function __construct(PlaylistRepository $repo) {
        $this->repo = $repo;
    }

    public function getAll()
    {
        return $this->repo->findAll();
    }

    public function getById(int $id): ?Playlist
    {
        return $this->repo->find($id);
    }
}