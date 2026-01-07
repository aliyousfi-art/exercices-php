<?php
$products = [
    ["name" => "Ordinateur", "price" => 899, "stock" => 10],
    ["name" => "Smartphone", "price" => 499, "stock" => 0],
    ["name" => "Tablette", "price" => 299, "stock" => 15]
];

$noms = array_map(fn($p) => $p['name'], $products);

$enStock = array_filter($products, fn($p) => $p['stock'] > 0);
