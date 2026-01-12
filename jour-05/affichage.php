<?php

function displayBadge($text, $color) {
    return "<span class=\"badge\" style=\"background: $color; color: white; padding: 2px 6px; border-radius: 3px; font-size:12px;\">$text</span>";
}

function displayPrice($price, $discount = 0) {
    if ($discount > 0) {
        $newPrice = $price * (1 - $discount / 100);
        return "<del>" . number_format($price, 2) . " €</del> <strong>" . number_format($newPrice, 2) . " €</strong>";
    }
    return "<strong>" . number_format($price, 2) . " €</strong>";
}

function displayStock($quantity) {
    if ($quantity === 0) {
        return "<span style='color:red; font-weight:bold'>RUPTURE</span>";
    } elseif ($quantity < 5) {
        return "<span style='color:orange;'>Derniers articles ($quantity)</span>";
    } else {
        return "<span style='color:green;'>En stock ($quantity)</span>";
    }
}

$products = [
    ["name" => "T-shirt", "price" => 29.99, "stock" => 3, "new" => true, "discount" => 0],
    ["name" => "Jean", "price" => 89.99, "stock" => 0, "new" => false, "discount" => 20],
    ["name" => "Sneakers", "price" => 120, "stock" => 8, "new" => true, "discount" => 10],
];

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Affichage avec fonctions</title>
    <style>
        .product { border:1px solid #ddd; padding:10px; margin-bottom:10px; width:300px; }
        .badge { margin-right:5px; }
    </style>
</head>
<body>

<h1>Catalogue avec fonctions d'affichage</h1>

<?php foreach ($products as $p): ?>
    <div class="product">
        <h3><?= $p["name"] ?></h3>

        <?= $p["new"] ? displayBadge("NEW", "green") : "" ?>
        <?= $p["discount"] > 0 ? displayBadge("PROMO -{$p['discount']}%", "orange") : "" ?>

        <p>Prix : <?= displayPrice($p["price"], $p["discount"]) ?></p>
        <p><?= displayStock($p["stock"]) ?></p>
    </div>
<?php endforeach; ?>

</body>
</html>
