<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    form {
        display: flex;
        flex-direction: column;
        width: 300px;
    }
    input, textarea {
        margin-bottom: 10px;
        padding: 8px;
        font-size: 14px;
    }
    input[type="submit"] {
        width: 100px;
        align-self: flex-start;
    }
</style>

<body>
    <form method="POST" action="">

<label for="nom">Nom :</label>
<input type="text" id="nom" name="nom" placeholder="nom" required><br><br>

<label for="email">Email :</label>
<input type="email" id="email" name="email" placeholder="email" required><br><br>


<label for="message">Message :</label>
<textarea id="message" name="message" placeholder="votre message" required></textarea><br><br>

<input type="submit" value="Envoyer">
    
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Récupération et sécurisation des données
    $name = htmlspecialchars($_POST['name'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $message = htmlspecialchars($_POST['message'] ?? '');

    $errors = [];

    // Validation
    if (empty($name)) {
        $errors[] = "Le nom est obligatoire.";
    }

    if (empty($email)) {
        $errors[] = "L'email est obligatoire.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "L'email n'est pas valide.";
    }

    if (empty($message)) {
        $errors[] = "Le message est obligatoire.";
    } elseif (strlen($message) < 10) {
        $errors[] = "Le message doit contenir au moins 10 caractères.";
    }

    // Affichage des erreurs ou succès
    if (!empty($errors)) {
        echo '<div class="error"><ul>';
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo '</ul></div>';
    } else {
        echo '<div class="success">';
        echo "<p>Merci $name, votre message a été envoyé !</p>";
        echo "<p>Email : $email</p>";
        echo "<p>Message : $message</p>";
        echo '</div>';
    }
}
?>
    
</body>
</html>

