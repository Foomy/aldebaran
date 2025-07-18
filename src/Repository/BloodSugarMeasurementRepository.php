<?php

namespace App\Repository;

use App\Entity\AccessViolationException;
use App\Entity\BloodSugarMeasurement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Psr\Log\LoggerInterface;
use Symfony\Component\Uid\Uuid;

/**
 * @extends ServiceEntityRepository<BloodSugarMeasurement>
 */
class BloodSugarMeasurementRepository extends ServiceEntityRepository
{
    private EntityManagerInterface $manager;

    public function __construct(ManagerRegistry $registry, EntityManagerInterface $entityManager, LoggerInterface $logger)
    {
        parent::__construct($registry, BloodSugarMeasurement::class);
        $this->manager = $entityManager;
    }

    /**
     * @throws AccessViolationException
     */
    public function createEntity(): BloodSugarMeasurement
    {
        $entity = new BloodSugarMeasurement();
        $entity->setId(Uuid::v4());

        return $entity;
    }

    public function save(BloodSugarMeasurement $bloodSugarLevel): void
    {
        $this->manager->persist($bloodSugarLevel);
        $this->manager->flush();
    }
}
