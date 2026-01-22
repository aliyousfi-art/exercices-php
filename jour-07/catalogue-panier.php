<?php
session_start();

// Connexion PDO à la BDD
$host = "localhost";
$dbname = "boutique";
$user = "root"; // ou "dev"
$pass = "";     // ou "dev"

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8",
        $user,
        $pass,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    die(" Erreur : " . $e->getMessage());
}

// Gestion du panier

// Ajouter un produit au panier
if (isset($_POST['add_to_cart'])) {
    $productId = (int)$_POST['product_id'];
    if (!isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId] = ['quantity' => 0];
    }
    $_SESSION['cart'][$productId]['quantity']++;
}

// Modifier la quantité
if (isset($_POST['update_cart'])) {
    foreach ($_POST['quantite'] as $id => $qte) {
        $id = (int)$id;
        $qte = (int)$qte;
        if ($qte <= 0) {
            unset($_SESSION['cart'][$id]);
        } else {
            $_SESSION['cart'][$id]['quantity'] = $qte;
        }
    }
}

// Supprimer un produit
if (isset($_GET['remove'])) {
    $id = (int)$_GET['remove'];
    unset($_SESSION['cart'][$id]);
}

// Vider le panier
if (isset($_GET['clear'])) {
    $_SESSION['cart'] = [];
}
// Récupérer les produits depuis la BDD
$stmt = $pdo->query("SELECT * FROM products");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Récupérer les produits du panier
$cartIds = array_keys($_SESSION['cart'] ?? []);
$cartProducts = [];

if (!empty($cartIds)) {
    $placeholders = str_repeat('?,', count($cartIds) - 1) . '?';
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id IN ($placeholders)");
    $stmt->execute($cartIds);
    $cartProducts = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Catalogue & Panier</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        .products, .cart { margin-bottom: 30px; }
        table { border-collapse: collapse; width: 80%; margin-bottom: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f0f0f0; }
        form { display: inline; }
    </style>
</head>
<body>

<h1>Catalogue</h1>
<div class="products">
    <table>
        <tr>
            <th>Produit</th>
            <th>Prix</th>
            <th>Ajouter au panier</th>
        </tr>
        <?php foreach ($products as $p): ?>
        <tr>
            <td><?= htmlspecialchars($p['name']) ?></td>
            <td><?= number_format($p['price'], 2, ',', ' ') ?> €</td>
            <td>
                <form method="POST" action="">
                    <input type="hidden" name="product_id" value="<?= $p['id'] ?>">
                    <button type="submit" name="add_to_cart">Ajouter</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>

<h2>Panier (<?= array_sum(array_column($_SESSION['cart'] ?? [], 'quantity')) ?> articles)</h2>
<div class="cart">
    <?php if (!empty($cartProducts)): ?>
        <form method="POST" action="">
            <table>
                <tr>
                    <th>Produit</th>
                    <th>Prix unitaire</th>
                    <th>Quantité</th>
                    <th>Sous-total</th>
                    <th>Supprimer</th>
                </tr>
                <?php 
                $total = 0;
                foreach ($cartProducts as $p):
                    $qty = $_SESSION['cart'][$p['id']]['quantity'];
                    $subtotal = $p['price'] * $qty;
                    $total += $subtotal;
                ?>
                <tr>
                    <td><?= htmlspecialchars($p['name']) ?></td>
                    <td><?= number_format($p['price'],2,',',' ') ?> €</td>
                    <td>
                        <input type="number" name="quantite[<?= $p['id'] ?>]" value="<?= $qty ?>" min="0">
                    </td>
                    <td><?= number_format($subtotal,2,',',' ') ?> €</td>
                    <td>
                        <a href="?remove=<?= $p['id'] ?>">Supprimer</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="3" style="text-align:right"><strong>Total :</strong></td>
                    <td colspan="2"><?= number_format($total,2,',',' ') ?> €</td>
                </tr>
            </table>
            <button type="submit" name="update_cart">Mettre à jour le panier</button>
            <a href="?clear=1">Vider le panier</a>
        </form>
    <?php else: ?>
        <p>Votre panier est vide.</p>
    <?php endif; ?>
</div>

</body>
</html>

