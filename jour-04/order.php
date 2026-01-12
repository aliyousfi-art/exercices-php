<?php

$status = "shipped";



switch ($status) {
    case "standby":
        $message = "Commande en attente";
        $class = "standby";
        break;

    case "validated":
        $message = "Commande validée";
        $class = "validated";
        break;

    case "shipped":
        $message = "Commande expédiée";
        $class = "shipped";
        break;

    case "delivered":
        $message = "Commande livrée";
        $class = "delivered";
        break;

    case "canceled":
        $message = "Commande annulée";
        $class = "canceled";
        break;

    default:
        $message = "Statut inconnu";
        $class = "unknown";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Order status - switch</title>
    <style>
        .standby { color: gray; }
        .validated { color: blue; }
        .shipped { color: orange; }
        .delivered { color: green; }
        .canceled { color: red; }
        .unknown { color: black; }
    </style>
</head>
<body>

<h2>Version avec switch</h2>
<p class="<?= $class ?>"><?= $message ?></p>

<hr>

<?php


$result = match ($status) {
    "standby"   => ["Commande en attente", "standby"],
    "validated" => ["Commande validée", "validated"],
    "shipped"   => ["Commande expédiée", "shipped"],
    "delivered" => ["Commande livrée", "delivered"],
    "canceled"  => ["Commande annulée", "canceled"],
    default     => ["Statut inconnu", "unknown"]
};

$message = $result[0];
$class = $result[1];
?>

<h2>Version avec match</h2>
<p class="<?= $class ?>"><?= $message ?></p>

</body>
</html>
