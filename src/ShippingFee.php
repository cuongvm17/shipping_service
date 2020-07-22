<?php

namespace App;

use App\Logistic\ShippingFeeInterface;

class ShippingFee
{
    private $shippingFee;

    public function __construct(ShippingFeeInterface $shippingFee)
    {
        $this->shippingFee = $shippingFee;
    }

    public function getShippingFee()
    {
        return $this->shippingFee->operation();
    }
}