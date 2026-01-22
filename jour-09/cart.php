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

    public function getTotal(): float {
        return $this->product->price * $this->quantite;
    }

    public function incremente(): void {
        $this->quantite++;
    }

    public function decremente(): void {
        if ($this->quantite > 0) {
            $this->quantite--;
        }
    }
}

class Cart {
    /** @var CartItem[] */
    private array $items = [];

    // Ajoute un produit au panier
    public function add(Product $product, int $quantity = 1): void {
        foreach ($this->items as $item) {
            if ($item->product === $product) {
                $item->quantite += $quantity;
                return;
            }
        }
        $this->items[] = new CartItem($product, $quantity);
    }

    // Supprime un produit du panier
    public function remove(Product $product): void {
        foreach ($this->items as $key => $item) {
            if ($item->product === $product) {
                unset($this->items[$key]);
                $this->items = array_values($this->items); // réindexe le tableau
                return;
            }
        }
    }

    // Met à jour la quantité d’un produit
    public function update(Product $product, int $quantity): void {
        foreach ($this->items as $item) {
            if ($item->product === $product) {
                if ($quantity <= 0) {
                    $this->remove($product);
                } else {
                    $item->quantite = $quantity;
                }
                return;
            }
        }
    }

    // Total du panier
    public function getTotal(): float {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getTotal();
        }
        return $total;
    }

    // Nombre total d’items
    public function count(): int {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->quantite;
        }
        return $total;
    }

    // Vide le panier
    public function clear(): void {
        $this->items = [];
    }

    // Affiche le panier
    public function display(): void {
        if (empty($this->items)) {
            echo "Le panier est vide.<br>";
            return;
        }

        foreach ($this->items as $item) {
            echo "Produit : {$item->product->name} | Prix unitaire : {$item->product->price}€ | Quantité : {$item->quantite} | Total : {$item->getTotal()}€<br>";
        }
        echo "Total du panier : {$this->getTotal()}€<br>";
        echo "Nombre total d’articles : {$this->count()}<br><br>";
    }
}

// --- Test complet ---

$cat1 = new Category("Informatique");
$cat2 = new Category("Livres");

$prod1 = new Product("Ordinateur portable", 1200, $cat1);
$prod2 = new Product("Clavier", 50, $cat1);
$prod3 = new Product("Livre de programmation", 45, $cat2);

$cart = new Cart();

// Ajouter des produits
$cart->add($prod1, 2);
$cart->add($prod2);
$cart->add($prod3, 3);
echo "Après ajout :<br>";
$cart->display();

// Mettre à jour un produit
$cart->update($prod2, 5);
echo "Après mise à jour du Clavier :<br>";
$cart->display();

// Supprimer un produit
$cart->remove($prod3);
echo "Après suppression du Livre de programmation :<br>";
$cart->display();

// Ajouter un produit déjà existant (incrémente la quantité)
$cart->add($prod1, 1);
echo "Après ajout d’un autre Ordinateur portable :<br>";
$cart->display();

// Vider le panier
$cart->clear();
echo "Après vidage du panier :<br>";
$cart->display();