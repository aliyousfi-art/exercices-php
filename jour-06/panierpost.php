<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Panier</title>
    <style>
        form {
            display: flex;
            flex-direction: column;
            width: 300px;
            margin-bottom: 20px;
        }
        select, input {
            margin-bottom: 10px;
            padding: 5px;
            font-size: 14px;
        }
        .result {
            font-weight: bold;
        }
    </style>
</head>
<body>

<h1>Formulaire Panier</h1>

<?php
// Tableau des produits
$produits = [
    1 => ["nom" => "Ordinateur Portable", "prix" => 999.99],
    2 => ["nom" => "Smartphone", "prix" => 499.99],
    3 => ["nom" => "Tablette", "prix" => 299.99],
    4 => ["nom" => "Casque Audio", "prix" => 89.99],
    5 => ["nom" => "Montre Connectée", "prix" => 199.99]
];

// Initialiser les variables
$id = $quantite = 0;
$total = 0;
$message = "";

// Traitement POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Récupérer et sécuriser les données
    $id = isset($_POST['id']) ? (int) $_POST['id'] : 0;
    $quantite = isset($_POST['quantite']) ? (int) $_POST['quantite'] : 0;

    // Validation
    if (!isset($produits[$id])) {
        $message = "Produit invalide.";
    } elseif ($quantite <= 0) {
        $message = "Veuillez saisir une quantité valide.";
    } else {
        $nom = htmlspecialchars($produits[$id]['nom']);
        $prix = $produits[$id]['prix'];
        $total = $prix * $quantite;

        $message = "Produit : $nom<br>";
        $message .= "Prix unitaire : $prix €<br>";
        $message .= "Quantité : $quantite<br>";
        $message .= "Total : $total €";
    }
}
?>

<!-- Formulaire Panier -->
<form method="POST" action="">
    <label for="id">Produit :</label>
    <select name="id" id="id">
        <?php foreach ($produits as $key => $p): ?>
            <option value="<?= $key ?>" <?= ($key == $id) ? 'selected' : '' ?>>
                <?= htmlspecialchars($p['nom']) ?> - <?= $p['prix'] ?> €
            </option>
        <?php endforeach; ?>
    </select>

    <label for="quantite">Quantité :</label>
    <input type="number" name="quantite" id="quantite" min="1" value="<?= ($quantite > 0) ? $quantite : 1 ?>">

    <input type="submit" value="Calculer le total">
</form>

<?php
if ($message !== "") {
    echo "<div class='result'>$message</div>";
}
?>

</body>
</html>
