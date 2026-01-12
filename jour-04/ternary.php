<?php

$product = [
    'name'   => 'Wireless Headphones',
    'price'  => 120,
    'stock'  => 0,
    'onSale' => true
];

$promoPrice = $product['price'] * 0.8;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ternary operator</title>
    <style>
        .disponible { color: green; }
        .rupture { color: red; }
        .old-price { text-decoration: line-through; color: #999; }
        .promo { color: orange; font-weight: bold; }
    </style>
</head>
<body>

<div class="<?= $product['stock'] > 0 ? 'disponible' : 'rupture' ?>">
    <h2><?= $product['name'] ?></h2>

    <?= $product['onSale'] ? '<p class="promo">🔥 PROMO</p>' : '' ?>

    <p>
        <?= $product['onSale']
            ? '<span class="old-price">' . number_format($product['price'], 2) . ' €</span> ' .
              '<strong>' . number_format($promoPrice, 2) . ' €</strong>'
            : '<strong>' . number_format($product['price'], 2) . ' €</strong>'
        ?>
    </p>

    <p>
        <?= $product['stock'] > 0 ? 'In stock' : 'Out of stock' ?>
    </p>
</div>

</body>
</html>
