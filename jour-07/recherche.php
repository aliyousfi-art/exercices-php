<?php
// Connexion PDO
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
} catch (PDOException $e) {
    die("❌ Erreur : " . $e->getMessage());
}

// Initialisation
$produits = [];
$search = $_GET['search'] ?? '';

if (!empty($search)) {
    // Requête préparée avec LIKE
    $stmt = $pdo->prepare("SELECT * FROM products WHERE name LIKE ?");
    $stmt->execute(['%' . $search . '%']);
    $produits = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Recherche de produits</title>
    <style>
        table { border-collapse: collapse; width: 60%; margin: 20px auto; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f0f0f0; }
        form { text-align: center; margin-top: 20px; }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Recherche de produits</h2>
    <form method="GET" action="">
        <input type="text" name="search" placeholder="Nom du produit" value="<?= htmlspecialchars($search) ?>">
        <button type="submit">Rechercher</button>
    </form>

    <?php if (!empty($search)): ?>
        <?php if (count($produits) > 0): ?>
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
        <?php else: ?>
            <p style="text-align:center; color:red;">Aucun produit trouvé</p>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>
