<?php

namespace App\Logistic\Impt;

use App\Logistic\TypeOfFeeInterface;

class FeeByWeightImpt implements TypeOfFeeInterface
{
    private $productWeight;
    private $weightCoefficient;
    private $feeByWeight;

    public function __construct(
        $productWeight,
        $weightCoefficient
    )
    {
        $this->productWeight = $productWeight;
        $this->weightCoefficient = $weightCoefficient;
    }

    public function calculate(): int
    {
        $this->feeByWeight = $this->productWeight * $this->weightCoefficient;

        return $this->feeByWeight;
    }
}