<?php

namespace App\DataObject;

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
    public ?int $user_id;

    /**
     * @Assert\NotBlank
     */
    public ?string $image_uri;

    /**
     * @Assert\NotBlank
     */
    public ?array $tags;

}