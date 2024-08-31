<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class Home extends AbstractController
{
    #[Route('/', name: 'home')]
    public function __invoke(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller' => __CLASS__,
            'action' => 'index',
        ]);
    }
}
