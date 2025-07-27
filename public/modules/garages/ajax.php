<?php
//on importe le fichier config.php pour avoir acces aux json
require_once dirname(__DIR__, 3) . '/config.php';

$cars = json_decode(file_get_contents(DATA_DIR . '/cars.json'), true);
$garages = json_decode(file_get_contents(DATA_DIR . '/garages.json'), true);

// Récupération du cookie client
$client = $_COOKIE['client'] ?? null;

// Filtrer les garages du client
$clientGarages = array_filter($garages, fn($g) => $g['customer'] === $client);

// Affichage des garages
echo "<h2>Garages du Client B</h2>";
echo "<ul>";
foreach ($clientGarages as $garage) {
    $id = $garage['id'];
    $title = $garage['title'];
    $address = $garage['address'];

    echo "<li class='edit-garage' data-id='$id' style='cursor:pointer; margin-bottom:10px;'>";
    echo "<strong>$title</strong><br>";
    echo "</li>";
}
echo "</ul>";
