<?php
session_start();

// 🔒 Vérifier si l'utilisateur est admin (ici simplifié)
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

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

// ✅ CREATE : ajout d'un produit
if (isset($_POST['add'])) {
    $name = $_POST['name'] ?? '';
    $price = $_POST['price'] ?? 0;
    $stock = $_POST['stock'] ?? 0;

    if ($name && $price >= 0 && $stock >= 0) {
        $stmt = $pdo->prepare("INSERT INTO products (name, price, stock) VALUES (?, ?, ?)");
        $stmt->execute([$name, $price, $stock]);
        header("Location: admin-produits.php");
        exit;
    }
}

// ✅ DELETE : suppression
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $stmt = $pdo->prepare("DELETE FROM products WHERE id = ?");
    $stmt->execute([$id]);
    header("Location: admin-produits.php");
    exit;
}

// ✅ UPDATE : modification
if (isset($_POST['update'])) {
    $id = (int)$_POST['id'];
    $name = $_POST['name'] ?? '';
    $price = $_POST['price'] ?? 0;
    $stock = $_POST['stock'] ?? 0;

    $stmt = $pdo->prepare("UPDATE products SET name = ?, price = ?, stock = ? WHERE id = ?");
    $stmt->execute([$name, $price, $stock, $id]);
    header("Location: admin-produits.php");
    exit;
}

// Récupération des produits pour affichage
$stmt = $pdo->query("SELECT * FROM products");
$produits = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Si modification en cours
$editProduct = null;
if (isset($_GET['edit'])) {
    $id = (int)$_GET['edit'];
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->execute([$id]);
    $editProduct = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin Produits</title>
    <style>
        table { border-collapse: collapse; width: 80%; margin: 20px auto; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f0f0f0; }
        form { width: 60%; margin: 20px auto; }
        input { padding: 5px; margin: 5px; }
        .btn { padding: 5px 10px; text-decoration: none; border: 1px solid #333; margin-right: 5px; }
        .btn-delete { color: red; border-color: red; }
        .btn-edit { color: blue; border-color: blue; }
    </style>
    <script>
        function confirmDelete(name, id) {
            if (confirm("Supprimer le produit : " + name + " ?")) {
                window.location.href = "?delete=" + id;
            }
        }
    </script>
</head>
<body>
    <h2 style="text-align:center;">Administration des produits</h2>

    <table>
        <tr>
            <th>Nom</th>
            <th>Prix</th>
            <th>Stock</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($produits as $produit): ?>
        <tr>
            <td><?= htmlspecialchars($produit['name']); ?></td>
            <td><?= number_format($produit['price'], 2, ',', ' '); ?> €</td>
            <td><?= (int)$produit['stock']; ?></td>
            <td>
                <a class="btn btn-edit" href="?edit=<?= $produit['id']; ?>">Modifier</a>
                <a class="btn btn-delete" href="javascript:confirmDelete('<?= addslashes($produit['name']); ?>', <?= $produit['id']; ?>)">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h3 style="text-align:center;"><?= $editProduct ? "Modifier le produit" : "Ajouter un produit" ?></h3>
    <form method="POST" action="">
        <input type="hidden" name="id" value="<?= $editProduct['id'] ?? '' ?>">
        <input type="text" name="name" placeholder="Nom" value="<?= $editProduct['name'] ?? '' ?>" required>
        <input type="number" step="0.01" name="price" placeholder="Prix" value="<?= $editProduct['price'] ?? '' ?>" required>
        <input type="number" name="stock" placeholder="Stock" value="<?= $editProduct['stock'] ?? '' ?>" required>
        <button type="submit" name="<?= $editProduct ? 'update' : 'add'; ?>"><?= $editProduct ? "Mettre à jour" : "Ajouter" ?></button>
        <?php if($editProduct): ?>
            <a href="admin-produits.php">Annuler</a>
        <?php endif; ?>
    </form>
</body>
</html>
