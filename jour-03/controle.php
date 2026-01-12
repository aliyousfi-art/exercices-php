<?php
$products = [
    ["name" => "Produit 1", "price" => 50, "stock" => 10],
    ["name" => "Produit 2", "price" => 120, "stock" => 5],
    ["name" => "Produit 3", "price" => 30, "stock" => 0],
    ["name" => "Produit 4", "price" => 80, "stock" => 20],
    ["name" => "Produit 5", "price" => 90, "stock" => 0],
    ["name" => "Produit 6", "price" => 25, "stock" => 15],
    ["name" => "Produit 7", "price" => 60, "stock" => 8],
    ["name" => "Produit 8", "price" => 40, "stock" => 0],
    ["name" => "Produit 9", "price" => 70, "stock" => 12],
    ["name" => "Produit 10", "price" => 110, "stock" => 7]
];

echo "<h3>Produits en stock et < 100€</h3>";
foreach ($products as $product) {

if ($product["stock"] == 0) {
        continue;
    }

    if ($product["price"] > 100) {
        break;
    }

    echo "<li><strong>{$product['name']}</strong> - Prix : {$product['price']}€ - Stock : {$product['stock']}</li>";
}
?>
