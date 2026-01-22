<?php

class Address {
    public string $rue;
    public string $ville;
    public string $codePostal;
    public string $pays;

    public function __construct(string $rue, string $ville, string $codePostal, string $pays) {
        $this->rue = $rue;
        $this->ville = $ville;
        $this->codePostal = $codePostal;
        $this->pays = $pays;
    }

    public function display(): void {
        echo "{$this->rue}, {$this->ville}, {$this->codePostal}, {$this->pays}<br>";
    }
}

class User {
    public string $nom;
    public string $email;
    public DateTime $dateInscription;
    /** @var Address[] */
    private array $addresses = [];
    private ?Address $defaultAddress = null;

    public function __construct(string $nom, string $email) {
        $this->nom = $nom;
        $this->email = $email;
        $this->dateInscription = new DateTime(); // date actuelle
    }

    // Ajouter une adresse, option pour la définir comme adresse par défaut
    public function addAddress(Address $address, bool $default = false): void {
        $this->addresses[] = $address;
        if ($default || $this->defaultAddress === null) {
            $this->defaultAddress = $address;
        }
    }

    // Retourne toutes les adresses
    public function getAddresses(): array {
        return $this->addresses;
    }

    // Retourne l'adresse par défaut
    public function getDefaultAddress(): ?Address {
        return $this->defaultAddress;
    }

    // Affiche les informations du user et ses adresses
    public function display(): void {
        echo "Nom : {$this->nom}<br>Email : {$this->email}<br>Date inscription : {$this->dateInscription->format('d/m/Y H:i:s')}<br><br>";
        echo "Adresses :<br>";
        foreach ($this->addresses as $address) {
            $address->display();
        }
        echo "<br>Adresse par défaut : ";
        if ($this->defaultAddress) {
            $this->defaultAddress->display();
        } else {
            echo "Aucune adresse définie<br>";
        }
        echo "<hr>";
    }
}

// --- Test complet ---
$user = new User("Alice Dupont", "alice@example.com");

$address1 = new Address("12 Rue de Paris", "Paris", "75001", "France");
$address2 = new Address("34 Avenue de Lyon", "Lyon", "69001", "France");
$address3 = new Address("56 Boulevard de Nice", "Nice", "06000", "France");

// Ajouter des adresses
$user->addAddress($address1, true); // adresse par défaut
$user->addAddress($address2);
$user->addAddress($address3);

// Afficher le user et ses adresses
$user->display();

// Récupérer les adresses
$allAddresses = $user->getAddresses();
echo "Toutes les adresses du user :<br>";
foreach ($allAddresses as $addr) {
    $addr->display();
}

// Afficher l'adresse par défaut
$defaultAddr = $user->getDefaultAddress();
echo "<br>Adresse par défaut récupérée :<br>";
if ($defaultAddr) {
    $defaultAddr->display();
}
