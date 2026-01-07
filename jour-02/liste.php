<?php

// Création du tableau avec 5 articles
$groceries = [
    "Pommes",
    "Bananes",
    "Lait",
    "Pain",
    "Fromage"
];

// Afficher le premier article
echo "Premier article : " . $groceries[0] . "<br>";

// Afficher le dernier article (avec count)
$lastIndex = count($groceries) - 1;
echo "Dernier article : " . $groceries[$lastIndex] . "<br>";

// Afficher le nombre total d'articles
echo "Nombre total d'articles : " . count($groceries) . "<br>";

// Ajouter 2 articles à la fin
$groceries[] = "Oeufs";
$groceries[] = "Riz";

// Supprimer le 3ème article (index 2)
unset($groceries[2]);

// Réindexer le tableau (optionnel mais propre)
$groceries = array_values($groceries);

// Afficher le tableau final
var_dump($groceries);
