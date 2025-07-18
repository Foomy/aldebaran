<?php

namespace App\Entity;

use App\Repository\BloodSugarMeasurementRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BloodSugarMeasurementRepository::class)]
class BloodSugarMeasurement
{
    const SET_ID_ALLOWED_FUNCTION = 'createEntity';
    const SET_ID_ALLOWED_CLASS    = 'App\Repository\BloodSugarMeasurementRepository';

    #[ORM\Id]
    #[ORM\Column]
    private string $id;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $measurementTime = null;

    #[ORM\Column]
    private ?int $bloodSugarValue = null;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        if (!$this->invocationValid(debug_backtrace())) {
            throw new AccessViolationException();
        }

        $this->id = $id;
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

    private function invocationValid(array $debug_backtrace): bool
    {
        $invokingFunction = $debug_backtrace[1]['function'];
        $invokingClass    = $debug_backtrace[1]['class'];

        return (self::SET_ID_ALLOWED_CLASS === $invokingClass
            || self::SET_ID_ALLOWED_FUNCTION === $invokingFunction);
    }
}
