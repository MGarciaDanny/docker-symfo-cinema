<?php

namespace App\DataFixtures;

use App\Entity\People;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class PeopleFixtures extends Fixture
{
    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 2;
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
        foreach ($this->getHardData() as [$firstname, $lastname, $dateofbirth, $nationality]) {
            $entity = new People();
            $entity
                ->setFirstname($firstname)
                ->setLastname($lastname)
                ->setDateOfBirth($dateofbirth)
                ->setNationality($nationality);
            $manager->persist($entity);
        }
        $manager->flush();
    }

    private function getHardData(): array
    {
        return [
            ['establishmentName1', '60 rue de belleville', 342, 'aa'],
            ['establishmentName2', '65 rue de jaures', 543, 'aa'],
            ['establishmentName3', '80 rue de stalingrad', 987, 'aa']
        ];
    }
}
