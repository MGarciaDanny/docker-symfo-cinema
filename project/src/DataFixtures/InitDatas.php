<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;

class InitDatas extends Fixture
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function load(ObjectManager $manager)
    {
        $filepath = '/var/www/DATA/datas/test-cinemahd-datas.sql';
        $spl = new \Symfony\Component\Finder\SplFileInfo($filepath, $filepath, $filepath);
        $sql = $spl->getContents();

        $em = $this->entityManager;
        $stmt = $em->getConnection()->prepare($sql);
        $result = $stmt->executeQuery()->fetchAllAssociative();

        $manager->flush();
    }

    public function getOrder()
    {
        return 1;  // Order in which this fixture will be executed
    }
}
