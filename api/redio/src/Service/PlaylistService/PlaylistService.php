<?php

namespace App\Service\PlaylistService;

use App\DataObject\DataObject;
use App\DataObject\PlaylistDataObject;
use App\Entity\Playlist;
use App\Repository\PlaylistRepository;
use App\Repository\UserRepository;
use App\Service\FileUploader\FileUploader;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class PlaylistService implements PlaylistServiceInterface
{
    protected PlaylistRepository $repo;
    protected UserRepository $userRepo;
    protected UserInterface $user;
    protected FileUploader $fileUploader;

    public function __construct(
        PlaylistRepository $repo,
        UserRepository $userRepo,
        TokenStorageInterface $tokenStorage,
        FileUploader $fileUploader
    ) {
        $this->repo = $repo;
        $this->userRepo = $userRepo;
        $this->user = $tokenStorage->getToken()->getUser();
        $this->fileUploader = $fileUploader;
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
        $playlist->setUserId($this->user);
        $playlist->setImageUri($this->fileUploader->upload($data->image_uri));
        $playlist->setTags($data->tags);
        return $this->repo->save($playlist);
    }

    public function update(DataObject $data, int $playlistId): ?Playlist
    {
        $playlist = $this->repo->find($playlistId);
        $playlist->setName($data->name);
        $playlist->setUserId($this->user);
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