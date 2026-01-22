<?php
session_start(); // démarre la session

$_SESSION['prenom'] = 'Jean'; // on stocke "Jean" dans la session
?>

<h1>Page 1</h1>
<p>Le prénom a été stocké.</p>

<a href="read.php">Aller à la page 2</a>
