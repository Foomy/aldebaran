<?php

namespace App\Controller;

use App\Entity\Food as FoodEntity;
use App\Form\FoodType;
use App\Repository\FoodRepository;
use App\Service\StringService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class Food extends AbstractController
{
    #[Route('/food', name: 'food')]
    public function index(FoodRepository $foodRepository, StringService $stringService): Response
    {
        $foods = $foodRepository->findAll();

        return $this->render('food/index.html.twig', [
            'foods' => $foods,
        ]);
    }

    #[Route('/food/add', name: 'food-add')]
    public function add(Request $request, FoodRepository $foodRepository, EntityManagerInterface $entityManager, TranslatorInterface $translator): Response
    {
        $form = $this->createForm(FoodType::class, new FoodEntity(), [
            'translator' => $translator,
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $food = $form->getData();

            $entityManager->persist($food);
            $entityManager->flush();

            $this->addFlash('success', $translator->trans('food.add.success.message'));
            return $this->redirectToRoute('food');
        }

        return $this->render('food/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
