<?php
$firstNames = ["Pierre", "Marie", "Luc", "Sophie", "Julien"];

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
