<?php

namespace App\Logistic\Impt;

use App\Logistic\TypeOfFeeInterface;

class FeeByDimensionImpt implements TypeOfFeeInterface
{
    private $width;
    private $depth;
    private $height;
    private $dimensionCoefficient;
    private $feeByDimension;

    public function __construct(
        $width,
        $height,
        $depth,
        $dimensionCoefficient
    )
    {
        $this->width = $width;
        $this->height = $height;
        $this->depth = $depth;
        $this->dimensionCoefficient = $dimensionCoefficient;
    }

    public function calculate(): int
    {
        $this->feeByDimension = $this->width * $this->height * $this->depth * $this->dimensionCoefficient;

        return $this->feeByDimension;
    }
}