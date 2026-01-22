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
}

class CartItem {
    public Product $product;
    public int $quantite;

    public function __construct(Product $product, int $quantite = 1) {
        $this->product = $product;
        $this->quantite = $quantite;
    }

    // Retourne le total prix pour cet item
    public function getTotal(): float {
        return $this->product->price * $this->quantite;
    }

    // Incrémente la quantité
    public function incremente(): void {
        $this->quantite++;
    }

    // Décrémente la quantité
    public function decremente(): void {
        if ($this->quantite > 0) {
            $this->quantite--;
        }
    }

    // Affiche l'item
    public function display(): void {
        echo "Produit : {$this->product->name} | Prix unitaire : {$this->product->price}€ | Quantité : {$this->quantite} | Total : {$this->getTotal()}€<br>";
    }
}

// --- Création des catégories et produits ---
$category1 = new Category("Informatique");
$category2 = new Category("Livres");

$product1 = new Product("Ordinateur portable", 1200, $category1);
$product2 = new Product("Clavier", 50, $category1);
$product3 = new Product("Livre de programmation", 45, $category2);

// --- Création des items de panier ---
$item1 = new CartItem($product1, 2); // 2 ordinateurs
$item2 = new CartItem($product2);    // 1 clavier
$item3 = new CartItem($product3, 3); // 3 livres

// --- Tests des méthodes ---
$item1->display();
$item2->display();
$item3->display();

// Incrémente le clavier et décrémente un livre
$item2->incremente();
$item3->decremente();

echo "<br>Après modification des quantités :<br>";
$item1->display();
$item2->display();
$item3->display();
