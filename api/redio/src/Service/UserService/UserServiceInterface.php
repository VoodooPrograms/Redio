<?php

namespace App\Service\UserService;

use App\DataObject\DataObject;
use App\Entity\User;

interface UserServiceInterface
{
    public function getById(int $id): ?User;

    public function create(DataObject $data): ?User;

    public function update(DataObject $data, int $userId): ?User;
}