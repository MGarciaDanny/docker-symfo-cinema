<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class MovieFixtures extends Fixture
{
    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 1;
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
        foreach ($this->getHardData() as [$title, $duration]) {
            $entity = new Movie();
            $entity
                ->setTitle($title)
                ->setDuration($duration);
            $manager->persist($entity);
        }
        $manager->flush();
    }

    private function getHardData(): array
    {
        return [
            ['establishmentName1', '60 rue de belleville'],
            ['establishmentName2', '65 rue de jaures'],
            ['establishmentName3', '80 rue de stalingrad']
        ];
    }
}
