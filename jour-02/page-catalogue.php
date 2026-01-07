<?php
$products = [
    ["name" => "Ordinateur Portable", "price" => 899, "stock" => 10],
    ["name" => "Smartphone", "price" => 499, "stock" => 25],
    ["name" => "Tablette", "price" => 299, "stock" => 15],
    ["name" => "Casque Audio", "price" => 79, "stock" => 50],
    ["name" => "Souris Gaming", "price" => 49, "stock" => 100],
    ["name" => "Clavier Mécanique", "price" => 120, "stock" => 30]
];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Catalogue Produits</title>
    <style>
        .produit { border: 1px solid #ccc; padding: 10px; margin: 10px; width: 200px; float: left; }
        .prix { color: green; font-weight: bold; }
        .stock { color: #555; }
    </style>
</head>
<body>

<h1>Catalogue de Produits</h1>

<div class="produit">
    <h2><?= $products[0]["name"] ?></h2>
    <p class="prix"><?= $products[0]["price"] ?> €</p>
    <p class="stock">Stock : <?= $products[0]["stock"] ?></p>
</div>

<div class="produit">
    <h2><?= $products[1]["name"] ?></h2>
    <p class="prix"><?= $products[1]["price"] ?> €</p>
    <p class="stock">Stock : <?= $products[1]["stock"] ?></p>
</div>

<div class="produit">
    <h2><?= $products[2]["name"] ?></h2>
    <p class="prix"><?= $products[2]["price"] ?> €</p>
    <p class="stock">Stock : <?= $products[2]["stock"] ?></p>
</div>

<div class="produit">
    <h2><?= $products[3]["name"] ?></h2>
    <p class="prix"><?= $products[3]["price"] ?> €</p>
    <p class="stock">Stock : <?= $products[3]["stock"] ?></p>
</div>

<div class="produit">
    <h2><?= $products[4]["name"] ?></h2>
    <p class="prix"><?= $products[4]["price"] ?> €</p>
    <p class="stock">Stock : <?= $products[4]["stock"] ?></p>
</div>

<div class="produit">
    <h2><?= $products[5]["name"] ?></h2>
    <p class="prix"><?= $products[5]["price"] ?> €</p>
    <p class="stock">Stock : <?= $products[5]["stock"] ?></p>
</div>

</body>
</html>
