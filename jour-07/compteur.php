<?php
session_start();

// Réinitialisation du compteur
if (isset($_GET['reset'])) {
    $_SESSION["visits"] = 0;
}

// Création ou incrémentation du compteur
if (!isset($_SESSION["visits"])) {
    $_SESSION["visits"] = 1;
} else {
    $_SESSION["visits"]++;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Compteur de visites</title>
</head>
<body>

<p>Vous avez visité cette page <?php echo $_SESSION["visits"]; ?> fois</p>

<a href="?reset=1">Réinitialiser</a>

</body>
</html>
