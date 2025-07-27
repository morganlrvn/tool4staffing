<?php
$jsonFileGarages = $_SERVER['DOCUMENT_ROOT'] . '/data/garages.json';
$garages = json_decode(file_get_contents($jsonFileGarages), true);

$clientId = 'clientb'; // pour ce module uniquement

// Filtrer garages du client
$clientGarages = array_filter($garages, fn($g) => $g['customer'] === $clientId);

// Affichage
echo "<h2>Garages du client B</h2>";
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
