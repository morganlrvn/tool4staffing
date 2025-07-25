<?php
$jsonFileCars = $_SERVER['DOCUMENT_ROOT'] . '/data/cars.json';
$jsonFileGarages = $_SERVER['DOCUMENT_ROOT'] . '/data/garages.json';

$clientId = 'clientb';
$cars = json_decode(file_get_contents($jsonFileCars), true);
$garages = json_decode(file_get_contents($jsonFileGarages), true);


// Filtrer les voitures du client
$clientCars = array_filter($cars, fn($car) => $car['customer'] === $clientId);

$garageNames = [];
foreach ($garages as $garage) {
    if ($garage['customer'] === $clientId) {
        $garageNames[$garage['id']] = $garage['title'];
    }
}

// Afficher les voitures
echo "<h2>Voitures du : Client B</h2>";
echo "<ul>";
foreach ($clientCars as $car) {
    $model = strtolower($car['modelName']);
    $brand = $car['brand'];
    $garageId = $car['garageId'];
    $garage = isset($garageNames[$garageId]) ? $garageNames[$garageId] : "Garage inconnu";
    echo "<li>";
    echo "<strong>Marque :</strong> $brand ";
    echo "<strong>Modèle :</strong> $model ";
    echo "<strong>Garage :</strong> $garage";
    echo "</li>";
}
echo "</ul>";
