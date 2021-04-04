<?php

namespace App\Service\UserService;

use App\DataObject\DataObject;
use App\DataObject\UserDataObject;
use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserService implements UserServiceInterface
{
    protected UserRepository $repo;
    private UserPasswordEncoderInterface $passwordEncoder;

    public function __construct(
        UserRepository $repo,
        UserPasswordEncoderInterface $passwordEncoder
    ) {
        $this->repo = $repo;
        $this->passwordEncoder = $passwordEncoder;
    }

    public function getById(int $id): ?User
    {
        return $this->repo->find($id);
    }

    /**
     * @param UserDataObject $data
     * @return User|null
     */
    public function create(DataObject $data): ?User
    {
        $user = new User();
        $user->setEmail($data->email);
        $user->setPassword($this->passwordEncoder->encodePassword($user, $data->password));
        return $this->repo->save($user);
    }

    /**
     * @param UserDataObject $data
     * @param int $userId
     * @return User|null
     */
    public function update(DataObject $data, int $userId): ?User
    {
        $user = $this->repo->find($userId);
        $user->setEmail($data->email);
        $user->setPassword($this->passwordEncoder->encodePassword($user, $data->password));
        return $this->repo->save($user);
    }
}