<?php
$nouveautes = [
    ["name" => "Tablette", "price" => 299],
    ["name" => "Casque Audio", "price" => 79]
];

$promos = [
    ["name" => "Souris Gaming", "price" => 49],
    ["name" => "Clavier Mécanique", "price" => 120]
];

$miseEnAvant = [...$nouveautes, ...$promos];

