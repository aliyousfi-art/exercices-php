<?php

$stock = 10;                
$active = true;             
$promoEndDate = "2024-12-31"; 

$today = date("Y-m-d");

$isAvailable = ($stock > 0 && $active === true);

$isOnSale = ($today < $promoEndDate);

echo "<h3>Product status</h3>";

if ($isAvailable) {
    echo "Available<br>";
} else {
    echo "Unavailable<br>";
}

if ($isOnSale) {
    echo "On sale<br>";
} else {
    echo "No promotion<br>";
}

echo "<hr>";
echo "Stock: $stock<br>";
echo "Active: " . ($active ? "true" : "false") . "<br>";
echo "Promo end date: $promoEndDate<br>";
echo "Today: $today<br>";
