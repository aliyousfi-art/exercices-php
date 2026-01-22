<?php

class Car { // Déclaration de la classe Car
    public $brand; // Propriété pour la marque de la voiture
    public $model; // Propriété pour le modèle de la voiture    
    public $year;  // Propriété pour l'année de fabrication de la voiture   

public function __construct($brand,$model,$year) { // Constructeur pour initialiser les propriétés
    $this->brand = $brand;// Initialisation de la marque
    $this->model = $model;// Initialisation du modèle
    $this->year = $year;// Initialisation de l'année
}
public function getAge() { // Méthode pour calculer l'âge de la voiture
    $currentYear = date("Y"); // Obtient l'année actuelle
    return $currentYear - $this->year; // Calcule et retourne l'âge de la voiture
}
public function display() { // Méthode pour afficher les informations de la voiture
    return $this->brand . " " . $this->model . " (" . $this->year . ") - Age: " . $this->getAge() . " years";
}
}
?>

