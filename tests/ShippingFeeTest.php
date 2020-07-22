<?php

namespace Tests;

use App\Logistic\Impt\FeeByDimensionImpt;
use App\Logistic\Impt\FeeByWeightAndDimensionImpt;
use App\Logistic\Impt\FeeByWeightImpt;
use App\ShippingFee;
use PHPUnit\Framework\TestCase;

class ShippingFeeTest extends TestCase
{
    public function testShippingFeeOfOneItem()
    {
        $weightCoefficient = 11;
        $dimensionCoefficient = 11;

        $item = [
            'amazonPrice' => 100,
            'productWeight' => 3,
            'productWidth' => 4,
            'productHeight' => 5,
            'productDepth' => 4,
        ];
        $expectedResult = 980;

        $feeByWeight = new FeeByWeightImpt($item['productWeight'], $weightCoefficient);
        $feeByDimension = new FeeByDimensionImpt($item['productWidth'], $item['productHeight'], $item['productDepth'], $dimensionCoefficient);
        $feeByWeightAndDimension = new FeeByWeightAndDimensionImpt($feeByWeight, $feeByDimension);
        $shippingFee = new ShippingFee($feeByWeightAndDimension);
        $itemPrice = $item['amazonPrice'] + $shippingFee->getShippingFee();

        $this->assertEquals($expectedResult, $itemPrice);
    }
}