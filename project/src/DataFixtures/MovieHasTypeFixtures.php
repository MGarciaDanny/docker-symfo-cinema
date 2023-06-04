<?php

namespace App\DataFixtures;

use App\Entity\MovieHasType;
use App\Repository\MovieRepository;
use App\Repository\TypeRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MovieHasTypeFixtures extends Fixture
{
    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 5;
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

        foreach ($this->getHardData() as [$movie, $type]) {
            // $movieRepository = new MovieRepository($manager);
            // $typeRepository = new TypeRepository($manager);
            $entity = new MovieHasType();
            $entity
                ->setMovie($movie)
                ->setType($type);
            $manager->persist($entity);
        }
    }

    private function getHardData(): array
    {
        return [
            [342, 342],
            [543, 543],
            [987, 987]
        ];
    }
}
