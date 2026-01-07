<?php
// Données du produit
$product = [
    "name" => "Casque Bluetooth",
    "description" => "Casque sans fil avec réduction de bruit active",
    "price_ht" => 99.90,
    "tva" => 0.20, // 20 %
    "stock" => 25
];

// Calcul du prix TTC
$price_ttc = $product["price_ht"] * (1 + $product["tva"]);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Fiche produit</title>
    <style>
        .product-card {
            width: 350px;
            border: 1px solid #ccc;
            padding: 20px;
            font-family: Arial, sans-serif;
            border-radius: 8px;
        }
        .price {
            font-size: 1.2em;
            font-weight: bold;
            color: #2c3e50;
        }
        .stock {
            color: <?= $product["stock"] > 0 ? "green" : "red" ?>;
        }
    </style>
</head>
<body>

<div class="product-card">
    <h1><?= $product["name"] ?></h1>

    <p><?= $product["description"] ?></p>

    <p>Prix HT : <?= number_format($product["price_ht"], 2) ?> €</p>
    <p>TVA : <?= $product["tva"] * 100 ?> %</p>

    <p class="price">
        Prix TTC : <?= number_format($price_ttc, 2) ?> €
    </p>

    <p class="stock">
        Stock : <?= $product["stock"] ?>
    </p>
</div>

</body>
</html>
