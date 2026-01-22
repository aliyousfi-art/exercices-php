<?php

function calculateIncludingTax(float $priceExcludingTax, float $vat = 20): float
{
    $taxAmount = ($vat / 100) * $priceExcludingTax;
    return $priceExcludingTax + $taxAmount;
}

function calculateDiscount(float $price, float $percentage): float
{
    $discountAmount = ($percentage / 100) * $price;
    return $price - $discountAmount;
}

function calculateTotal(array $cart): float
{
    $total = 0.0;
    foreach ($cart as $item) {
        $total += $item['price'] * $item['quantity'];
    }
    return $total;
}

function formatPrice(float $amount): string
{
    return '$' . number_format($amount, 2);
}

function formatDate(string $date): string
{
    $dateTime = new DateTime($date);
    return $dateTime->format('F j, Y');
}

function displayStockStatus(int $stock): string
{
    return $stock > 0 ? 'In Stock' : 'Out of Stock';
}

function displayBadges(array $product): bool
{
    return !empty($product['badges']);
}

function dump_and_die(mixed $var): void
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
    die();
}

?>