<?php

namespace App\Logistic\Impt;

use App\Helper\MaxHelper;
use App\Logistic\ShippingFeeInterface;
use App\Logistic\TypeOfFeeInterface;

class FeeByWeightAndDimensionImpt implements ShippingFeeInterface
{
    private $typeOfFees;

    public function __construct(TypeOfFeeInterface ...$typeOfFees)
    {
        $this->typeOfFees = $typeOfFees;
    }

    public function operation(): int
    {
        return MaxHelper::maxMethodInArray($this->typeOfFees, "calculate");
    }
}