<?php
declare(strict_types=1);

function calculerTTC(float $prixHT, float $tva): float {
    return $prixHT * (1 + $tva / 100);
}

// Exemple d'utilisation
echo calculerTTC(100, 20);  // 120
// echo calculerTTC("100", 20); // TypeError avec strict_types
