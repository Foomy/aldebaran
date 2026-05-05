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
    private ?int $fiber = null;

    #[ORM\Column(nullable: true)]
    private ?int $carbohydrate = null;

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

    public function getFiber(): ?int
    {
        return $this->fiber;
    }

    public function setFiber(?int $fiber): static
    {
        $this->fiber = $fiber;

        return $this;
    }

    public function getCarbohydrate(): ?int
    {
        return $this->carbohydrate;
    }

    public function setCarbohydrate(?int $carbohydrate): static
    {
        $this->carbohydrate = $carbohydrate;

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
