<?php

namespace App\DataObject;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

final class PlaylistDataObject extends DataObject
{
    /**
     * @Assert\NotBlank
     */
    public ?string $name;

    /**
     * @Assert\NotBlank
     */
    public ?UploadedFile $image_uri;

    /**
     * @Assert\NotBlank
     */
    public ?array $tags;

}