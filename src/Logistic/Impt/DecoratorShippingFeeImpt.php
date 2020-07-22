<?php

namespace App\Logistic\Impt;

use App\Logistic\ShippingFeeInterface;

class DecoratorShippingFeeImpt implements ShippingFeeInterface
{
    private $shippingFee;

    public function __construct(ShippingFeeInterface $shippingFee)
    {
        $this->shippingFee = $shippingFee;
    }

    public function operation(): int
    {
        return $this->shippingFee->operation();
    }
}