<?php
// Connexion PDO (à adapter selon ton BDD)
$host = "localhost";
$dbname = "boutique";
$user = "root";   // ou "dev"
$pass = "";       // ou "dev"

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8",
        $user,
        $pass,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );

    // Requête SELECT
    $stmt = $pdo->query("SELECT * FROM products");

    // Récupérer tous les résultats
    $produits = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("❌ Erreur : " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des produits</title>
    <style>
        table { border-collapse: collapse; width: 60%; margin: 20px auto; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f0f0f0; }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Produits en stock</h2>
    <table>
        <tr>
            <th>Nom</th>
            <th>Prix</th>
            <th>Stock</th>
        </tr>
        <?php foreach ($produits as $produit): ?>
        <tr>
            <td><?= htmlspecialchars($produit['name']); ?></td>
            <td><?= number_format($produit['price'], 2, ',', ' '); ?> €</td>
            <td><?= (int)$produit['stock']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
