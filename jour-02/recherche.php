<?php
// Tableau des catégories
$categories = ["Vêtements", "Chaussures", "Accessoires", "Sport"];

// Vérification de "Chaussures"
if (in_array("Chaussures", $categories)) {
    echo "Chaussures : Trouvé !<br>";
} else {
    echo "Chaussures : Non trouvé<br>";
}

// Vérification de "Électronique"
if (in_array("Électronique", $categories)) {
    echo "Électronique : Trouvé !<br>";
} else {
    echo "Électronique : Non trouvé<br>";
}

// Recherche de l'index de "Sport"
$indexSport = array_search("Sport", $categories);

if ($indexSport !== false) {
    echo "L'index de Sport est : " . $indexSport;
} else {
    echo "Sport n'a pas été trouvé";
}
