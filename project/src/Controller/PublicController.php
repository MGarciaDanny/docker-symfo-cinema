<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PublicController extends AbstractController
{
    #[Route('/hello', name: 'app.hello')]
    public function hello(): Response
    {
        return $this->json([
            'Hello' => 'world'
        ]);
    }

    #[Route('/movie', name: 'app.get.movie')]
    public function movie(): Response
    {
        return $this->json(['movie'=>'todo']);
    }
}
