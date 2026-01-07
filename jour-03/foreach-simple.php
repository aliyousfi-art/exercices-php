<?php
// 1️⃣ Créer un tableau de 5 prénoms
$firstNames = ["Pierre", "Marie", "Luc", "Sophie", "Julien"];

// 2️⃣ Initialiser le compteur
$i = 1;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Foreach Simple</title>
</head>
<body>

<h1>Liste de prénoms</h1>
<ul>
    <?php foreach ($firstNames as $name): ?>
        <li><?= $i . '. ' . $name ?></li>
        <?php $i++; // incrémenter le compteur ?>
    <?php endforeach; ?>
</ul>

</body>
</html>
