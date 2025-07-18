<?php

namespace App\Entity;

use App\Repository\FoodRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FoodRepository::class)]
class Food
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $nutritionValue = null;

    #[ORM\Column(nullable: true)]
    private ?int $protein = null;

    #[ORM\Column(nullable: true)]
    private ?int $fat = null;

    #[ORM\Column(nullable: true)]
    private ?int $roughage = null;

    #[ORM\Column(nullable: true)]
    private ?int $carbonhydrate = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getNutritionValue(): ?int
    {
        return $this->nutritionValue;
    }

    public function setNutritionValue(int $nutritionValue): static
    {
        $this->nutritionValue = $nutritionValue;

        return $this;
    }

    public function getProtein(): ?int
    {
        return $this->protein;
    }

    public function setProtein(?int $protein): static
    {
        $this->protein = $protein;

        return $this;
    }

    public function getFat(): ?int
    {
        return $this->fat;
    }

    public function setFat(?int $fat): static
    {
        $this->fat = $fat;

        return $this;
    }

    public function getRoughage(): ?int
    {
        return $this->roughage;
    }

    public function setRoughage(?int $roughage): static
    {
        $this->roughage = $roughage;

        return $this;
    }

    public function getCarbonhydrate(): ?int
    {
        return $this->carbonhydrate;
    }

    public function setCarbonhydrate(?int $carbonhydrate): static
    {
        $this->carbonhydrate = $carbonhydrate;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }
}
