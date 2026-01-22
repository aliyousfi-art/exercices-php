<?php

require_once 'Product.php';

// Création de 5 objets Product
$product1 = new Product(1, "Laptop", "Ordinateur portable 16GB RAM", 1200.00, 10, "Informatique");
$product2 = new Product(2, "Smartphone", "Téléphone Android 128GB", 800.00, 25, "Téléphonie");
$product3 = new Product(3, "Casque Audio", "Casque Bluetooth Noise Cancelling", 150.00, 50, "Audio");
$product4 = new Product(4, "Clavier", "Clavier mécanique RGB", 90.00, 30, "Informatique");
$product5 = new Product(5, "Sac à dos", "Sac à dos pour ordinateur portable", 60.00, 40, "Accessoires");

// Stockage dans un tableau
$catalogue = [$product1, $product2, $product3, $product4, $product5];

// Initialisation des totaux
$totalStock = 0;
$totalValue = 0.0;

// Parcours et affichage
foreach ($catalogue as $product) {
    echo "Produit : " . $product->getNom() . PHP_EOL;
    echo "Description : " . $product->getDescription() . PHP_EOL;
    echo "Prix : " . $product->getPrix() . " €" . PHP_EOL;
    echo "Stock : " . $product->getStock() . PHP_EOL;
    echo "Catégorie : " . $product->getCategorie() . PHP_EOL;
    echo "Prix TTC (20%) : " . $product->getPriceIncludingTax() . " €" . PHP_EOL;
    echo "--------------------------" . PHP_EOL;

    $totalStock += $product->getStock();
    $totalValue += $product->getPrix() * $product->getStock();
}

// Affichage des totaux
echo "Stock total : $totalStock" . PHP_EOL;
echo "Valeur totale du catalogue : " . number_format($totalValue, 2) . " €" . PHP_EOL;
