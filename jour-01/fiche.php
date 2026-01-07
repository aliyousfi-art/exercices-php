<?php
// Déclaration des variables produit
$name = "T-shirt Blanc";
$price = 29.99;
$stock = 12; // 0 si en rupture
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $name ?> - Boutique</title>
</head>
<body>
    <h1><?= $name ?></h1>
    <p>Prix : <?= $price ?> €</p>
    <span>
        <?= $stock > 0 ? "En stock" : "Rupture" ?>
    </span>
</body>
</html>