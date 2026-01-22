<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <style>
        form {
            display: flex;
            flex-direction: column;
            width: 300px;
        }
        input {
            margin-bottom: 5px;
            padding: 8px;
            font-size: 14px;
        }
        .error {
            color: red;
            font-size: 12px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<h1>Formulaire d'inscription</h1>

<?php
// Initialiser les variables
$username = $email = '';
$errors = ['username'=>'', 'email'=>'', 'password'=>'', 'confirm'=>''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Récupérer et sécuriser les données
    $username = htmlspecialchars($_POST['username'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm = $_POST['confirm'] ?? '';

    // Validation Username
    if (empty($username)) {
        $errors['username'] = "Le nom d'utilisateur est obligatoire.";
    } elseif (!preg_match('/^[a-zA-Z0-9]{3,20}$/', $username)) {
        $errors['username'] = "Username : 3-20 caractères alphanumériques.";
    }

    // Validation Email
    if (empty($email)) {
        $errors['email'] = "L'email est obligatoire.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Email invalide.";
    }

    // Validation Password
    if (empty($password)) {
        $errors['password'] = "Le mot de passe est obligatoire.";
    } elseif (strlen($password) < 8) {
        $errors['password'] = "Le mot de passe doit contenir au moins 8 caractères.";
    }

    // Validation Confirmation
    if ($password !== $confirm) {
        $errors['confirm'] = "La confirmation doit être identique au mot de passe.";
    }

    // Vérifier s'il n'y a pas d'erreurs
    $hasErrors = false;
    foreach ($errors as $e) {
        if (!empty($e)) {
            $hasErrors = true;
            break;
        }
    }

    // Si tout est OK
    if (!$hasErrors) {
        echo "<p>Inscription réussie ! Bienvenue $username</p>";
        // Ici, tu pourrais ajouter l'enregistrement en base de données
        // Réinitialiser les champs
        $username = $email = '';
    }
}
?>

<form method="POST" action="">
    <label>Username :</label>
    <input type="text" name="username" value="<?= $username ?>">
    <div class="error"><?= $errors['username'] ?></div>

    <label>Email :</label>
    <input type="email" name="email" value="<?= $email ?>">
    <div class="error"><?= $errors['email'] ?></div>

    <label>Mot de passe :</label>
    <input type="password" name="password">
    <div class="error"><?= $errors['password'] ?></div>

    <label>Confirmation :</label>
    <input type="password" name="confirm">
    <div class="error"><?= $errors['confirm'] ?></div>

    <input type="submit" value="S'inscrire">
</form>

</body>
</html>
