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
if ($clientId === 'clientb') {
    foreach ($garages as $garage) {
        if ($garage['customer'] === $clientId) {
            $garageNames[$garage['id']] = $garage['title'];
        }
    }
}

// Meilleur affichage du nom du client
$clientNames = [
    'clienta' => 'Client A',
    'clientb' => 'Client B',
    'clientc' => 'Client C',
];
$clientLabel = $clientNames[$clientId];

// Affichage des voitures
echo "<h2>Voitures du : $clientLabel</h2>";
echo "<ul>";

$currentYear = date("Y");

foreach ($clientCars as $car) {
    $id = $car['id'];
    $brand = $car['brand'];
    // En minuscule pour le client B
    $model = ($clientId === 'clientb') ? strtolower($car['modelName']) : $car['modelName'];
    $year = date("Y", $car['year']);
    $age = $currentYear - $year;
    $garageId = $car['garageId'];
    $color = $car['colorHex'];
    $power = $car['power'];

    // Etape 5 : Avoir couleur rouge, verte ou rien avec conditions d'age
    $style = '';
    if ($clientId === 'clienta') {
        if ($age > 10) {
            $style = 'color:red;';
        } elseif ($age < 2) {
            $style = 'color:green;';
        }
    }

    echo "<li class='edit-car' data-id='$id' style='cursor:pointer; margin-top:12px; $style'>";
    echo "<strong>Marque :</strong> $brand <br>";
    echo "<strong>Modèle :</strong> " . $model . "<br>";

    if ($clientId === 'clienta') {
        echo "<strong>Année :</strong> $year <br>";
        echo "<strong>Puissance :</strong> {$power}ch";
    }
    // Affichage conditionnel par client
    if ($clientId === 'clientb') {
        $garage = $garageNames[$garageId] ?? "Garage inconnu";
        echo "<strong>Garage :</strong> $garage <br>";
    } elseif ($clientId === 'clientc') {
        echo "<strong>Couleur :</strong> $color ";
        echo "<span style='display:inline-block; width:12px; height:12px; background:$color;vertical-align:middle;'></span>";
    }
    echo "</li>";
}

echo "</ul>";
