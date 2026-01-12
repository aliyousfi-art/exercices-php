<?php

$ages = [15, 20, 30, 70];

foreach ($ages as $age) {

    if ($age < 18) {
        $status = "minor";
    } elseif ($age >= 18 && $age <= 25) {
        $status = "Young adult";
    } elseif ($age >= 26 && $age <= 64) {
        $status = "Adult";
    } else {
        $status = "Senior";
    }

    echo "Age : $age → $status<br>";
}
