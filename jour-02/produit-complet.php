<?php

$product = [
    "name" => "T-shirt Premium",
    "description" => "T-shirt en coton biologique, confortable et résistant.",
    "price" => 29.99,
    "images" => [
        "https://example.com/image1.jpg",
        "https://example.com/image2.jpg",
        "https://example.com/image3.jpg"
    ],
    "sizes" => ["S", "M", "L", "XL"],
    "reviews" => [
        [
            "author" => "Alice",
            "rating" => 5,
            "comment" => "Excellent produit, très bonne qualité."
        ],
        [
            "author" => "Marc",
            "rating" => 4,
            "comment" => "Confortable mais taille un peu petit."
        ]
    ]
];

// Affichage
echo "Deuxième image : " . $product["images"][1] . "<br>";
echo "Nombre de tailles disponibles : " . count($product["sizes"]) . "<br>";
echo "Note du premier avis : " . $product["reviews"][0]["rating"];
