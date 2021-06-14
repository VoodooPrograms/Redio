<?php

namespace App\DataFixtures;

use App\Entity\Playlist;
use App\Entity\PlaylistStats;
use App\Entity\Song;
use App\Entity\SongData;
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
            $playlist->setImageUri('playlistphoto.png');
            $playlist->setTags(['jazz', 'blues', 'ztpai']);

            $manager->persist($playlist);

            $songs = $this->createSongs($playlist);
            $songsData = $this->createSongsData($songs);
            $playlistStats = $this->createPlaylistStats($playlist);

            foreach ($songs as $song) $manager->persist($song);
            foreach ($songsData as $songData) $manager->persist($songData);
            foreach ($playlistStats as $playlistStat) $manager->persist($playlistStat);
        }

        $manager->flush();
    }

    private function createSongs(Playlist $playlist): array
    {
        $songCollection = [];

        for($i = 1 ; $i <= 4; ++$i) {
            $song = new Song();

            $song->setPlaylistId($playlist);
            $song->setYtUri('iW1jxJ6ISks');
            $song->setFileUri(null);

            $songCollection[] = $song;
        }

        return $songCollection;
    }

    public function createSongsData(array $songs)
    {
        $songDataCollection = [];

        foreach($songs as $song) {
            $songData = new SongData();

            $songData->setSong($song);
            $songData->setTitle("I'm the Mountain");
            $songData->setAuthor('Stoned Jesus - Topic');
            $songData->setPoster('https://i.ytimg.com/vi/_k1y8pymrF4/sddefault.jpg');

            $songDataCollection[] = $songData;
        }

        return $songDataCollection;
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
