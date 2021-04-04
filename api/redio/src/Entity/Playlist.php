<?php

namespace App\Entity;

use App\Repository\PlaylistRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=PlaylistRepository::class)
 */
class Playlist
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"index"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="playlists")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user_id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"index"})
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"index"})
     */
    private $image_uri;

    /**
     * @ORM\Column(type="json", nullable=true)
     * @Groups({"index"})
     */
    private $tags = [];

    /**
     * @ORM\OneToMany(targetEntity=PlaylistStats::class, mappedBy="playlist_id", orphanRemoval=true)
     */
    private $playlistStats;

    /**
     * @ORM\OneToMany(targetEntity=Song::class, mappedBy="playlist_id", orphanRemoval=true)
     */
    private $songs;

    public function __construct()
    {
        $this->playlistStats = new ArrayCollection();
        $this->songs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getUserId(): ?User
    {
        return $this->user_id;
    }

    public function setUserId(?User $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getImageUri(): ?string
    {
        return $this->image_uri;
    }

    public function setImageUri(?string $image_uri): self
    {
        $this->image_uri = $image_uri;

        return $this;
    }

    public function getTags(): ?array
    {
        return $this->tags;
    }

    public function setTags(?array $tags): self
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * @return Collection|PlaylistStats[]
     */
    public function getPlaylistStats(): Collection
    {
        return $this->playlistStats;
    }

    public function addPlaylistStat(PlaylistStats $playlistStat): self
    {
        if (!$this->playlistStats->contains($playlistStat)) {
            $this->playlistStats[] = $playlistStat;
            $playlistStat->setPlaylistId($this);
        }

        return $this;
    }

    public function removePlaylistStat(PlaylistStats $playlistStat): self
    {
        if ($this->playlistStats->removeElement($playlistStat)) {
            // set the owning side to null (unless already changed)
            if ($playlistStat->getPlaylistId() === $this) {
                $playlistStat->setPlaylistId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Song[]
     */
    public function getSongs(): Collection
    {
        return $this->songs;
    }

    public function addSong(Song $song): self
    {
        if (!$this->songs->contains($song)) {
            $this->songs[] = $song;
            $song->setPlaylistId($this);
        }

        return $this;
    }

    public function removeSong(Song $song): self
    {
        if ($this->songs->removeElement($song)) {
            // set the owning side to null (unless already changed)
            if ($song->getPlaylistId() === $this) {
                $song->setPlaylistId(null);
            }
        }

        return $this;
    }

}
