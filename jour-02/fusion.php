<?php
// Tableaux de produits
$clothes = ["T-shirt", "Jean", "Pull"];
$accessories = ["Ceinture", "Montre", "Lunettes"];

// Fusion des tableaux
$catalog = array_merge($clothes, $accessories);

// Affichage du nombre total de produits
echo "Nombre total de produits : " . count($catalog) . "<br>";

// Ajout d’un produit au début du tableau
array_unshift($catalog, "Veste");

// Affichage du catalogue
echo "<pre>";
print_r($catalog);
echo "</pre>";
