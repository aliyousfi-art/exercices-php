<?php
$products = [];

for ($i = 1; $i <= 10; $i++) {
    $products[] = [
        "name" => "Produit $i",
        "price" => rand(10, 100),  // prix aléatoire entre 10 et 100
        "stock" => rand(0, 50)     // stock aléatoire entre 0 et 50
    ];
}

echo "<h3>Affichage avec var_dump()</h3>";
echo "<pre>";
var_dump($products);
echo "</pre>";

echo "<h3>Affichage en HTML</h3>";
echo "<ul>";
foreach ($products as $product) {
    echo "<li><strong>{$product['name']}</strong> - Prix : {$product['price']}€ - Stock : {$product['stock']}</li>";
}
echo "</ul>";
?>
