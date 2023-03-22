<?php

namespace App\Controller;

use App\Repository\FoodRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListFood extends AbstractController
{
    #[Route('/food', name: 'food')]
    public function __invoke(FoodRepository $foodRepository): Response
    {
        $foods            = $foodRepository->getAll();

        $listHeadlines    = $this->extractListHeadlines($foods);
        $tooltipHeadlines = $this->extractTooltipHeadlines($foods);

        return $this->render('food/index.html.twig', [
            'controller_name'  => 'FoodController',
            'foods'            => $foods,
            'listHeadlines'    => $listHeadlines,
            'tooltipHeadlines' => $tooltipHeadlines,
        ]);
    }

    private function extractListHeadlines(array $foods): array
    {
        $food      = current($foods);
        $headlines = array_keys($food->toArray());

        return array_splice($headlines, 0, 3);
    }

    private function extractTooltipHeadlines(array $foods): array
    {
        $food      = current($foods);
        $headlines = array_keys($food->toArray());

        return array_splice($headlines, 3, count($headlines) - 1);
    }
}
