<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{

    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setEmail('yonni4@gmail.com');
        $user->setPassword($this->passwordHasher->hashPassword($user, 'adminpass'));
        $user->setNom('Yonni');
        $user->setRoles(['ROLE_ADMIN']);

        $manager->persist($user);
        $manager->flush();
    }
}
