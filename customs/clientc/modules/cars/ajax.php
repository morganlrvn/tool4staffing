<?php
$jsonFileCars = $_SERVER['DOCUMENT_ROOT'] . '/data/cars.json';

$clientId = 'clientc';
$cars = json_decode(file_get_contents($jsonFileCars), true);

// Filtrer les voitures du client
$clientCars = array_filter($cars, fn($car) => $car['customer'] === $clientId);

// Afficher les voitures
echo "<h2>Voitures du : Client C</h2>";
echo "<ul>";
foreach ($clientCars as $car) {
    $model = $car['modelName'];
    $brand = $car['brand'];
    $color = $car['colorHex'];

    echo "<li>";
    echo "<strong>Marque :</strong> $brand ";
    echo "<strong>Modèle :</strong> $model ";
    echo "<strong>Couleur Voiture:</strong> ";
    echo "<span style='display:inline-block; width:12px; height:12px; background:$color;vertical-align:middle;'></span>";
    echo "</li>";
}
echo "</ul>";
