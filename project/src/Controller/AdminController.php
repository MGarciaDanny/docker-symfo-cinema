<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PrivateController extends AbstractController
{
    #[Route('/api/admin/movie', name: 'app.admin.movie')]
    public function movie(): Response
    {
        return $this->json(['EDIT'=>'YES']);
    }
}
