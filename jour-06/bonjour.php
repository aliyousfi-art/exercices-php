<?php
// Vérifier si le paramètre 'name' existe dans l'URL
if (isset($_GET['name']) && !empty($_GET['name'])) {
    $name = htmlspecialchars($_GET['name']); // protège contre XSS
} else {
    $name = "visiteur"; // valeur par défaut si absent
}

// Afficher le message
echo "Bonjour $name !";

// ouvrir navigauteur bonjour.php?name=Marie
?>

