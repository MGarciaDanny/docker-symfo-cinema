<?php

namespace App\DataFixtures;

use App\Entity\User;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
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
        foreach ($this->getHardData() as [$name, $firstname, $email, $password]) {
            $entity = new User();
            $entity
                ->setName($name)
                ->setFirstname($firstname)
                ->setEmail($email)
                ->setPassword(password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]))
                ->setCreatedAt(new DateTime());
            $manager->persist($entity);
        }
        $manager->flush();
    }

    private function getHardData(): array
    {
        return [
            ['Danny', 'Garcia', 'admin@lbi.fr', 'password', 'ROLE_USER'],
            ['God', 'Kratos', 'god@of.war', 'BOY', 'ROLE_ADMIN'],
        ];
    }
}
