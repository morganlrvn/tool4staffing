<?php
$jsonFileCars = $_SERVER['DOCUMENT_ROOT'] . '/data/cars.json';
$clientId = 'clienta';
$cars = json_decode(file_get_contents($jsonFileCars), true);

// Filtrer les voitures du client
$clientCars = array_filter($cars, fn($car) => $car['customer'] === $clientId);

// Afficher les voitures
echo "<h2>Voitures du : Client A</h2>";
echo "<ul>";
foreach ($clientCars as $car) {
    $brand = $car['brand'];
    $model = $car['modelName'];
    $year = date("Y", $car['year']); // timestamp en année
    $power = $car['power'];
    echo "<li>";
    echo "<strong>Marque :</strong> $brand ";
    echo "<strong>Modèle :</strong> $model ";
    echo "<strong>Année :</strong> $year ";
    echo "<strong>Puissance :</strong> $power";
    echo "</li>";
}
echo "</ul>";
