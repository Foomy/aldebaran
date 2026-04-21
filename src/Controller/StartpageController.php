<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class StartpageController extends AbstractController
{
    #[Route('/', name: 'startpage')]
    public function index(): Response
    {
        return $this->render('startpage/index.html.twig', [
        ]);
    }
}
