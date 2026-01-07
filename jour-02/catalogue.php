<?php

$products = [
    ["name" => "Ordinateur", "price" => 900, "stock" => 15],
    ["name" => "Smartphone", "price" => 500, "stock" => 30],
    ["name" => "Tablette", "price" => 300, "stock" => 20],
    ["name" => "Casque", "price" => 80, "stock" => 50],
    ["name" => "Souris", "price" => 30, "stock" => 100],
];

// Affichages demandés
echo "Nom du 3ème produit : " . $products[2]["name"] . "<br>";
echo "Prix du 1er produit : " . $products[0]["price"] . " €<br>";
echo "Stock du dernier produit : " . $products[4]["stock"] . "<br>";

// Modification du stock du 2ème produit
$products[1]["stock"] += 10;

echo "Nouveau stock du 2ème produit : " . $products[1]["stock"];
