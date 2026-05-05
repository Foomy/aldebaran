<?php

namespace App\Controller;

use App\Repository\FoodRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class FoodController extends AbstractController
{
    #[Route('/foods', name: 'foods')]
    public function index(FoodRepository $foodRepository): Response
    {
        $foods = $foodRepository->findAll();

        return $this->render('food/index.html.twig', [
            'controllerMethod' => __METHOD__,
            'foods' => $foods,
        ]);
    }
}
