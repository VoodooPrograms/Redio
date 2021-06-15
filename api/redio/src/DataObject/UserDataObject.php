<?php

namespace App\DataObject;

use Symfony\Component\Validator\Constraints as Assert;
use App\Validator\Constraint\UniqueValueInEntity as UniqueValueInEntity;

class UserDataObject extends DataObject
{
    /**
     * @Assert\NotBlank
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email."
     * )
     * @UniqueValueInEntity(entityClass="App\Entity\User", field="email")
     */
    public ?string $email;

    /**
     * @Assert\NotBlank
     * @Assert\Length(
     *      min = 8,
     *      max = 16,
     *      minMessage = "Your password must be at least {{ limit }} characters long",
     *      maxMessage = "Your password cannot be longer than {{ limit }} characters"
     * )
     */
    public ?string $password;

    /**
     * @Assert\NotBlank
     * @Assert\Length(
     *      min = 4,
     *      max = 24,
     *      minMessage = "Your password must be at least {{ limit }} characters long",
     *      maxMessage = "Your password cannot be longer than {{ limit }} characters"
     * )
     * @UniqueValueInEntity(entityClass="App\Entity\User", field="nickname")
     */
    public ?string $nickname;
}