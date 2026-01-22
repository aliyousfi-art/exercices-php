<?php

class Cart {
    /** @var CartItem[] */
    private array $items = [];

    // Ajoute un produit au panier
    public function add(Product $product, int $quantity = 1): self {
        foreach ($this->items as $item) {
            if ($item->product === $product) {
                $item->quantite += $quantity;
                return $this; // fluent interface
            }
        }
        $this->items[] = new CartItem($product, $quantity);
        return $this; // fluent interface
    }

    // Supprime un produit du panier (par Product ou par index)
    public function remove($productOrIndex): self {
        if (is_int($productOrIndex)) {
            // Suppression par index
            if (isset($this->items[$productOrIndex])) {
                unset($this->items[$productOrIndex]);
                $this->items = array_values($this->items);
            }
        } else {
            // Suppression par Product
            foreach ($this->items as $key => $item) {
                if ($item->product === $productOrIndex) {
                    unset($this->items[$key]);
                    $this->items = array_values($this->items);
                    break;
                }
            }
        }
        return $this; // fluent interface
    }

    // Met à jour la quantité d’un produit
    public function update(Product $product, int $quantity): self {
        foreach ($this->items as $item) {
            if ($item->product === $product) {
                if ($quantity <= 0) {
                    $this->remove($product);
                } else {
                    $item->quantite = $quantity;
                }
                break;
            }
        }
        return $this; // fluent interface
    }

    // Retourne tous les items
    public function getItems(): array {
        return $this->items;
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
    public function clear(): self {
        $this->items = [];
        return $this; // fluent interface
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

// --- Test Fluent Interface ---

$cat1 = new Category("Informatique");
$prod1 = new Product("Ordinateur portable", 1200, $cat1);
$prod2 = new Product("Clavier", 50, $cat1);

$cart = new Cart();

// Chaînage des méthodes
$cart->add($prod1)
     ->add($prod2, 3)
     ->remove(0) // supprime le premier produit ajouté (Ordinateur portable)
     ->display();

     