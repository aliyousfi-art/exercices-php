<?php
require_once __DIR__ . '/../app/helpers.php';

$product = [
    'name' => 'Sample',
    'price' => 100.00,
    'quantity' => 10,
    'stock' => 5,
    'badges' => ['New', 'Sale'],];

$cart = [
    ['price' => 100, 'quantity' => 2],
    ['price' => 50, 'quantity' => 1],
];

$total = calculateTotal($cart);

echo "Total panier : " . formatPrice($total);

dump_and_die($product);

?>

<h2><?= $product['name'] ?></h2>

<p>Prix TTC :
    <?= formatPrice(calculateIncludingTax($product['price'])) ?>
</p>

<p>Stock : <?= displayStockStatus($product['stock']) ?></p>

<?php if (displayBadges($product)) : ?>
    <span class="badge">Promo</span>
<?php endif; ?>