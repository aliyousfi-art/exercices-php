<?php
$products = [
    ["name" => "Ordinateur portable", "price" => 799.99, "stock" => 5, "image" => "https://picsum.photos/id/180/300/200"],
    ["name" => "Clavier mécanique", "price" => 49.99, "stock" => 0, "image" => "https://picsum.photos/id/1060/300/200"],
    ["name" => "Souris sans fil", "price" => 25.50, "stock" => 12, "image" => "https://picsum.photos/id/1080/300/200"],
    ["name" => "Écran 24 pouces", "price" => 159.99, "stock" => 3, "image" => "https://picsum.photos/id/1040/300/200"],
    ["name" => "Casque audio", "price" => 79.95, "stock" => 0, "image" => "https://picsum.photos/id/1010/300/200"],
    ["name" => "Disque SSD 1To", "price" => 129.99, "stock" => 7, "image" => "https://picsum.photos/id/1025/300/200"],
    ["name" => "Webcam HD", "price" => 39.99, "stock" => 15, "image" => "https://picsum.photos/id/1035/300/200"],
    ["name" => "Haut-parleur Bluetooth", "price" => 59.90, "stock" => 4, "image" => "https://picsum.photos/id/1050/300/200"]
];

$compteur = count($products);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Catalogue</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .grille {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }
        .produit {
            border: 1px solid #ddd;
            padding: 15px;
            text-align: center;
        }
        .produit img {
            width: 100%;
            height: auto;
        }
        .en-stock {
            color: green;
            font-weight: bold;
        }
        .rupture {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>

<h1>Catalogue de produits</h1>
<p><strong><?= $compteur ?> produits affichés</strong></p>

<div class="grille">
    <?php foreach ($products as $product): ?>
        <div class="produit">
            <img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
            <h3><?= $product['name'] ?></h3>
            <p>Prix : <?= number_format($product['price'], 2, ',', ' ') ?> €</p>
            <p class="<?= $product['stock'] > 0 ? 'en-stock' : 'rupture' ?>">
                <?= $product['stock'] > 0 ? 'En stock' : 'Rupture' ?>
            </p>
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>

