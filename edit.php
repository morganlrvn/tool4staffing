<?php
$id = $_GET['id'] ?? null;
$jsonFileCars = $_SERVER['DOCUMENT_ROOT'] . '/data/cars.json';
$cars = json_decode(file_get_contents($jsonFileCars), true);

// Trouver la voiture avec l'id
$car = null;
foreach ($cars as $c) {
    if ($c['id'] == $id) {
        $car = $c;
        break;
    }
}

if (!$car) {
    echo "<p>Voiture introuvable.</p>";
    exit;
}

$brand = $car['brand'];
$model = $car['modelName'];
$year = date("Y", $car['year']);
$color = $car['colorHex'];
$power = $car['power'];

echo "<h2>Fiche voiture : $brand $model</h2>";
echo "<ul>";
echo "<li>Marque : $brand</li>";
echo "<li>Modèle : $model</li>";
echo "<li>Année : $year</li>";
echo "<li>Puissance : {$power}ch</li>";
echo "<li>Couleur : <span style='display:inline-block;width:12px;height:12px;background:$color;vertical-align:middle;'></span></li>";
echo "</ul>";
echo "<button class='back-to-list'>← Retour à la liste</button>";
