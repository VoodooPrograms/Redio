<?php

namespace App\Entity;

use App\Repository\PlaylistStatsRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass=PlaylistStatsRepository::class)
 */
class PlaylistStats
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Playlist::class, inversedBy="playlistStats")
     * @ORM\JoinColumn(nullable=false)
     */
    private $playlist_id;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    /**
     * @ORM\Column(type="integer")
     */
    private $viewers;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getPlaylistId(): ?Playlist
    {
        return $this->playlist_id;
    }

    public function setPlaylistId(?Playlist $playlist_id): self
    {
        $this->playlist_id = $playlist_id;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getViewers(): ?int
    {
        return $this->viewers;
    }

    public function setViewers(int $viewers): self
    {
        $this->viewers = $viewers;

        return $this;
    }
}
