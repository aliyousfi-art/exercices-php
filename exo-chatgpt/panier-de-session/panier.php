<?php
session_start();
?>

<h1>Mon panier</h1>

<?php
if (empty($_SESSION['panier'])) {
    echo "Le panier est vide";
} else {
    foreach ($_SESSION['panier'] as $produit) {
        echo $produit . "<br>";
    }
}
?>

<br>
<a href="produits.php">Retour aux produits</a>
