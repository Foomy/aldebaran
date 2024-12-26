<?php

namespace App\Controller;

use App\Repository\FoodRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class Food extends AbstractController
{
    #[Route('/food', name: 'food')]
    public function index(FoodRepository $foodRepository): Response
    {
        $foods = $foodRepository->findAll();

        return $this->render('food/index.html.twig', [
            'foods' => $foods,
        ]);
    }
}
