<?php

// Classe Order
class Order {
    public int $id;
    public User $user;
    /** @var CartItem[] */
    public array $items;
    public DateTime $date;
    public string $statut;

    private static int $nextId = 1; // pour générer des IDs uniques

    public function __construct(User $user, Cart $cart) {
        $this->id = self::$nextId++;
        $this->user = $user;
        $this->items = $cartItems = $cart->getItems(); // copie des items du panier
        $this->date = new DateTime();
        $this->statut = "en cours"; // statut initial
    }

    // Retourne le total de la commande
    public function getTotal(): float {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getTotal();
        }
        return $total;
    }

    // Retourne le nombre total d'articles
    public function getItemCount(): int {
        $count = 0;
        foreach ($this->items as $item) {
            $count += $item->quantite;
        }
        return $count;
    }

    // Changer le statut
    public function setStatut(string $statut): void {
        $this->statut = $statut;
    }

    // Affichage de la commande
    public function display(): void {
        echo "Commande #{$this->id} | Statut : {$this->statut} | Date : {$this->date->format('d/m/Y H:i:s')}<br>";
        echo "Client : {$this->user->nom} ({$this->user->email})<br>";
        echo "Items :<br>";
        foreach ($this->items as $item) {
            echo "- {$item->product->name} x {$item->quantite} = {$item->getTotal()}€<br>";
        }
        echo "Total : {$this->getTotal()}€<br>";
        echo "Nombre total d'articles : {$this->getItemCount()}<br><hr>";
    }
}

// --- Test complet ---

// Création catégories et produits
$cat1 = new Category("Informatique");
$cat2 = new Category("Livres");

$prod1 = new Product("Ordinateur portable", 1200, $cat1);
$prod2 = new Product("Clavier", 50, $cat1);
$prod3 = new Product("Livre de programmation", 45, $cat2);

// Création d'un user et adresses
$user = new User("Alice Dupont", "alice@example.com");
$address1 = new Address("12 Rue de Paris", "Paris", "75001", "France");
$user->addAddress($address1, true);

// Création d'un panier
$cart = new Cart();
$cart->add($prod1, 1);
$cart->add($prod2, 2);
$cart->add($prod3, 3);

// Création de la commande à partir du panier et du user
$order = new Order($user, $cart);

// Affichage initial de la commande
$order->display();

// Changer le statut
$order->setStatut("expédiée");
echo "Après mise à jour du statut :<br>";
$order->display();
