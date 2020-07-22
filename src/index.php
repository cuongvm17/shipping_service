<?php

namespace App;

use App\Logistic\Impt\FeeByDimensionImpt;
use App\Logistic\Impt\FeeByWeightAndDimensionImpt;
use App\Logistic\Impt\FeeByWeightImpt;
use Dotenv\Dotenv;
require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__, '../.env');
$dotenv->load();

$weightCoefficient = (int) $_ENV['WEIGHT_COEFFICIENT'];
$dimensionCoefficient = (int) $_ENV['DIMENSION_COEFFICIENT'];

$item = [
    'amazonPrice' => 100,
    'productWeight' => 3,
    'productWidth' => 4,
    'productHeight' => 5,
    'productDepth' => 4,
];

$feeByWeight = new FeeByWeightImpt($item['productWeight'], $weightCoefficient);
$feeByDimension = new FeeByDimensionImpt($item['productWidth'], $item['productHeight'], $item['productDepth'], $dimensionCoefficient);
$feeByWeightAndDimension = new FeeByWeightAndDimensionImpt($feeByWeight, $feeByDimension);
$shippingFee = new ShippingFee($feeByWeightAndDimension);
$itemPrice = $item['amazonPrice'] + $shippingFee->getShippingFee();

echo "Item price: " . $itemPrice . PHP_EOL;