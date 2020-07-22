<?php

namespace App\Logistic\Impt;

use App\Helper\MaxHelper;
use App\Logistic\ShippingFeeInterface;
use App\Logistic\TypeOfFeeInterface;

class FeeByWeightDimensionProducTypeDecorator extends DecoratorShippingFeeImpt
{
    private $feeByProductType;

    public function __construct(ShippingFeeInterface $shippingFee, TypeOfFeeInterface $feeByProductType)
    {
        parent::__construct($shippingFee);
        $this->feeByProductType = $feeByProductType;
    }

    public function operation(): int
    {
        return MaxHelper::maxMethodInArray(array(parent::operation(), $this->feeByProductType), "calculate");
    }
}