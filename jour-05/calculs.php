<?php

function calculateVAT($priceExclTax, $rate) {
    return $priceExclTax * $rate / 100;
}

function calculateIncludingTax($priceExclTax, $rate) {
    return $priceExclTax + calculateVAT($priceExclTax, $rate);
}

function calculateDiscount($price, $percentage) {
    return $price * (1 - $percentage / 100);
}

$priceHT = 100;
$vatRate = 20;
$discountPercent = 10;

$vatAmount = calculateVAT($priceHT, $vatRate);
$priceTTC = calculateIncludingTax($priceHT, $vatRate);
$priceAfterDiscount = calculateDiscount($priceTTC, $discountPercent);

echo "<h2>Calculs pour le produit</h2>";
echo "Prix HT : " . number_format($priceHT, 2) . " €<br>";
echo "TVA ({$vatRate}%) : " . number_format($vatAmount, 2) . " €<br>";
echo "Prix TTC : " . number_format($priceTTC, 2) . " €<br>";
echo "Remise ({$discountPercent}%) : -" . number_format($priceTTC - $priceAfterDiscount, 2) . " €<br>";
echo "<strong>Prix final : " . number_format($priceAfterDiscount, 2) . " €</strong>";
