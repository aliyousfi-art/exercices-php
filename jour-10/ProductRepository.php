<?php
// Connexion à la base
$host = 'localhost';
$db   = 'ma_base';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$pdo = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

// Classe Product (objet métier)
class Product {
    public $id, $name, $price;
    public function __construct($id = null, $name = '', $price = 0) {
        $this->id = $id; $this->name = $name; $this->price = $price;
    }
}

// Repository pour gérer la table products
class ProductRepository {
    private PDO $pdo;
    public function __construct(PDO $pdo) { $this->pdo = $pdo; }

    public function find(int $id): ?Product {
        $stmt = $this->pdo->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->execute(['id'=>$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data ? new Product($data['id'],$data['name'],$data['price']) : null;
    }

    public function findAll(): array {
        $stmt = $this->pdo->query("SELECT * FROM products");
        $products = [];
        while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $products[] = new Product($data['id'],$data['name'],$data['price']);
        }
        return $products;
    }

    public function save(Product $p): void {
        if ($p->id) {
            $stmt = $this->pdo->prepare("UPDATE products SET name=:name, price=:price WHERE id=:id");
            $stmt->execute(['name'=>$p->name,'price'=>$p->price,'id'=>$p->id]);
        } else {
            $stmt = $this->pdo->prepare("INSERT INTO products (name, price) VALUES (:name, :price)");
            $stmt->execute(['name'=>$p->name,'price'=>$p->price]);
            $p->id = (int)$this->pdo->lastInsertId();
        }
    }

    public function delete(Product $p): void {
        if ($p->id) {
            $stmt = $this->pdo->prepare("DELETE FROM products WHERE id=:id");
            $stmt->execute(['id'=>$p->id]);
        }
    }
}

// Test CRUD
$repo = new ProductRepository($pdo);

// 1. Création
$product = new Product(null,"Produit Test",50);
$repo->save($product);
echo "Créé : ID={$product->id}, Nom={$product->name}, Prix={$product->price}<br>";

// 2. Modification
$product->name = "Produit Modifié";
$product->price = 75;
$repo->save($product);
echo "Modifié : Nom={$product->name}, Prix={$product->price}<br>";

// 3. Suppression
$repo->delete($product);
echo "Supprimé : ID={$product->id}<br>";

// 4. Affichage final
echo "<h3>Produits restants :</h3>";
$all = $repo->findAll();
if (!$all) echo "Aucun produit";
foreach ($all as $p) {
    echo "ID={$p->id}, Nom={$p->name}, Prix={$p->price}<br>";
}
?>
