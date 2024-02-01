<?php

namespace App\Entity;

use JetBrains\PhpStorm\ArrayShape;
use Symfony\Component\Uid\Uuid;

class Food
{
    private Uuid $id;
    private string $name;
    private string $description;
    private int $nutritionValue;
    private int $protein;
    private int $fat;
    private int $carbohydrate;
    private int $roughage;

    public function __construct(Uuid $id)
    {
        $this->id = $id;
    }

    public static function create(): self
    {
        return new self(Uuid::v4());
    }

    public function populate(array $data): void
    {
        $this->name           = empty($data['name']) ?: $data['name'];
        $this->description    = empty($data['description']) ? '' : $data['description'];
        $this->nutritionValue = empty($data['nutrition_value']) ?: $data['nutrition_value'];
        $this->protein        = empty($data['protein']) ?: $data['protein'];
        $this->fat            = empty($data['fat']) ?: $data['fat'];
        $this->carbohydrate   = empty($data['carbohydrate']) ?: $data['carbohydrate'];
        $this->roughage       = empty($data['roughage']) ?: $data['roughage'];
    }

    public function getId(): Uuid
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getNutritionValue(): int
    {
        return $this->nutritionValue;
    }

    public function setNutritionValue(int $nutritionValue): void
    {
        $this->nutritionValue = $nutritionValue;
    }

    public function getProtein(): int
    {
        return $this->protein;
    }

    public function setProtein(int $protein): void
    {
        $this->protein = $protein;
    }

    public function getFat(): int
    {
        return $this->fat;
    }

    public function setFat(int $fat): void
    {
        $this->fat = $fat;
    }

    public function getCarbohydrate(): int
    {
        return $this->carbohydrate;
    }

    public function setCarbohydrate(int $carbohydrate): void
    {
        $this->carbohydrate = $carbohydrate;
    }

    public function getRoughage(): int
    {
        return $this->roughage;
    }

    public function setRoughage(int $roughage): void
    {
        $this->roughage = $roughage;
    }

    public function toArray(): array
    {
        return [
            'name'           => $this->name,
            'description'    => $this->description,
            'nutritionValue' => $this->nutritionValue,
            'protein'        => $this->protein,
            'fat'            => $this->fat,
            'carbohydrate'   => $this->carbohydrate,
            'roughage'       => $this->roughage,
        ];
    }
}