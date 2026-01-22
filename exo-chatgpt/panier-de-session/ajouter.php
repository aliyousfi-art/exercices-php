<?php
session_start();

// Si le panier n'existe pas encore, on le crée
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = [];
}

// On ajoute le produit au panier
$_SESSION['panier'][] = $_GET['produit'];

echo "Produit ajouté au panier !";
?>

<br><br>
<a href="produits.php">Retour aux produits</a>
