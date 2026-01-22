<?php
session_start(); // reprend la session existante
?>

<h1>Page 2</h1>

<p>
Bonjour 
<?php echo $_SESSION['prenom']; ?>
</p>

