<?php

namespace App\DataFixtures;

use App\Entity\Genre;
use App\Entity\Task;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class TaskFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {

        $task = new Task();
        $task->setName("tache 1");
        $task->setDescription("desc 1");
        $task->setCreatedAt(new \DateTimeImmutable);
        $task->addGenre($this->getReference('genre_0', Genre::class));

        $manager->persist($task);

        $task = new Task();
        $task->setName("tache 2");
        $task->setDescription("desc 2");
        $task->setCreatedAt(new \DateTimeImmutable);
        $task->addGenre($this->getReference('genre_0', Genre::class));
        $task->addGenre($this->getReference('genre_1', Genre::class));

        $manager->persist($task);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [GenreFixtures::class];
    }
}
