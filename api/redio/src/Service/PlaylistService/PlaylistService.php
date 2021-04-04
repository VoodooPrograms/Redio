<?php

namespace App\Service\PlaylistService;

use App\DataObject\DataObject;
use App\DataObject\PlaylistDataObject;
use App\Entity\Playlist;
use App\Repository\PlaylistRepository;
use App\Repository\UserRepository;

class PlaylistService implements PlaylistServiceInterface
{
    protected PlaylistRepository $repo;
    protected UserRepository $userRepo;

    public function __construct(
        PlaylistRepository $repo,
        UserRepository $userRepo
    ) {
        $this->repo = $repo;
        $this->userRepo = $userRepo;
    }

    public function getAll()
    {
        return $this->repo->findAll();
    }

    public function getById(int $id): ?Playlist
    {
        return $this->repo->find($id);
    }

    /**
     * @param PlaylistDataObject $data
     * @return Playlist|null
     */
    public function create(DataObject $data): ?Playlist
    {
        $playlist = new Playlist();
        $playlist->setName($data->name);
        $playlist->setUserId($this->userRepo->find($data->user_id));
        $playlist->setImageUri($data->image_uri);
        $playlist->setTags($data->tags);
        return $this->repo->save($playlist);
    }

    public function update(DataObject $data, int $playlistId): ?Playlist
    {
        $playlist = $this->repo->find($playlistId);
        $playlist->setName($data->name);
        $playlist->setUserId($this->userRepo->find($data->user_id));
        $playlist->setImageUri($data->image_uri);
        $playlist->setTags($data->tags);
        return $this->repo->save($playlist);
    }

    public function delete(int $playlistId): void
    {
        $playlist = $this->repo->find($playlistId);
        $this->repo->delete($playlist);
    }
}