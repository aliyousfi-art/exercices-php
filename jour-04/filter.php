<?php

$products = [
    ['name' => 'Mouse', 'price' => 25, 'stock' => 10, 'category' => 'accessories'],
    ['name' => 'Keyboard', 'price' => 45, 'stock' => 5, 'category' => 'accessories'],
    ['name' => 'Headphones', 'price' => 80, 'stock' => 3, 'category' => 'audio'],
    ['name' => 'USB Cable', 'price' => 8, 'stock' => 0, 'category' => 'accessories'],
    ['name' => 'Webcam', 'price' => 49, 'stock' => 7, 'category' => 'video'],
    ['name' => 'Monitor', 'price' => 199, 'stock' => 2, 'category' => 'display'],
    ['name' => 'Speaker', 'price' => 35, 'stock' => 6, 'category' => 'audio'],
    ['name' => 'SSD 1TB', 'price' => 120, 'stock' => 4, 'category' => 'storage'],
    ['name' => 'Mouse Pad', 'price' => 12, 'stock' => 15, 'category' => 'accessories'],
    ['name' => 'Microphone', 'price' => 55, 'stock' => 1, 'category' => 'audio'],
];

$total = count($products);
$found = 0;

echo "<h3>Filtered products</h3>";

foreach ($products as $product) {

    if ($product['stock'] <= 0) {
        continue;
    }

    if ($product['price'] >= 50) {
        continue;
    }

    $found++;

    echo "<p>
        <strong>{$product['name']}</strong><br>
        Price: {$product['price']} €<br>
        Stock: {$product['stock']}<br>
        Category: {$product['category']}
    </p>";
}

echo "<hr>";
echo "<strong>$found produits trouvés sur $total</strong>";
