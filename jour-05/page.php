<?php
require_once "helpers.php";

$product = [
    "name" => "Sneakers",
    "price" => 120,
    "stock" => 3,
    "new" => true,
    "discount" => 10,
    "dateAdded" => date("Y-m-d", strtotime("-15 days"))
];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page Sneakers</title>
    <style>
        .badge { margin-right:5px; }
    </style>
</head>
<body>

<h1><?= $product["name"] ?></h1>

<?= $product["new"] && isNew($product["dateAdded"]) ? displayBadge("NEW", "green") : "" ?>
<?= $product["discount"] > 0 ? displayBadge("PROMO -{$product['discount']}%", "orange") : "" ?>

<p>Prix : <?= displayPrice($product["price"], $product["discount"]) ?></p>

<p><?= displayStock($product["stock"]) ?></p>

<p>
<?php

if (canOrder($product["stock"], 1)) {
    echo "<button>Ajouter au panier</button>";
} else {
    echo "<button disabled>Indisponible</button>";
}

?>
</p>

</body>
</html>
