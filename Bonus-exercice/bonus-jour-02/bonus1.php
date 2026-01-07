<?php
$produits = [
    ["name" => "Ordinateur", "price" => 899, "stock" => 10],
    ["name" => "Smartphone", "price" => 499, "stock" => 25],
    ["name" => "Tablette", "price" => 299, "stock" => 15]
];

// Tri par prix croissant
usort($produits, function($a, $b) {
    return $a['price'] <=> $b['price'];
});

// Tri par nom alphabétique
usort($produits, function($a, $b) {
    return $a['name'] <=> $b['name'];
});

// Tri par stock décroissant
usort($produits, function($a, $b) {
    return $b['stock'] <=> $a['stock'];
});
