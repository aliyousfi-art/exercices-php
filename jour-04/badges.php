<?php

$products = [
    [
        "name" => "T-shirt",
        "price" => 29.99,
        "stock" => 3,
        "new" => true,
        "discount" => 0
    ],
    [
        "name" => "Jean",
        "price" => 89.99,
        "stock" => 0,
        "new" => false,
        "discount" => 20
    ],
    [
        "name" => "Sneakers",
        "price" => 120,
        "stock" => 8,
        "new" => true,
        "discount" => 10
    ],
    [
        "name" => "Jacket",
        "price" => 149.99,
        "stock" => 2,
        "new" => false,
        "discount" => 0
    ],
    [
        "name" => "Cap",
        "price" => 19.99,
        "stock" => 0,
        "new" => false,
        "discount" => 0
    ],
    [
        "name" => "Hoodie",
        "price" => 59.99,
        "stock" => 6,
        "new" => true,
        "discount" => 15
    ],
    [
        "name" => "Socks",
        "price" => 9.99,
        "stock" => 20,
        "new" => false,
        "discount" => 0
    ],
    [
        "name" => "Belt",
        "price" => 24.99,
        "stock" => 1,
        "new" => false,
        "discount" => 0
    ],
];

$inStock = 0;
$onSale = 0;
$outOfStock = 0;

foreach ($products as $product) {
    if ($product["stock"] > 0) {
        $inStock++;
    } else {
        $outOfStock++;
    }

    if ($product["discount"] > 0) {
        $onSale++;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Catalogue with badges</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .stats { margin-bottom: 20px; }
        .grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }
        .product {
            border: 1px solid #ddd;
            padding: 15px;
            position: relative;
        }
        .badge {
            display: inline-block;
            padding: 4px 8px;
            font-size: 12px;
            margin-right: 5px;
        }
        .new { background: green; color: white; }
        .promo { background: orange; color: white; }
        .last { background: purple; color: white; }
        .rupture { color: red; font-weight: bold; }
        button:disabled {
            background: #ccc;
            cursor: not-allowed;
        }
    </style>
</head>
<body>

<h1>Catalogue</h1>

<div class="stats">
    <strong>In stock:</strong> <?= $inStock ?> |
    <strong>On sale:</strong> <?= $onSale ?> |
    <strong>Out of stock:</strong> <?= $outOfStock ?>
</div>

<div class="grid">
    <?php foreach ($products as $product): ?>
        <div class="product">

            <?php if ($product["new"]): ?>
                <span class="badge new">NEW</span>
            <?php endif; ?>

            <?php if ($product["discount"] > 0): ?>
                <span class="badge promo">
                    PROMO -<?= $product["discount"] ?>%
                </span>
            <?php endif; ?>

            <?php if ($product["stock"] < 5 && $product["stock"] > 0): ?>
                <span class="badge last">LAST ITEMS</span>
            <?php endif; ?>

            <h3><?= $product["name"] ?></h3>

            <?php if ($product["discount"] > 0): 
                $newPrice = $product["price"] * (1 - $product["discount"] / 100);
            ?>
                <p>
                    <del><?= number_format($product["price"], 2) ?> €</del>
                    <strong><?= number_format($newPrice, 2) ?> €</strong>
                </p>
            <?php else: ?>
                <p><strong><?= number_format($product["price"], 2) ?> €</strong></p>
            <?php endif; ?>

            <?php if ($product["stock"] === 0): ?>
                <p class="rupture">RUPTURE</p>
            <?php else: ?>
                <p>Stock: <?= $product["stock"] ?></p>
            <?php endif; ?>

            <button <?= $product["stock"] === 0 ? 'disabled' : '' ?>>
                Add to cart
            </button>

        </div>
    <?php endforeach; ?>
</div>

</body>
</html>
