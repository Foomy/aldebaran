<?php

namespace App\Controller;

use App\Repository\BloodSugarLevelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class BloodSugarController extends AbstractController
{
    #[Route('/blood-sugar', name: 'blood-sugar')]
    public function index(BloodSugarLevelRepository $bloodSugarLevelRepository): Response
    {
        $measurements = $bloodSugarLevelRepository->findAll();

        return $this->render('blood_sugar/index.html.twig', [
            'measurements' => $measurements,
        ]);
    }

    public function addMeasurement(BloodSugarLevelRepository $bloodSugarLevelRepository): Response
    {
        return $this->render('blood_sugar/index.html.twig', [
        ]);
    }
}
