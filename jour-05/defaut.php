<?php

function formatPrice($amount, $currency = "€", $decimals = 2) {
    return number_format($amount, $decimals, '.', ' ') . " $currency";
}

// 🔹 Tests
echo formatPrice(99.999) . "<br>";           // "100.00 €"
echo formatPrice(99.999, "$") . "<br>";      // "100.00 $"
echo formatPrice(99.999, "€", 0) . "<br>";   // "100 €"
