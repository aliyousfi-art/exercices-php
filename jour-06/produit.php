<?php

$produit = [
    1 => "Ordinateur Portable - 999.99 EUR",
    2 => "Smartphone - 499.99 EUR",
    3 => "Tablette - 299.99 EUR",  
    4 => "Casque Audio - 89.99 EUR",
    5 => "Montre Connectée - 199.99 EUR"
];

// Récupérer l'ID depuis l'URL (GET)
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

// Vérifier si le produit existe
if (isset($products[$id])) {
    echo "<h1>Produit trouvé :</h1>";
    echo "<p>ID: $id</p>";
    echo "<p>Nom: " . htmlspecialchars($products[$id], ENT_QUOTES, 'UTF-8') . "</p>";
} else {
    echo "<h1>Produit non trouvé</h1>";
}