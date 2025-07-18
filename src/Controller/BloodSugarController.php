<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class BloodSugarController extends AbstractController
{
    #[Route('/blood-sugar', name: 'blood-sugar')]
    public function index(): Response
    {
        return $this->render('blood_sugar/index.html.twig', [
            'controller_name' => 'BloodSugarController',
        ]);
    }
}
