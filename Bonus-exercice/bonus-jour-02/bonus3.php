<?php
$data = ['name' => 'Jean', 'price' => 79.99];

// Destructuring pour un tableau associatif
['name' => $n, 'price' => $p] = $data;

// Vérification
echo $n; // Jean
echo $p; // 79.99
