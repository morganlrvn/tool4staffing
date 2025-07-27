<?php

// Chemin des fichiers json
$jsonFileCars = $_SERVER['DOCUMENT_ROOT'] . '/data/cars.json';

// Lecture des fichiers json
$cars = json_decode(file_get_contents($jsonFileCars), true);

// Récupération du cookie client
$clientId = $_COOKIE['client'] ?? null;

// Filtrer les voitures du client
$clientCars = array_filter($cars, fn($car) => $car['customer'] === $clientId);

// Afficher les voitures
echo "<h2>Voitures du : Client C</h2>";
echo "<ul>";
foreach ($clientCars as $car) {
    $model = $car['modelName'];
    $brand = $car['brand'];
    $color = $car['colorHex'];

    echo "<li class='edit-car' data-id='{$car['id']}' style='cursor:pointer; margin-top:20px;'>$brand $model</li>";
    echo "<strong>Couleur :</strong> ";
    echo "<span style='display:inline-block; width:12px; height:12px; background:$color;vertical-align:middle;'></span>";
    echo "</li>";
}
echo "</ul>";
