<?php

namespace App\Entity;

class AccessViolationException extends \Exception
{
    private const ALLOWED_CLASS = 'App\Repository\BloodSugarMeasurementRepository::createEntity';

    public function __construct()
    {
        parent::__construct('Invocation of SetId only allowed by: ' . self::ALLOWED_CLASS, 500, null);
    }
}