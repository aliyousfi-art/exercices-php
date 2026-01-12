<?php
echo "<h3>Nombres de 1 à 10</h3>";
for ($i = 1; $i <= 10; $i++) {
    echo "$i<br>";
}

echo "<h3>Nombres pairs de 2 à 20</h3>";
for ($i = 2; $i <= 20; $i += 2) {
    echo "$i<br>";
}

echo "<h3>Compte à rebours de 10 à 0</h3>";
for ($i = 10; $i >= 0; $i--) {
    echo "$i<br>";
}

echo "<h3>Table de multiplication de 7</h3>";
for ($i = 1; $i <= 10; $i++) {
    $resultat = 7 * $i;
    echo "7 x $i = $resultat<br>";
}
?>
