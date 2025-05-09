<?php

namespace App\DataFixtures;

use App\Entity\Genre;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class GenreFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $genres = ['Ménage', 'Bricolage'];
        foreach($genres as $i => $libelle) {
            $genre = new Genre();
            $genre->setLibelle($libelle);
            $manager->persist($genre);

            // on préserve la reference vers le genre
            $this->addReference('genre_' . $i, $genre);
        }

        $manager->flush();
    }
}
