<?php


namespace App\Logistic;


interface ShippingFeeInterface
{
    public function operation(): int;
}