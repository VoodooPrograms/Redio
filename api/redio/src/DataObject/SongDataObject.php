<?php

namespace App\DataObject;

use Symfony\Component\Validator\Constraints as Assert;

final class SongDataObject extends DataObject
{
    /**
     * @Assert\NotBlank
     */
    public ?int $playlist_id;

    /**
     * @Assert\NotBlank
     */
    public ?string $yt_uri;
}