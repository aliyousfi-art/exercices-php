<?php

$a = 0;
$b = "";
$c = null;
$d = false;
$e = "0";

echo "<h3>Comparaisons avec ==</h3>";

var_dump($a == $b); // 0 == ""
echo "<br>";

var_dump($a == $c); // 0 == null
echo "<br>";

var_dump($a == $d); // 0 == false
echo "<br>";

var_dump($a == $e); // 0 == "0"
echo "<br><br>";

echo "<h3>Comparaisons avec ===</h3>";

var_dump($a === $b); // 0 === ""
echo "<br>";

var_dump($a === $c); // 0 === null
echo "<br>";

var_dump($a === $d); // 0 === false
echo "<br>";

var_dump($a === $e); // 0 === "0"
echo "<br>";
