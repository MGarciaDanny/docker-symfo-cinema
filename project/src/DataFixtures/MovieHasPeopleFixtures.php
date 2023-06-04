<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use App\Entity\MovieHasPeople;
use App\Repository\MovieRepository;
use App\Repository\PeopleRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\ORM\EntityManager;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Persistence\ManagerRegistry;

class MovieHasPeopleFixtures extends Fixture
{
    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 4;
    }

    public function load(ObjectManager $manager)
    {
        $this->loadData($manager);
    }

    /**
     * @param ObjectManager $manager
     * @throws BadMethodCallException
     */
    private function loadData(ObjectManager $manager)
    {
        foreach ($this->getHardData() as [$movie, $people, $signifiance]) {
            // $movieRepository = new MovieRepository($manager);
            // $peopleRepository = new PeopleRepository($manager);
            $entity = new MovieHasPeople();
            $entity
                ->setMovie($movie)
                ->setpeople($people)
                ->setpeople($signifiance);
            $manager->persist($entity);
        }
    }

    private function getHardData(): array
    {
        return [
            // $clubData = [$establishmentName, $address, $code, $user, $games];
            ['establishmentName1', '60 rue de belleville', '342'],
            ['establishmentName2', '65 rue de jaures', '543'],
            ['establishmentName3', '80 rue de stalingrad', '987']
        ];
    }
}
