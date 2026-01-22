<?php
$name = "ExoChatGPT";
$price = 19.99;
$stock = 150;
$onSale = true;

var_dump($name);
var_dump($price);
var_dump($stock);
var_dump($onSale);

$priceExcludingTax =100;
$vat = 20 / 100;
$quantity = 3;

$montantTTC = $priceExcludingTax * (1 + $vat) * $quantity;
$priceUnitaireTTC = $priceExcludingTax * (1 + $vat);
$totalVAT = $priceExcludingTax * $vat * $quantity;

echo "Montant TTC: " . $montantTTC . " EUR\n";
echo "Prix unitaire TTC: " . $priceUnitaireTTC . " EUR\n";
echo "Total TVA: " . $totalVAT . " EUR\n";

$brand = "Nike";
$model = "Air Max";

echo "Brand: " . $brand . "\n";
echo "Model: " . $model . "\n";
sprintf("Brand: %s, Model: %s\n", $brand, $model);

$groceries = ["Apples", "Bananas", "Carrots", "Dates"];
echo "First item: " . $groceries[0] . "<br>";
echo "Second item: " . $groceries[1] . "<br>";
echo "Third item: " . $groceries[2] . "<br>";
echo "Fourth item: " . $groceries[3] . "<br>";
count($groceries[3]); 
echo "Total items in groceries: " . count($groceries) . "<br>"; 

$groceries[]= "Eggplants";
echo "Added item: Eggplants<br>";
echo "Total items in groceries after addition: " . count($groceries) . "<br>";
unset($groceries[3]);
echo "Total items in groceries after removal: " . count($groceries) . "<br>";

var_dump($groceries);






?>