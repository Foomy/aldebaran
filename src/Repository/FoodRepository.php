<?php

namespace App\Repository;

use App\Entity\Food;
use Doctrine\DBAL\Connection;
use mysql_xdevapi\Exception;
use Symfony\Component\Uid\Uuid;

class FoodRepository
{
    private Connection $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function getAll()
    {
        $foods = [];
        $sql   = <<<SQL
            SELECT * FROM `food`;
        SQL;

        try {
            $result = $this->connection->fetchAllAssociative($sql);
        }
        catch (Exception $exception) {

        }

        if (! empty($result)) {
            foreach ($result as $item) {
                $food = new Food(Uuid::fromString($item['id']));
                $food->populate($item);

                $foods[] = $food;
            }
        }

        return $foods;
    }

    public function findById(Uuid $uuid)
    {
    }
}