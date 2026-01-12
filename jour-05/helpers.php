<?php

function formatPrice($amount, $currency = "€", $decimals = 2) {
    return number_format($amount, $decimals, ",", " ") . " " . $currency;
}

function isInStock($stock) {
    return $stock > 0;
}

function isOnSale($discount) {
    return $discount > 0;
}

function isNew($dateAdded) {
    $daysSince = (time() - strtotime($dateAdded)) / (60*60*24);
    return $daysSince < 30;
}

function canOrder($stock, $quantity) {
    return $stock >= $quantity;
}

function displayBadge($text, $color) {
    return "<span class=\"badge\" style=\"background:$color;color:white;padding:2px 6px;border-radius:3px;font-size:12px;\">$text</span>";
}

function displayPrice($price, $discount = 0) {
    if ($discount > 0) {
        $newPrice = $price * (1 - $discount / 100);
        return "<del>" . formatPrice($price) . "</del> <strong>" . formatPrice($newPrice) . "</strong>";
    }
    return "<strong>" . formatPrice($price) . "</strong>";
}

function displayStock($quantity) {
    if ($quantity === 0) {
        return "<span style='color:red;font-weight:bold'>RUPTURE</span>";
    } elseif ($quantity < 5) {
        return "<span style='color:orange;'>Derniers articles ($quantity)</span>";
    } else {
        return "<span style='color:green;'>En stock ($quantity)</span>";
    }
}

function calculateVAT($priceExclTax, $rate) {
    return $priceExclTax * $rate / 100;
}

function calculateIncludingTax($priceExclTax, $rate) {
    return $priceExclTax + calculateVAT($priceExclTax, $rate);
}

function calculateDiscount($price, $percentage) {
    return $price * (1 - $percentage/100);
}
