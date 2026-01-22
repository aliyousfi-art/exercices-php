<?php
require_once 'car.php'; // Inclusion du fichier car.php pour utiliser la classe Car

$car1 = new Car("Toyota", "Corolla", 2015);
$car2 = new Car("Honda", "Civic", 2018);
$car3 = new Car("Ford", "Focus", 2020);

echo "Car 1: " . $car1->brand . " " . $car1->model . " " . $car1->year . "\n";
echo "Car 2: " . $car2->brand . " " . $car2->model . " " . $car2->year . "\n";
echo "Car 3: " . $car3->brand . " " . $car3->model . " " . $car3->year . "\n";

?>