<?php

namespace App\Entity;

use App\Repository\SongRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=SongRepository::class)
 */
class Song
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"index"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Playlist::class, inversedBy="songs")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"index"})
     */
    private $playlist_id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"index"})
     */
    private $yt_uri;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $file_uri;

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

    public function getYtUri(): ?string
    {
        return $this->yt_uri;
    }

    public function setYtUri(string $yt_uri): self
    {
        $this->yt_uri = $yt_uri;

        return $this;
    }

    public function getFileUri(): ?string
    {
        return $this->file_uri;
    }

    public function setFileUri(?string $file_uri): self
    {
        $this->file_uri = $file_uri;

        return $this;
    }
}
