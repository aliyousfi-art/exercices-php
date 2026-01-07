<?php
// Déclaration des variables
$brand = "Nike";
$model = "Air Max";

// 1️⃣ Avec concaténation
echo "Chaussures " . $brand . " " . $model . "<br>";

// 2️⃣ Avec interpolation
echo "Chaussures $brand $model<br>";

// 3️⃣ Avec sprintf()
echo sprintf("Chaussures %s %s<br>", $brand, $model);

// Test avec guillemets doubles et simples
$price = 99.99;

echo "Prix : $price €<br>"; // => Affiche la valeur de $price : Prix : 99.99 €
echo 'Prix : $price €<br>'; // => Affiche littéralement : Prix : $price €