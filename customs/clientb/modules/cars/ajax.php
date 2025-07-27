<?php

// Chemin des fichiers json
$jsonFileCars = $_SERVER['DOCUMENT_ROOT'] . '/data/cars.json';
$jsonFileGarages = $_SERVER['DOCUMENT_ROOT'] . '/data/garages.json';

// Lecture des fichiers json
$cars = json_decode(file_get_contents($jsonFileCars), true);
$garages = json_decode(file_get_contents($jsonFileGarages), true);

// Récupération du cookie client
$clientId = $_COOKIE['client'] ?? null;

// Filtrer les voitures du client
$clientCars = array_filter($cars, fn($car) => $car['customer'] === $clientId);

// Associer chaque garage à un client par grâce à l'Id
$garageNames = [];
foreach ($garages as $garage) {
    if ($garage['customer'] === $clientId) {
        $garageNames[$garage['id']] = $garage['title'];
    }
}

// Affichage des voitures
echo "<h2>Voitures du : Client B</h2>";
echo "<ul>";
foreach ($clientCars as $car) {
    $model = strtolower($car['modelName']);
    $brand = $car['brand'];
    $garageId = $car['garageId'];
    $garage = isset($garageNames[$garageId]) ? $garageNames[$garageId] : "Garage inconnu";
    echo "<li class='edit-car' data-id='{$car['id']}' style='cursor:pointer; margin-top:20px;'>$brand $model</li>";
    echo "<strong>Garage :</strong> $garage";
    echo "</li>";
}
echo "</ul>";
