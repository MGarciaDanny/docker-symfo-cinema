<?php

namespace App\DataFixtures;

use App\Entity\Type;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TypeFixtures extends Fixture
{
    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 3;
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
        foreach ($this->getHardData() as [$name]) {
            $entity = new Type();
            $entity->setName($name);
            $manager->persist($entity);
        }
        $manager->flush();
    }

    private function getHardData(): array
    {
        return [
            ['establishmentName1'],
            ['establishmentName2'],
            ['establishmentName3']
        ];
    }

    // public function load(ObjectManager $manager): void
    // {
    //     $entity = new Type();
    //     $entity->setName('animation');
    //     $manager->persist($entity);
    //     $entity = new Type();
    //     $entity->setName('horreur');
    //     $manager->persist($entity);
    //     $entity = new Type();
    //     $entity->setName('drama');
    //     $manager->persist($entity);
    //     $entity = new Type();
    //     $entity->setName('thriller');
    //     $manager->persist($entity);
    //     $entity = new Type();
    //     $entity->setName('aventure');
    //     $manager->persist($entity);
    //     $entity = new Type();
    //     $entity->setName('guerre');
    //     $manager->persist($entity);
    //     $entity = new Type();
    //     $entity->setName('policier');
    //     $manager->persist($entity);
    //     $entity = new Type();
    //     $entity->setName('musical');
    //     $manager->persist($entity);
    //     $entity = new Type();
    //     $entity->setName('policier');
    //     $manager->persist($entity);
    //     $entity = new Type();
    //     $entity->setName('romantique');
    //     $manager->persist($entity);

    //     $manager->flush();
    // }
}
