<?php

class Category {
    public string $name;

    public function __construct(string $name) {
        $this->name = $name;
    }
}

class Product {
    public string $name;
    public float $price;
    public Category $category;

    public function __construct(string $name, float $price, Category $category) {
        $this->name = $name;
        $this->price = $price;
        $this->category = $category;
    }

    public function display(): void {
        echo "Produit : {$this->name} | Prix : {$this->price}€ | Catégorie : {$this->category->name}<br>";
    }
}

// Création des catégories
$category1 = new Category("Informatique");
$category2 = new Category("Électroménager");
$category3 = new Category("Livres");

// Création des produits
$products = [
    new Product("Ordinateur portable", 1200, $category1),
    new Product("Clavier", 50, $category1),
    new Product("Réfrigérateur", 800, $category2),
    new Product("Roman", 20, $category3),
    new Product("Livre de programmation", 45, $category3),
];

// Affichage des produits avec leur catégorie
foreach ($products as $product) {
    $product->display();
}
