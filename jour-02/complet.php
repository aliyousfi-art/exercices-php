<?php
// Produit complet (tableau associatif complexe)
$product = [
    "name" => "Chaussures de sport",
    "description" => "Chaussures légères et confortables pour le sport",
    "price" => 89.99,
    "images" => [
        "https://example.com/image1.jpg",
        "https://example.com/image2.jpg",
        "https://example.com/image3.jpg"
    ],
    "sizes" => ["38", "39", "40", "41", "42"],
    "reviews" => [
        [
            "author" => "Alice",
            "rating" => 5,
            "comment" => "Très confortables et légères"
        ],
        [
            "author" => "Marc",
            "rating" => 4,
            "comment" => "Bon rapport qualité/prix"
        ]
    ]
];

// Affichages demandés
echo "Deuxième image : " . $product["images"][1] . "<br>";
echo "Nombre de tailles disponibles : " . count($product["sizes"]) . "<br>";
echo "Note du premier avis : " . $product["reviews"][0]["rating"];
