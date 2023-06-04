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

    public function __construct(
        private MovieRepository $movieRepo,
        private PeopleRepository $peopleRepo
    ) {
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
        foreach ($this->getHardData() as [$movie, $people, $role, $signifiance]) {
            // $movieRepository = new MovieRepository($manager);
            // $peopleRepository = new PeopleRepository($manager);
            $entity = new MovieHasPeople();
            $entity
                ->setMovie($movie)
                ->setPeople($people)
                ->setRole($role)
                ->setSignificance($signifiance);
            $manager->persist($entity);
        }
    }

    private function getHardData(): array
    {
        // $movies = $this->movieRepo->findAll();
        // $peoples = $this->peopleRepo->findAll();

        return [
            ['establishmentName1', '60 rue de belleville', 'a', '342'],
            ['establishmentName2', '65 rue de jaures', 'a', '543'],
            ['establishmentName3', '80 rue de stalingrad', 'a', '987']
        ];
    }
}
