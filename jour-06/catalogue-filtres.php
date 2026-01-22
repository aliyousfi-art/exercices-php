<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Catalogue filtrable</title>
    <style>
        form {
            display: flex;
            flex-direction: column;
            width: 300px;
            margin-bottom: 20px;
        }
        input, select {
            margin-bottom: 10px;
            padding: 5px;
            font-size: 14px;
        }
        table {
            border-collapse: collapse;
            width: 80%;
        }
        th, td {
            border: 1px solid #333;
            padding: 8px;
        }
    </style>
</head>
<body>

<h1>Catalogue filtrable</h1>

<?php
// Tableau de 15 produits
$produits = [
    ["name"=>"Ordinateur portable", "price"=>1200, "category"=>"Informatique", "inStock"=>true],
    ["name"=>"Souris sans fil", "price"=>25, "category"=>"Informatique", "inStock"=>true],
    ["name"=>"Clavier mécanique", "price"=>80, "category"=>"Informatique", "inStock"=>false],
    ["name"=>"Écran 24 pouces", "price"=>150, "category"=>"Informatique", "inStock"=>true],
    ["name"=>"Imprimante laser", "price"=>200, "category"=>"Informatique", "inStock"=>false],
    ["name"=>"Casque audio", "price"=>60, "category"=>"Audio", "inStock"=>true],
    ["name"=>"Enceinte Bluetooth", "price"=>120, "category"=>"Audio", "inStock"=>true],
    ["name"=>"Webcam HD", "price"=>70, "category"=>"Informatique", "inStock"=>true],
    ["name"=>"Disque dur externe", "price"=>100, "category"=>"Informatique", "inStock"=>true],
    ["name"=>"Routeur wifi", "price"=>90, "category"=>"Informatique", "inStock"=>false],
    ["name"=>"Tablette tactile", "price"=>300, "category"=>"Tablette", "inStock"=>true],
    ["name"=>"Smartphone", "price"=>800, "category"=>"Mobile", "inStock"=>true],
    ["name"=>"Chargeur rapide", "price"=>25, "category"=>"Mobile", "inStock"=>true],
    ["name"=>"Batterie externe", "price"=>40, "category"=>"Mobile", "inStock"=>false],
    ["name"=>"Microphone USB", "price"=>110, "category"=>"Audio", "inStock"=>true],
];

// Récupération des filtres GET
$search = htmlspecialchars($_GET['search'] ?? '');
$category = $_GET['category'] ?? '';
$maxPrice = $_GET['maxPrice'] ?? '';
$inStockOnly = isset($_GET['inStock']) ? true : false;

// Liste unique des catégories pour le select
$categories = array_unique(array_column($produits, 'category'));
sort($categories);
?>

<!-- Formulaire de filtres -->
<form method="GET" action="">
    <label>Nom :</label>
    <input type="text" name="search" value="<?= $search ?>">

    <label>Catégorie :</label>
    <select name="category">
        <option value="">Toutes</option>
        <?php foreach($categories as $cat): ?>
            <option value="<?= $cat ?>" <?= $category === $cat ? 'selected' : '' ?>><?= $cat ?></option>
        <?php endforeach; ?>
    </select>

    <label>Prix max :</label>
    <input type="number" name="maxPrice" min="0" value="<?= htmlspecialchars($maxPrice) ?>">

    <label>
        <input type="checkbox" name="inStock" <?= $inStockOnly ? 'checked' : '' ?>>
        En stock uniquement
    </label>

    <input type="submit" value="Filtrer">
</form>

<?php
// Filtrer les produits
$filtered = [];
foreach ($produits as $produit) {
    // Filtre nom
    if ($search !== '' && stripos($produit['name'], $search) === false) {
        continue;
    }

    // Filtre catégorie
    if ($category !== '' && $produit['category'] !== $category) {
        continue;
    }

    // Filtre prix max
    if ($maxPrice !== '' && $produit['price'] > (float)$maxPrice) {
        continue;
    }

    // Filtre en stock
    if ($inStockOnly && !$produit['inStock']) {
        continue;
    }

    $filtered[] = $produit;
}

// Affichage des résultats
if (!empty($filtered)) {
    echo "<table>";
    echo "<tr><th>Nom</th><th>Catégorie</th><th>Prix</th><th>Stock</th></tr>";
    foreach ($filtered as $p) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($p['name']) . "</td>";
        echo "<td>" . htmlspecialchars($p['category']) . "</td>";
        echo "<td>" . $p['price'] . "€</td>";
        echo "<td>" . ($p['inStock'] ? 'Oui' : 'Non') . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>Aucun produit trouvé.</p>";
}
?>

</body>
</html>
