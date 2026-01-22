<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Recherche de produits</title>
    <style>
        form {
            margin-bottom: 20px;
        }
        input {
            padding: 5px;
            font-size: 14px;
        }
        ul {
            list-style: none;
            padding: 0;
        }
    </style>
</head>
<body>

<h1>Recherche de produits</h1>

<!-- Formulaire GET -->
<form method="GET" action="">
    <input type="text" name="search" placeholder="Rechercher un produit" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
    <input type="submit" value="Rechercher">
</form>

<?php
// Tableau de 10 produits
$produits = [
    "Ordinateur portable",
    "Souris sans fil",
    "Clavier mécanique",
    "Écran 24 pouces",
    "Imprimante laser",
    "Casque audio",
    "Webcam HD",
    "Disque dur externe",
    "Routeur wifi",
    "Tablette tactile"
];

// Vérifier si un terme de recherche est fourni
$search = $_GET['search'] ?? '';
$search = trim($search); // supprimer espaces inutiles

if ($search !== '') {
    $resultats = [];

    // Filtrer les produits
    foreach ($produits as $produit) {
        if (stripos($produit, $search) !== false) { // insensible à la casse
            $resultats[] = $produit;
        }
    }

    // Afficher les résultats
    if (!empty($resultats)) {
        echo "<ul>";
        foreach ($resultats as $item) {
            echo "<li>" . htmlspecialchars($item) . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Aucun résultat pour '<strong>" . htmlspecialchars($search) . "</strong>'</p>";
    }
} else {
    echo "<p>Entrez un mot-clé pour rechercher un produit.</p>";
}
?>

</body>
</html>
