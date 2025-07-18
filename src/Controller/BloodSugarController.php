<?php

namespace App\Controller;

use App\Entity\BloodSugarMeasurement;
use App\Form\BloodSugarType;
use App\Repository\BloodSugarMeasurementRepository;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Uid\Uuid;

final class BloodSugarController extends AbstractController
{
    #[Route('/blood-sugar', name: 'blood-sugar')]
    public function index(BloodSugarMeasurementRepository $bloodSugarMeasurementRepository): Response
    {
        $measurements = $bloodSugarMeasurementRepository->findAll();

        return $this->render('blood_sugar/index.html.twig', [
            'measurements' => $measurements,
        ]);
    }

    #[Route('/blood-sugar/add', name: 'blood-sugar-add')]
    public function addMeasurement(Request $request, BloodSugarMeasurementRepository $bloodSugarMeasurementRepository, LoggerInterface $logger): Response
    {
        try {
            $measurement = $bloodSugarMeasurementRepository->createEntity();
        } catch (\Exception $e) {
            $logger->error($e->getMessage());

            return $this->render('blood_sugar/index.html.twig', [
                'error'        => true,
                'errormessage' => $e->getMessage(),
            ]);
        }

        $now = new \DateTime('now');
        $now->setTimezone(new \DateTimeZone('Europe/Berlin'));
        $measurement->setMeasurementTime($now);

        $form = $this->createForm(BloodSugarType::class, $measurement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $measurement = $form->getData();
            $bloodSugarMeasurementRepository->save($measurement);

            return $this->redirectToRoute('blood-sugar');
        }

        return $this->render('blood_sugar/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/blood-sugar/edit/{id}', name: 'blood-sugar-edit')]
    public function editMeasurement(string $id, Request $request, BloodSugarMeasurementRepository $bloodSugarMeasurementRepository, LoggerInterface $logger): Response
    {
        $measurement = $bloodSugarMeasurementRepository->findOneBy(['id' => $id]);

        $form = $this->createForm(BloodSugarType::class, $measurement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $measurement = $form->getData();
            $bloodSugarMeasurementRepository->save($measurement);

            return $this->redirectToRoute('blood-sugar');
        }

        return $this->render('blood_sugar/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/blood-sugar/delete/{id}', name: 'blood-sugar-delete')]
    public function deleteMeasurement(string $id, Request $request, BloodSugarMeasurementRepository $bloodSugarMeasurementRepository)
    {
        if (! $request->isXmlHttpRequest()) {

        }
    }
}
