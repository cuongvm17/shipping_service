<?php

namespace App\Logistic;

interface TypeOfFeeInterface
{
    public function calculate(): int;
}