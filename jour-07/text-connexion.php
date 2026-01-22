<?php
// Paramètres de connexion
$host = "localhost";
$dbname = "boutique";
$user = "root";      // ou "dev"
$pass = "";          // ou "dev"

try {
    // Création de l'objet PDO
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8",
        $user,
        $pass,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION] // Gestion des erreurs
    );

    // Si on arrive ici, la connexion a réussi
    echo "✅ Connexion réussie !";
} catch (PDOException $e) {
    // Affiche le message d'erreur en cas d'échec
    echo "❌ Erreur de connexion : " . $e->getMessage();
}
?>
