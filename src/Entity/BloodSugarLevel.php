<?php

namespace App\Entity;

use App\Repository\BloodSugarLevelRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BloodSugarLevelRepository::class)]
class BloodSugarLevel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $measurementTime = null;

    #[ORM\Column]
    private ?int $bloodSugarValue = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMeasurementTime(): ?\DateTimeInterface
    {
        return $this->measurementTime;
    }

    public function setMeasurementTime(\DateTimeInterface $measurementTime): static
    {
        $this->measurementTime = $measurementTime;

        return $this;
    }

    public function getBloodSugarValue(): ?int
    {
        return $this->bloodSugarValue;
    }

    public function setBloodSugarValue(int $bloodSugarValue): static
    {
        $this->bloodSugarValue = $bloodSugarValue;

        return $this;
    }
}
