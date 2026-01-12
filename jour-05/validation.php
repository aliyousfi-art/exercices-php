<?php

function isInStock($stock): bool {
    return $stock > 0;
}

function isOnSale($discount): bool {
    return $discount > 0;
}

function isNew($dateAdded): bool {
    $daysSince = (time() - strtotime($dateAdded)) / (60 * 60 * 24);
    return $daysSince < 30;
}

function canOrder($stock, $quantity): bool {
    return $stock >= $quantity;
}

echo "<h2>Tests des fonctions</h2>";

echo "isInStock(5) → " . (isInStock(5) ? 'true' : 'false') . "<br>";
echo "isInStock(0) → " . (isInStock(0) ? 'true' : 'false') . "<br>";

echo "isOnSale(10) → " . (isOnSale(10) ? 'true' : 'false') . "<br>";
echo "isOnSale(0) → " . (isOnSale(0) ? 'true' : 'false') . "<br>";

$dateRecent = date("Y-m-d", strtotime("-10 days"));
$dateOld = date("Y-m-d", strtotime("-40 days"));
echo "isNew($dateRecent) → " . (isNew($dateRecent) ? 'true' : 'false') . "<br>";
echo "isNew($dateOld) → " . (isNew($dateOld) ? 'true' : 'false') . "<br>";

echo "canOrder(5, 3) → " . (canOrder(5, 3) ? 'true' : 'false') . "<br>";
echo "canOrder(2, 3) → " . (canOrder(2, 3) ? 'true' : 'false') . "<br>";
