<?php

namespace App\DataFixtures;

use App\Entity\Playlist;
use App\Entity\PlaylistStats;
use App\Entity\Song;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PlaylistFixtures extends Fixture implements DependentFixtureInterface
{
    private ?User $playlistOwner;

    public function load(ObjectManager $manager)
    {
        $this->playlistOwner = $this->getReference(UserFixtures::REDIO_USER);

        for($i = 1 ; $i <= 10; ++$i) {
            $playlist = new Playlist();

            $playlist->setName('Europe #' . $i);
            $playlist->setUserId($this->playlistOwner);
            $playlist->setImageUri("not_a_valid_path{$i}.jpg");
            $playlist->setTags(['jazz', 'blues', 'ztpai']);

            $manager->persist($playlist);

            $songs = $this->createSongs($playlist);
            $playlistStats = $this->createPlaylistStats($playlist);

            foreach ($songs as $song) $manager->persist($song);
            foreach ($playlistStats as $playlistStat) $manager->persist($playlistStat);
        }

        $manager->flush();
    }

    private function createSongs(Playlist $playlist): array
    {
        $songCollection = [];

        for($i = 1 ; $i <= random_int(1, 6); ++$i) {
            $song = new Song();

            $song->setPlaylistId($playlist);
            $song->setYtUri('https://www.youtube.com/watch?v=SLxf1ZhlqOQ'); //TODO: Consider to save only video-id
            $song->setFileUri(null);

            $songCollection[] = $song;
        }

        return $songCollection;
    }

    private function createPlaylistStats(Playlist $playlist): array
    {
        $playlistStatsCollection = [];

        for($i = 1 ; $i <= 3; ++$i) {
            $playlistStats = new PlaylistStats();

            $playlistStats->setPlaylistId($playlist);
            $playlistStats->setViewers(random_int(0, 10));

            $playlistStatsCollection[] = $playlistStats;
        }

        return $playlistStatsCollection;
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
        ];
    }
}
