<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    public const REDIO_USER = 'redio-user';

    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('redio@redio.com');
        $user->setPassword($this->passwordEncoder->encodePassword($user, 'testowe123'));

        $manager->persist($user);
        $manager->flush();

        $this->addReference(self::REDIO_USER, $user);
    }
}
