<?php
require_once __DIR__ . '/../app/data.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Catalogue</title>
</head>
<body>

<h1>Catalogue</h1>
<p><?= count($products) ?> produits affichés</p>

<div class="products-grid">
    <?php foreach ($products as $product): ?>
        <div class="product-card">
            <img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>">

            <h3><?= $product['name'] ?></h3>

            <p class="price">
                <?= number_format($product['price'], 2, ',', ' ') ?> €
            </p>

            <p class="<?= $product['stock'] > 0 ? 'in-stock' : 'out-of-stock' ?>">
                <?= $product['stock'] > 0 ? 'En stock' : 'Rupture' ?>
            </p>
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>

<?php
require_once __DIR__ . '/../app/data.php';

// 🔢 Calcul des stats
$inStock = 0;
$onSale = 0;
$outOfStock = 0;

foreach ($products as $p) {
    if ($p['stock'] > 0) $inStock++;
    else $outOfStock++;

    if ($p['discount'] > 0) $onSale++;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Catalogue</title>
    <link rel="stylesheet" href="css/styles.css"> 
    <style>
        .badge { display:inline-block; padding:2px 6px; font-size:12px; margin-right:5px; color:#fff; border-radius:3px; }
        .new { background: green; }
        .promo { background: orange; }
        .last { background: purple; }
        .rupture { color:red; font-weight:bold; }
        .product-card button:disabled { background:#ccc; cursor:not-allowed; }
    </style>
</head>
<body>

<h1>Catalogue</h1>

<div class="stats">
    <strong>In stock:</strong> <?= $inStock ?> |
    <strong>On sale:</strong> <?= $onSale ?> |
    <strong>Out of stock:</strong> <?= $outOfStock ?>
</div>

<div class="products-grid">
    <?php foreach ($products as $product): ?>
        <div class="product-card">

            <?php if ($product['new']): ?>
                <span class="badge new">NEW</span>
            <?php endif; ?>

            <?php if ($product['discount'] > 0): ?>
                <span class="badge promo">PROMO -<?= $product['discount'] ?>%</span>
            <?php endif; ?>

            <?php if ($product['stock'] < 5 && $product['stock'] > 0): ?>
                <span class="badge last">LAST ITEMS</span>
            <?php endif; ?>

            <h3><?= $product['name'] ?></h3>

            <?php if ($product['discount'] > 0): 
                $promoPrice = $product['price'] * (1 - $product['discount']/100);
            ?>
                <p>
                    <del><?= number_format($product['price'], 2) ?> €</del>
                    <strong><?= number_format($promoPrice, 2) ?> €</strong>
                </p>
            <?php else: ?>
                <p><strong><?= number_format($product['price'], 2) ?> €</strong></p>
            <?php endif; ?>

            <?php if ($product['stock'] === 0): ?>
                <p class="rupture">RUPTURE</p>
            <?php else: ?>
                <p>Stock: <?= $product['stock'] ?></p>
            <?php endif; ?>

            <button <?= $product['stock'] === 0 ? 'disabled' : '' ?>>Ajouter au panier</button>

        </div>
    <?php endforeach; ?>
</div>

</body>
</html>
