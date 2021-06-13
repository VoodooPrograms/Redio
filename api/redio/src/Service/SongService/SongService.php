<?php

namespace App\Service\SongService;

use App\DataObject\DataObject;
use App\DataObject\SongDataObject;
use App\Entity\Song;
use App\Repository\PlaylistRepository;
use App\Repository\SongRepository;
use App\Repository\UserRepository;
use App\Service\YoutubeService\YoutubeServiceInterface;

class SongService implements SongServiceInterface
{
    protected SongRepository $repo;
    protected PlaylistRepository $playlistRepo;
    protected UserRepository $userRepo;
    protected YoutubeServiceInterface $youtubeService;

    public function __construct(
        SongRepository $repo,
        PlaylistRepository $playlistRepo,
        UserRepository $userRepo,
        YoutubeServiceInterface $youtubeService
    ) {
        $this->repo = $repo;
        $this->playlistRepo = $playlistRepo;
        $this->userRepo = $userRepo;
        $this->youtubeService = $youtubeService;
    }

    public function getAll(int $playlistId)
    {
        return $this->repo->findBy(['playlist_id' => $playlistId]);
    }

    public function getById(int $id): ?Song
    {
        return $this->repo->find($id);
    }

    /**
     * @param SongDataObject $data
     * @return Song|null
     */
    public function create(DataObject $data): ?Song
    {
        $song = new Song();
        $song->setPlaylistId($this->playlistRepo->find($data->playlist_id));
        $song->setYtUri($data->yt_uri);
        return $this->repo->save($song);
    }

    public function update(DataObject $data, int $songId): ?Song
    {
        $song = $this->repo->find($songId);
        $song->setYtUri($data->yt_uri);
        return $this->repo->save($song);
    }

    public function delete(int $songId): void
    {
        $song = $this->repo->find($songId);
        $this->repo->delete($song);
    }
}