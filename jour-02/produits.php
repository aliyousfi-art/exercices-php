<?php
// Création du tableau produit
$product = [
    "name" => "Casque Bluetooth",
    "description" => "Casque sans fil avec réduction de bruit",
    "price" => 120,
    "stock" => 15,
    "category" => "Audio",
    "brand" => "SoundMax"
];

// Ajout de la date du jour
$product["dateAdded"] = date("d/m/Y");

// Application d'une remise de 10 %
$product["price"] = $product["price"] * 0.9;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Fiche produit</title>
</head>
<body>
    <h1><?php echo $product["name"]; ?></h1>

    <p><strong>Description :</strong> <?php echo $product["description"]; ?></p>
    <p><strong>Prix :</strong> <?php echo $product["price"]; ?> €</p>
    <p><strong>Stock :</strong> <?php echo $product["stock"]; ?></p>
    <p><strong>Catégorie :</strong> <?php echo $product["category"]; ?></p>
    <p><strong>Marque :</strong> <?php echo $product["brand"]; ?></p>
    <p><strong>Date d’ajout :</strong> <?php echo $product["dateAdded"]; ?></p>
</body>
</html>
