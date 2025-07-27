<?php

// Chemin des fichiers json
$jsonFileCars = $_SERVER['DOCUMENT_ROOT'] . '/data/cars.json';

// Lecture des fichiers json
$cars = json_decode(file_get_contents($jsonFileCars), true);

// Récupération du cookie client
$clientId = $_COOKIE['client'] ?? null;

// Filtrer les voitures du client
$clientCars = array_filter($cars, fn($car) => $car['customer'] === $clientId);

$currentYear = (int) date("Y");

// Afficher les voitures
echo "<h2>Voitures du : Client A</h2>";
echo "<ul>";
foreach ($clientCars as $car) {
    $brand = $car['brand'];
    $model = $car['modelName'];
    $carYear  = date("Y", $car['year']);
    $age = $currentYear - $carYear;
    $power = $car['power'];

    // On affiche la voiture en rouge si age > 10 ans, vert si age < 2 ans, sinon ne rien faire
    if ($age > 10) {
        $color = "red";
    } elseif ($age < 2) {
        $color = "green";
    } else {
        $color = "inherit";
    }

    echo "<li class='edit-car' data-id='{$car['id']}' style='color: $color; cursor:pointer; margin-top:20px;'>$brand $model</li>";
    echo "<strong>Année :</strong> $carYear ";
    echo "<strong>Puissance :</strong> {$power}ch";
    echo "</li>";
}
echo "</ul>";
