<?php


namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class BasicTest extends KernelTestCase
{
    public function testEnvironnementIsOk(): void
    {
        $this->assertTrue(true);
    }
}
