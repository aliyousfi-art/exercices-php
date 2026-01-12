<?php
$personne = [
    "name" => "Alice",
    "age" => 28,
    "city" => "Paris",
    "job" => "Développeuse"
];

foreach ($personne as $key => $value) {
    echo "<strong>$key</strong> : $value<br>";
}
?>
