<?php

function greet() {
    echo "Bienvenue sur la boutique !<br>";
}

function greetClient($name) {
    echo "Bonjour $name !<br>";
}


greet();
greetClient("Alice");
greetClient("Bob");
greet();
greetClient("Charlie");
